<?php
class Pessoa extends model{

	public function adicionar($modelo){
		$sql = "INSERT INTO tab_pessoa(nome, telefone, endereco, email)
		        VALUES(:nome, :telefone, :endereco, :email)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue('nome'    , $modelo['nome']);
		$sql->bindValue('telefone', $modelo['telefone']);
		$sql->bindValue('endereco', $modelo['endereco']);
		$sql->bindValue('email'   , $modelo['email']);
		$sql->execute();

		$id = $this->db->lastInsertId();

		if(!empty($modelo['senha'])){
			$this->senha($id, $modelo['senha']);
		}
	}

	public function atualizar($modelo){
		$sql = "UPDATE tab_pessoa
		           SET nome     = :nome
		             , telefone = :telefone
		             , endereco = :endereco
		             , email    = :email
		         WHERE id       = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue('nome'    , $modelo['nome']);
		$sql->bindValue('telefone', $modelo['telefone']);
		$sql->bindValue('endereco', $modelo['endereco']);
		$sql->bindValue('email'   , $modelo['email']);
		$sql->bindValue('id'      , $modelo['id']);
		$sql->execute();

		if(!empty($modelo['senha'])){
			$this->senha($modelo['id'],$modelo['senha']);
		}
	}

	public function senha($id, $senha){
		$sql = "UPDATE tab_pessoa
		           SET senha    = :senha
		         WHERE id       = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':senha' ,md5($senha));
		$sql->bindValue(':id'    ,$id);
		$sql->execute();
	}

	public function getAll(){
		$retorno = array();

		$sql = 'SELECT * FROM tab_pessoa';
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

	public function get($id){
		$retorno = array();

		$sql = 'SELECT * 
	         	  FROM tab_pessoa
	         	 WHERE id = :id';

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$retorno = $sql->fetch(\PDO::FETCH_ASSOC);
		}

		return $retorno;
	}

}