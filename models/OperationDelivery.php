<?php
class OperationDelivery extends model
{
    public $stateUf;
    public $addressLine;
    public $number;
    public $complement;
    public $transactionId;
    public $status;
    public $deliveryPrice;
    public function __construct()
    {
        parent::__construct();
    }
    public function create($stateUf, $addressLine, $number, $complement, $transactionId, $deliveryCost)
    {
        $this->stateUf = $stateUf;
        $this->addressLine = $addressLine;
        $this->number = $number;
        $this->complement = $complement;
        $this->transactionId = $transactionId;
        $this->status = 1;
        $this->deliveryPrice = $deliveryCost;
    }

    public function addOperationDelivery()
    {
        var_dump($this->stateUf, $this->number, $this->addressLine, $this->complement, $this->deliveryPrice);
        $sql = "INSERT INTO operation_delivery(transaction_id, address_line, number, state_uf, complement, status, delivery_price)
		        VALUES(:transaction_id, :address_line, :number, :state_uf, :complement, :status, :deliveryPrice)";

        $sql = $this->db->prepare($sql);
        $sql->bindValue('address_line', $this->addressLine);
        $sql->bindValue('transaction_id', $this->transactionId);
        $sql->bindValue('number', $this->number);
        $sql->bindValue('state_uf', $this->stateUf);
        $sql->bindValue('complement', $this->complement);
        $sql->bindValue('status', 1);
        $sql->bindValue('deliveryPrice', $this->deliveryPrice);

        return $sql->execute();
    }

    public function getByTransaction($transactionId)
    {
        $result = array();

        $sql = 'SELECT * 
	         	  FROM operation_delivery
	         	 WHERE transaction_id = :transactionId';

        $sql = $this->db->prepare($sql);
        $sql->bindValue(":transactionId", $transactionId);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetch(\PDO::FETCH_ASSOC);
        }

        return $result;
    }
}