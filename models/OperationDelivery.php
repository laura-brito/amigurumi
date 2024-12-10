<?php
class OperationDelivery extends model
{
    public $stateUf;
    public $addressLine;
    public $number;
    public $complement;
    public $transactionId;
    public function __construct()
    {
        parent::__construct();
    }
    public function create($stateUf, $addressLine, $number, $complement, $transactionId)
    {
        $this->stateUf = $stateUf;
        $this->addressLine = $addressLine;
        $this->number = $number;
        $this->complement = $complement;
        $this->transactionId = $transactionId;
    }

    public function addOperationDelivery()
    {
        $sql = "INSERT INTO operation_delivery(transaction_id, address_line, number, state_uf, complement)
		        VALUES(:transaction_id, :address_line, :number, :state_uf, :complement)";

        $sql = $this->db->prepare($sql);
        $sql->bindValue('address_line', $this->addressLine);
        $sql->bindValue('transaction_id', $this->transactionId);
        $sql->bindValue('number', $this->number);
        $sql->bindValue('state_uf', $this->stateUf);
        $sql->bindValue('complement', $this->complement);

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