<?php
class Core
{

	public function exec()
	{
		//criando uma instancia do roteador
		$router = new Router();

		//configurando as rotas
		$router->addRoute('/', array(new homeController(), 'index'));

		// Home
		$router->addRoute('/home', array(new homeController(), 'index'));

		// Login
		$router->addRoute('/login', array(new loginController(), 'login_action'));

		// Person
		$router->addRoute('/person/register_action', array(new personController(), 'register_action'));

		// About
		// $router->addRoute('/about', array(new aboutController(), 'index'));

		// $router->addRoute('/pessoa/add_action', array(new personController(), 'add_action'));
		// $router->addRoute('/pessoa/editar', array(new personController(), 'editar'));
		// $router->addRoute('/pessoa/edit_action', array(new personController(), 'edit_action'));

		//lidando com a requisição
		$route = isset($_GET['route']) ? '/' . $_GET['route'] : '/';
		$router->handleRequest($route);
	}

}