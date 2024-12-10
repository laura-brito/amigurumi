<?php
class transactionController extends controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function index()
    {
        $email = $_GET['email'];
        $operation = new Operation();
        $transactions = $operation->getAll($email);
        $groupedTransactions = [];

        foreach ($transactions as $row) {
            $transactionId = $row['transaction_id'];
            if (!isset($groupedTransactions[$transactionId])) {
                $date = new DateTime($row['date_added']);
                $date = $date->format('d/m/Y');
                $address = new OperationDelivery();
                $address = $address->getByTransaction($transactionId);

                $delivery = "{$address['address_line']}, {$address['number']} - {$address['complement']}, {$address['state_uf']}";
                $groupedTransactions[$transactionId] = [
                    'date' => $date,
                    'delivery' => $delivery,
                    'status' => $address['status'],
                    'items' => []
                ];
            }

            $groupedTransactions[$transactionId]['items'][] = $row;
        }

        foreach ($groupedTransactions as $transactionId => &$transaction) {
            $total = 0.0;
            foreach ($transaction['items'] as $item) {
                $total += (double) $item['total_price'];
            }
            $groupedTransactions[$transactionId]['total'] = $total;
        }

        $this->data['groupedTransactions'] = $groupedTransactions;
        $this->loadTemplate('transaction', $this->data);
    }

    public function detail()
    {
        $transactionId = $_GET['id'];
        $operation = new Operation();
        $transactions = $operation->getByTransaction($transactionId);
        $this->data['transactions'] = $transactions;
        $this->loadTemplate('transaction', $this->data);
    }
}