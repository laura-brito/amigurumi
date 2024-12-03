<?php
class pessoaController extends controller{

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->dados = array();
	}

	public function index(){

		$pessoa = new Pessoa();
		$this->dados['pessoa'] = $pessoa->getAll();

		$this->loadTemplate('pessoa', $this->dados);
	}

	public function adicionar(){

		$this->loadTemplate('pessoa_adicionar', $this->dados);
	}

	public function add_action(){

		$modelo['nome']     = $_POST['nome'];
		$modelo['telefone'] = $_POST['telefone'];
		$modelo['endereco'] = $_POST['endereco'];
		$modelo['email']    = $_POST['email'];
		$modelo['senha']    = $_POST['senha'];

		$pessoa = new Pessoa();
		$pessoa->adicionar($modelo);

		header("Location: ".BASE_URL.'pessoa');
		exit;
	}

	public function editar(){

		if(!isset($_GET['id']) || empty($_GET['id'])){
			header("Location: ".BASE_URL."pessoa");
			exit;
		}

		$pessoa = new Pessoa();
		$this->dados['pessoa'] = $pessoa->get($_GET['id']);

		$this->loadTemplate('pessoa_editar', $this->dados);
	}

	public function edit_action(){

		if(!isset($_GET['id']) || empty($_GET['id'])){
			header("Location: ".BASE_URL."pessoa");
			exit;
		}

		$modelo['id']       = $_GET['id'];
 		$modelo['nome']     = $_POST['nome'];
		$modelo['telefone'] = $_POST['telefone'];
		$modelo['endereco'] = $_POST['endereco'];
		$modelo['email']    = $_POST['email'];
		$modelo['senha']    = $_POST['senha'];

		$pessoa = new Pessoa();
		$pessoa->atualizar($modelo);

		header("Location: ".BASE_URL.'pessoa');
		exit;
	}

}