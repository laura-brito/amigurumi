<?php
class personController extends controller
{
	private $dados;

	public function __construct()
	{
		parent::__construct();
		$this->dados = array();
	}

	public function index()
	{
		$this->loadTemplate('pessoa', $this->dados);
	}

	public function register_action()
	{
		ini_set('display_erros', 1);
		error_reporting(E_ALL);

		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			http_response_code(400);
			echo json_encode(['error' => 'Operação inválida.']);
		}

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpf = $_POST['cpf'];

		if (empty($name) || empty($email) || empty($password) || empty($cpf)) {
			http_response_code(response_code: 400);
			echo json_encode(['error' => 'Todos os campos são obrigatórios.']);
			return;
		}

		$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		$person = new Person($name, $email, $cpf, $passwordHash);

		if (
			$person->emailExists()
		) {
			http_response_code(409);
			echo json_encode(['error' => 'E-mail já cadastrado.']);
			return;
		}

		if ($person->addPerson()) {
			http_response_code(201);
			echo json_encode(['message' => 'Cadastro registrado com sucesso.']);
			header("Location: " . BASE_URL . "home");
			exit;
		} else {
			echo 'Erro';
			http_response_code(response_code: 500);
			echo json_encode(['error' => 'Erro ao registrar sua conta.']);
		}

		header("Location: " . BASE_URL . "home");
		exit;
	}

	public function edit_action()
	{

		if (!isset($_GET['id']) || empty($_GET['id'])) {
			header("Location: " . BASE_URL . "pessoa");
			exit;
		}

		$modelo['id'] = $_GET['id'];
		$modelo['nome'] = $_POST['nome'];
		$modelo['telefone'] = $_POST['telefone'];
		$modelo['endereco'] = $_POST['endereco'];
		$modelo['email'] = $_POST['email'];
		$modelo['senha'] = $_POST['senha'];

		// $pessoa = new Person();
		// $pessoa->atualizar($modelo);

		header("Location: " . BASE_URL . 'pessoa');
		exit;
	}
}