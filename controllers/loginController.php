<?php
session_start();
class loginController extends controller
{


	public function __construct()
	{
		parent::__construct();
	}


	public function login_action()
	{

		$login = new Login();
		$login->username = $_POST["username"];
		$login->password = $_POST["password"];

		$isLoggedIn = false;

		if ($login->authenticate()) {
			$isLoggedIn = true;
		}

		$this->loadTemplate('home', ['isLoggedIn' => $isLoggedIn, 'error' => 'Login inválido.']);

		exit;
	}

	public function logout_action()
	{
		if (isset($_SESSION['person'])) {
			unset($_SESSION['person']);
			header("Location: " . BASE_URL . "home");
		}

		$this->loadTemplate('home', ['isLoggedIn' => false, 'error' => 'Login inválido.']);
	}
}