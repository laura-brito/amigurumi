<?php
class Operation extends model
{
    public $productId;
    public $personEmail;
    public $dateAdded;
    public $totalQuantity;
    public $totalPrice;
    public $unitPrice;
    public $transactionId;
    public function __construct()
    {
        parent::__construct();
    }
    public function create($productId, $personEmail, $dateAdded, $totalQuantity, $totalPrice, $unitPrice, $transactionId)
    {
        $this->productId = $productId;
        $this->personEmail = $personEmail;
        $this->dateAdded = $dateAdded;
        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
        $this->unitPrice = $unitPrice;
        $this->transactionId = $transactionId;
    }

    public function addOperation()
    {

        $sql = "INSERT INTO operation(product_id, person_email, date_added, total_quantity, total_price, unit_price, transaction_id)
		        VALUES(:product_id, :person_email, :date_added, :total_quantity, :total_price, :unit_price, :transaction_id)";

        $sql = $this->db->prepare($sql);
        $sql->bindValue('unit_price', $this->unitPrice);
        $sql->bindValue('transaction_id', $this->transactionId);
        $sql->bindValue('total_price', $this->totalPrice);
        $sql->bindValue('total_quantity', $this->totalQuantity);
        $sql->bindValue('date_added', $this->dateAdded->format('Y-m-d H:i:s'));
        $sql->bindValue('person_email', $this->personEmail);
        $sql->bindValue('product_id', $this->productId);

        return $sql->execute();
    }

    public function getByTransaction($transactionId)
    {
        $result = array();
        $sql = 'SELECT * FROM operation as o 
                inner join operation_delivery as od on od.transaction_id = o.transaction_id 
                inner join product as pr on pr.id = o.product_id 
                where o.transaction_id = :transactionId;';

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":transactionId", $transactionId);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $result;
    }

    public function getAll($email)
    {
        $result = array();
        $sql = 'SELECT * FROM operation as o 
                inner join operation_delivery as od on od.transaction_id = o.transaction_id 
                inner join product as pr on pr.id = o.product_id 
                where o.person_email = :email
                order by o.date_added desc;';

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $result;
    }

}