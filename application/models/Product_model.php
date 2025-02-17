<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 22.07.23
 * Time: 11:29
 */

class Product_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_products_by_category() {
		$categories = $this->db->select("cat.id as category_id, 
							cat.name as category_name, 
							p.id as product_id, 
							p.name as product_name, 
							p.price as product_price, 
							p.description as product_description, 
							p.primary_image as product_image")
		->from("product_categories cat")
		->join('products p', ' p.category_id = cat.id', 'INNER')
		->where('p.active', 1)
		->get()->result_array();

		$products = [];
		foreach ($categories as &$category) {
			if(!isset($products[$category['category_id']])) {
				$products[$category['category_id']] = [
					'id' => $category['category_id'],
					'name' => $category['category_name'],
					'products' => []
				];
			}

			$products[$category['category_id']]['products'][] = [
				'id' => $category['product_id'],
				'name' => $category['product_name'],
				'price' => $category['product_price'],
				'description' => $category['product_description'],
				'image' => $category['product_image'],
			];
		}

		return array_values($products);
	}

	public function get_details_by_id(int $product_id) {
		$product = $this->db->select("p.id, 
											p.name, 
											p.description, 
											p.price, 
											p.primary_image, 
											cat.name as category_name")
		->from("products p")
		->join('product_categories cat', 'cat.id = p.category_id', 'INNER')
		->where("p.active", 1)
		->where("p.id", $product_id)
		->get()->row_array();

		$extra_images = $this->db->select("img.url, img.id")
							->from("product_images img")
							->where("img.product_id", $product_id)
							->get()->result_array();

		$product['extra_images'] = array_map(fn($img) => $img['url'], $extra_images);

		return $product;
	}
}
