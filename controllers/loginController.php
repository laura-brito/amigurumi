<?php
session_start();
class loginController extends controller
{
	private $data;

	public function __construct()
	{
		parent::__construct();
		$this->data = array();
	}


	public function login_action()
	{

		if (empty($_POST["username"]) || empty($_POST["username"])) {
			$this->data['errors'] = "Login inválido.";
			$this->loadTemplate('login', $this->data);
		}

		$login = new Login();
		$login->username = $_POST["username"];
		$login->password = $_POST["password"];

		$redirect_url = $_POST["redirect_url"];

		if ($login->authenticate()) {
			$person = new Person();
			$_SESSION['person'] = $person->getByUsername($login->username);
		} else {
			$this->data['errors'] = "Login inválido.";
			$this->loadTemplate('login', $this->data);
		}

		if ($redirect_url == 'login') {
			$redirect_url = 'home';
		}

		$this->loadTemplate($redirect_url, $this->data);
	}

	public function logout_action()
	{
		if (isset($_SESSION['person'])) {
			unset($_SESSION['person']);
			header(header: "Location: " . BASE_URL . "home");
		}

		$this->loadTemplate('home', $this->data);
	}
}