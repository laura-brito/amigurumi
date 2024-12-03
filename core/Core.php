<?php
class Core{

	public function exec(){
		//criando uma instancia do roteador
		$router = new Router();

		//configurando as rotas
		$router->addRoute('/', array(new homeController(),'index'));

		//controler pessoa
		$router->addRoute('/pessoa', array(new pessoaController(),'index'));
		$router->addRoute('/pessoa/adicionar', array(new pessoaController(),'adicionar'));
		$router->addRoute('/pessoa/add_action', array(new pessoaController(),'add_action'));
		$router->addRoute('/pessoa/editar', array(new pessoaController(),'editar'));
		$router->addRoute('/pessoa/edit_action', array(new pessoaController(),'edit_action'));

		//lidando com a requisição
		$route = isset($_GET['route'])?'/'.$_GET['route']:'/';
		$router->handleRequest($route);
	}

}

