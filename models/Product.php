<?php
class Product extends model
{
    public $name;
    public $id;
    public $price;
    public $size;
    public $featured;
    public $description;

    public function __construct()
    {
        parent::__construct();
    }


    public function getAll()
    {
        $products = array();

        $sql = 'SELECT * FROM product';
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $products = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $products;
    }

    public function getById($id)
    {
        $retorno = array();

        $sql = 'SELECT * 
	         	  FROM product
	         	 WHERE id = :id';

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $retorno = $sql->fetch(\PDO::FETCH_ASSOC);
        }

        return $retorno;
    }

}