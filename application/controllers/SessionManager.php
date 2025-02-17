<?php
/**
 * Created by PhpStorm
 * User: ewout
 * Date: 23.07.23
 * Time: 12:03
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionManager
{
	private function __construct() {}

	private static function set($key, $value): void
	{
		$_SESSION[$key] = $value;
	}

	private static function get($key)
	{
		return $_SESSION[$key] ?? null;
	}

	public static function get_cart(): ?Cart {
		return self::get('cart');
	}

	public static function set_cart(Cart $cart) {
		self::set('cart', $cart);
	}

	public static function set_message(string $message) {
		self::set('message', $message);
	}

	public static function get_message() :string {
		$message = self::get('message');
		self::set('message' , '');
		return $message ?? '';
	}

	public static function clear_cart(): void {
		self::set('cart', null);
	}
}

class CartItem
{
	public int $product_id;
	public int $price; //in cents
	public int $amount;
}

class Cart
{
	public array $items;
	public int $total; //in cents
}
