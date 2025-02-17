<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 22.07.23
 * Time: 13:25
 */
/**
 * Class Product
 * @property Product_model product_model
 */
class Product extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index($product_id)
	{
		$data = $this->product_model->get_details_by_id($product_id);
		//TODO: implement 404 when is empty
		$this->render('product_detail.php', ['product' => $data]);
	}

	public function additem() {
		$product_id = (int)$this->input->post('productid');
		$amount = (int)$this->input->post('amount');
		$redirect = $this->input->post('redirect');

		$cart = \SessionManager::get_cart();
		$new_item = new CartItem();
		$new_item->product_id = $product_id;
		$new_item->amount = $amount;
		$price = (int)$this->product_model->get_details_by_id($product_id)['price'];
		$new_item->price = $price;
		if(isset($cart)) {
			$found_key = array_search($product_id, array_column($cart->items, 'product_id'), true);
			if($found_key !== FALSE) {
				$cart->items[$found_key]->amount += $amount;
			} else {
				$cart->items[] = $new_item;
			}
		} else {
			$cart = new Cart();
			$cart->items = [$new_item];
		}
		$cart->total = array_reduce($cart->items, function($total, $item) {
			return $total + ($item->price * $item->amount);
		}, 0);

		\SessionManager::set_cart($cart);
		\SessionManager::set_message('Product toegevoegd aan bestelling');
		if($redirect === "home"){
			redirect("");
		}
		redirect("/product/{$product_id}");
	}

}
