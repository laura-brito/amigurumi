<?php
class homeController extends controller{

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->dados = array();
	}

	public function index(){

		$pessoa = new Pessoa();
		$this->dados['pessoa'] = $pessoa->getAll();

		$this->loadTemplate('home', $this->dados);
	}

}