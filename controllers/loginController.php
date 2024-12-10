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
		$redirect_url = $_POST["redirect_url"];
		$isLoggedIn = false;

		if ($login->authenticate()) {
			$isLoggedIn = true;
			$person = new Person();
			$_SESSION['person'] = $person->getByUsername($login->username);
		}

		$this->loadTemplate($redirect_url, ['isLoggedIn' => $isLoggedIn, 'error' => 'Login inválido.']);
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