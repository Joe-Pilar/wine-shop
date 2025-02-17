<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 15.07.23
 * Time: 11:40
 */

/**
 * Class Home
 * @property Product_model product_model
 */
class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index()
	{
		$categories_and_products = $this->product_model->get_all_products_by_category();
		$this->render('home.php', ['categories' => $categories_and_products]);
	}
}
