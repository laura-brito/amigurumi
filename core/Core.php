<?php
class Core
{

	public function exec()
	{
		//criando uma instancia do roteador
		$router = new Router();

		// Home
		$router->addRoute('/', array(new homeController(), 'index'));
		$router->addRoute('/home', array(new homeController(), 'index'));

		// Login
		$router->addRoute('/login', array(new loginController(), 'login_action'));
		$router->addRoute('/logout', array(new loginController(), 'logout_action'));

		// Person
		$router->addRoute('/person/register_action', array(new personController(), 'register_action'));

		// About
		$router->addRoute('/about', array(new aboutController(), 'index'));

		// Contact
		$router->addRoute('/contact', array(new contactController(), 'index'));
		$router->addRoute('/contact/send', array(new contactController(), 'send_email'));

		// Shop
		$router->addRoute('/shop', array(new shopController(), 'index'));
		$router->addRoute('/shop/product', array(new shopController(), 'product'));
		$router->addRoute('/shop/cart', array(new shopController(), 'cart'));
		$router->addRoute('/shop/cart/add', array(new shopController(), 'add_to_cart'));
		$router->addRoute('/shop/cart/remove', array(new shopController(), 'remove_from_cart'));

		// Checkout
		$router->addRoute('/checkout', array(new checkoutController(), 'index'));
		$router->addRoute('/checkout/delivery', array(new checkoutController(), 'calculate_delivery'));
		$router->addRoute('/checkout/complete', array(new checkoutController(), 'checkout'));

		// Transaction
		$router->addRoute('/transaction', array(new transactionController(), 'index'));
		// $router->addRoute('/transaction/detail', array(new transactionController(), 'detail'));

		//lidando com a requisição
		$route = isset($_GET['route']) ? '/' . $_GET['route'] : '/';
		$router->handleRequest($route);
	}

}