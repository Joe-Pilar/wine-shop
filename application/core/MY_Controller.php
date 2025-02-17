<?php
require_once "application/controllers/SessionManager.php";
class MY_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	public function render(string $viewname, $data) {
		$cart = SessionManager::get_cart();
		$message = SessionManager::get_message();
		$this->load->view('header', ["cart" => $cart]);
		$this->load->view($viewname, $data);
		$this->load->view('footer', ["message" => $message]);
	}
}
