<?php
class Person extends model
{
	public $name;
	public $email;
	public $password;

	public function __construct($name, $email, $password)
	{
		parent::__construct();
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}

	public function addPerson()
	{
		$sql = "INSERT INTO person(name, email, password)
		        VALUES(:name, :email, :password)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue('name', $this->name);
		$sql->bindValue('email', $this->email);
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

}