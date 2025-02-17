<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 15.08.23
 * Time: 14:55
 */

class Order_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create_order(array $order_data): int{
		$to_insert = [
			'customer_name' => $order_data['firstname'],
			'customer_lastname' => $order_data['lastname'],
			'customer_email' => $order_data['email'],
			'customer_phone' => $order_data['telephone'],
			'home_delivery' => isset($order_data['home_delivery']) ? 1 : 0,
			'self_pickup' => isset($order_data['self_pickup']) ? 1 : 0,
			'customer_street' => $order_data['street'],
			'customer_number' => $order_data['number'],
			'customer_city' => $order_data['city'],
			'customer_zip' => $order_data['zip']
		];
		$this->db->insert('orders', $to_insert);
		return $this->db->insert_id();
	}

	public function add_item_to_order(int $order_id, CartItem $item): int {
		$to_insert = [
			'order_id' => $order_id,
			'product_id' => $item->product_id,
			'amount' => $item->amount,
			'unit_price' => $item->price
		];

		$this->db->insert('order_items', $to_insert);
		return $this->db->insert_id();
	}

	public function get_order_product_data_for_payment(int $order_id): array {
		$data = $this->db->select("p.name AS product_name, p.primary_image AS product_image, i.amount AS quantity, i.unit_price AS price_cents")
			->from('orders o')
			->join("order_items i", 'i.order_id = o.id', 'INNER')
			->join("products p", "p.id = i.product_id", 'INNER')
			->where("o.id", $order_id)
			->get()->result_array();
		return array_map(function($product) {
			$product['product_image'] = base_url($product['product_image']);
			return $product;
		}, $data);
	}

	public function mark_order_as_paid(int $order_id): void {
		$this->db->set('payment_success', 1)
			->where('id', $order_id)
			->update('orders');
	}

	public function get_order_information_for_mail(int $order_id): array {
		$order_info = $this->db->select("o.*")
			->from('orders o')
			->where('o.id', $order_id)
			->get()->row_array();

		$order_lines = $this->db->select("p.name, i.amount as quantity, i.unit_price as price, p.primary_image")
			->from('order_items i')
			->join('products p', 'p.id = i.product_id')
			->where('i.order_id', $order_id)
			->get()->result_array();

		$order_total = array_reduce($order_lines, function($total, $order_line) {
			return $total + ((int)$order_line['quantity'] * (int)$order_line['price']);
		}, 0);

		return [
			...$order_info,
			'lines' => $order_lines,
			'total' => $order_total
		];
	}
}
