<?php
class personController extends controller
{
	private $data;

	public function __construct()
	{
		parent::__construct();
		$this->data = array();
	}

	public function index()
	{
		$this->loadTemplate('pessoa', $this->data);
	}

	public function register_action()
	{
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			http_response_code(400);
			echo json_encode(['error' => 'Operação inválida.']);
		}

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if (empty($name) || empty($email) || empty($password)) {
			$this->data['errors'] = "Campos marcados com * são de preenchimento obrigatório.";
			$this->loadTemplate('register', $this->data);

			exit;
		}

		if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->data['errors'] = "E-mail inválido. Coloque um e-mail válido e tente novamente.";
			$this->loadTemplate('register', $this->data);

			exit;
		}

		if (strlen($password) < 8) {
			$this->data['errors'] = "Senha precisa ter no mínimo 8 caracteres.";
			$this->loadTemplate('register', $this->data);

			exit;
		}

		$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		$person = new Person();
		$person->create($name, $email, $passwordHash);

		if (
			$person->emailExists()
		) {
			$this->data['errors'] = "E-mail já cadastrado. Faça login para continuar.";
			$this->loadTemplate('register', $this->data);

			exit;
		}

		if (!$person->addPerson()) {
			$this->data['errors'] = "Houve um erro ao fazer seu cadastro.";
			$this->loadTemplate('register', $this->data);

			exit;
		}

		$this->loadTemplate('home', $this->data);

		exit;
	}
}