<?php
class Person extends model
{
	public $name;
	public $cpf;
	public $email;
	public $password;

	public function __construct($name, $email, $cpf, $password)
	{
		parent::__construct();
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->cpf = $cpf;
	}

	public function addPerson()
	{
		$sql = "INSERT INTO person(name, email, cpf, password)
		        VALUES(:name, :email, :cpf, :password)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue('name', $this->name);
		$sql->bindValue('email', $this->email);
		$sql->bindValue('cpf', $this->cpf);
		$sql->bindValue('password', $this->password);
		return $sql->execute();
	}

	public function atualizar($modelo)
	{
		$sql = "UPDATE tab_pessoa
		           SET nome     = :nome
		             , telefone = :telefone
		             , endereco = :endereco
		             , email    = :email
		         WHERE id       = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue('nome', $modelo['nome']);
		$sql->bindValue('telefone', $modelo['telefone']);
		$sql->bindValue('endereco', $modelo['endereco']);
		$sql->bindValue('email', $modelo['email']);
		$sql->bindValue('id', $modelo['id']);
		$sql->execute();

		if (!empty($modelo['senha'])) {
			$this->password($modelo['id'], $modelo['senha']);
		}
	}

	public function password($id, $senha)
	{
		$sql = "UPDATE tab_pessoa
		           SET senha    = :senha
		         WHERE id       = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':senha', md5($senha));
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function getAll()
	{
		$retorno = array();

		$sql = 'SELECT * FROM person';
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

	public function get($id)
	{
		$retorno = array();

		$sql = 'SELECT * 
	         	  FROM tab_pessoa
	         	 WHERE id = :id';

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$retorno = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

	public function emailExists()
	{
		$sql = $this->db->prepare("SELECT * FROM person WHERE email = :email");
		$sql->bindValue(":email", $this->email);
		$sql->execute();
		return $sql->rowCount() > 0;

	}

	public function cpfExists()
	{
		$sql = $this->db->prepare("SELECT * FROM person WHERE cpf = :cpf");
		$sql->bindValue(":cpf", $this->cpf);
		$sql->execute();
		return $sql->rowCount() > 0;
	}

	public function authenticate($passwordToCheck)
	{

		if (password_verify($passwordToCheck, $this->password)) {
			echo "Senha correta!";
		} else {
			echo "Senha incorreta!";
		}
	}
}