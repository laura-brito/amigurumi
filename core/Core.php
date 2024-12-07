<?php
class Core
{

	public function exec()
	{
		//criando uma instancia do roteador
		$router = new Router();

		//configurando as rotas
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
		$router->addRoute('/shop/product-detail', array(new shopController(), 'detail'));
		// $router->addRoute('/pessoa/add_action', array(new personController(), 'add_action'));
		// $router->addRoute('/pessoa/editar', array(new personController(), 'editar'));
		// $router->addRoute('/pessoa/edit_action', array(new personController(), 'edit_action'));

		//lidando com a requisição
		$route = isset($_GET['route']) ? '/' . $_GET['route'] : '/';
		$router->handleRequest($route);
	}

}