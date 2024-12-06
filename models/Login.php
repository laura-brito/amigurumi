<?php
session_start();
class Login extends model
{
    public $username;
    public $password;


    public function __construct()
    {
        parent::__construct();
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(400);
            echo json_encode(['error' => 'Operação inválida.']);
            exit;
        }

        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Operação inválida.']);
            exit;
        }

        $this->username = $_POST['username'];
        $this->password = $_POST['password'];

        $sql = 'SELECT * 
	         	FROM person
	         	WHERE email = :email 
                OR    cpf = :cpf';

        $sql = $this->db->prepare($sql);
        $sql->bindValue('cpf', $this->username);
        $sql->bindValue('email', $this->username);
        $sql->execute();
        $person = $sql->fetch(\PDO::FETCH_ASSOC);

        if ($person && password_verify($this->password, $person['password'])) {
            $_SESSION['person'] = $person;
            return true;
        }

        return false;
    }

}