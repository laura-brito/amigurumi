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
		$router->addRoute('/login', array(new loginController(), 'index'));


		// Register
		$router->addRoute('/register', array(new registerController(), 'index'));
		$router->addRoute('/pessoa/adicionar', array(new pessoaController(), 'adicionar'));
		$router->addRoute('/pessoa/add_action', array(new pessoaController(), 'add_action'));
		$router->addRoute('/pessoa/editar', array(new pessoaController(), 'editar'));
		$router->addRoute('/pessoa/edit_action', array(new pessoaController(), 'edit_action'));

		//lidando com a requisição
		$route = isset($_GET['route']) ? '/' . $_GET['route'] : '/';
		$router->handleRequest($route);
	}

}