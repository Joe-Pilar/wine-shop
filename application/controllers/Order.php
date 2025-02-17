<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 23.07.23
 * Time: 12:14
 */

/**
 * Class Order
 * @property Product_model product_model
 * @property Order_model order_model
 */
class Order extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('order_model');
	}

	public function index()
	{
		$cart = SessionManager::get_cart();
		$subtotals = [];
		if($cart !== null) {
			foreach ($cart->items as $item) {
				$product =  $this->product_model->get_details_by_id($item->product_id);
				$product['amount'] = $item->amount;
				$product['subtotal'] = $item->price * $item->amount;
				$product['price'] = $item->price;
				$subtotals[] = $product;
			}
		}
		$this->render('cart_overview.php', ['subtotals' => $subtotals ,'cart' => $cart]);
	}

	public function delete_item(int $product_id) {
		$cart = SessionManager::get_cart();

		$cart->items = array_reduce($cart->items, function($items, $item) use ($product_id) {
			if($item->product_id !== $product_id) return [...$items, $item];
			return $items;
		}, []);

		$cart->total = array_reduce($cart->items, function($total, $item) {
			return $total + ($item->price * $item->amount);
		}, 0);

		SessionManager::set_cart($cart);
		SessionManager::set_message('Product verwijderd uit bestelling');
		$this->index();
	}

	public function checkout() {
		$this->render('checkout_order.php', []);
	}

	public function create() {
		$order_data = $this->input->post();
		$current_cart = SessionManager::get_cart();
		//create order in database
		$order_id = $this->order_model->create_order($order_data);
 		foreach ($current_cart->items as $item) {
			$this->order_model->add_item_to_order($order_id, $item);
		}
		//initialize payment

		$stripe_api_key = $this->config->item('stripe_secret_key');
 		$base_url = base_url();
		$order_products = $this->order_model->get_order_product_data_for_payment($order_id);
		$line_items = array_map(function($product) {
			return [
				'price_data' => [
					'currency' => 'EUR',
					'product_data' => [
						'name' => $product['product_name'],
						'images' => [
							$product['product_image']
						]
					],
					'unit_amount' => $product['price_cents']
				],
				'quantity' => $product['quantity']
			];
		}, $order_products);

		\Stripe\Stripe::setApiKey($stripe_api_key);

 		$stripe_checkout_session = \Stripe\Checkout\Session::create([
																		'customer_email' => $order_data['email'],
																		//'submit_type' => 'donate',
																		'billing_address_collection' => null,
																		/*'shipping_address_collection' => [
																			'allowed_countries' => ['BE'],
																		],*/
																		'metadata' => [
																			'order_id' => $order_id
																		],
																		'locale' => 'nl',
																		'line_items' => $line_items,
																		'mode' => 'payment',
																		'currency' => 'EUR',
																		'success_url' => $base_url. '/order/payment_success?session_id={CHECKOUT_SESSION_ID}',
																		'cancel_url' => $base_url . '/order/payment_fail?session_id={CHECKOUT_SESSION_ID}'
																	]);

		header("HTTP/1.1 303 See Other");
		header("Location: " . $stripe_checkout_session->url);
	}

	public function payment_success() {
		$stripe_api_key = $this->config->item('stripe_secret_key');
		$stripe = new \Stripe\StripeClient($stripe_api_key);
		$session_id = $this->input->get('session_id');
		$session = $stripe->checkout->sessions->retrieve($session_id);
		$order_id = (int)$session->__get('metadata')->__get('order_id');
		$payment_status = $session->__get('payment_status');
		if ($payment_status === 'paid') {
			//mark order as paid
			$this->order_model->mark_order_as_paid($order_id);
			//clear out the stripe session
			//$session->expire();
			//clear out the local php session
			SessionManager::clear_cart();
			//send e-mail to order_address + customer with order details
			$this->send_confirmation_to_customer($order_id);

			$this->render('payment_success.php', []);
		}
	}

	public function payment_fail() {
		$this->render('payment_fail.php', []);
	}

	private function send_confirmation_to_customer(int $order_id) {
		$order_information = $this->order_model->get_order_information_for_mail($order_id);

		$this->load->library('email');
		//todo configure mail

		$this->email->initialize($config);

		$this->email->from('wijnwafel@ttczoersel.be', 'TTC Zoersel');
		$this->email->to($order_information['customer_email']);


		$html = $this->load->view('email/email_confirm_order.php', $order_information ,true);
		$this->email->subject('Bestelling succesvol ontvangen');
		$this->email->message($html);
		$this->email->send();
	}

	private function send_confirmation_to_manager(int $order_id) {

	}
}
