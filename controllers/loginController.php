<?php
class loginController extends controller{

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->dados = array();
	}

	public function index(){

		
		$this->loadTemplate('login', $this->dados);
	}

	public function logout(){

		echo 'o usuário fez logout';
	}

}