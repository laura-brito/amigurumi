<?php
class checkoutController extends controller
{
    private $data;
    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function index()
    {
        $cart = new Cart();

        $this->data['products'] = $cart->getCartItems();
        $this->loadTemplate('checkout', $this->data);
    }

    public function checkout()
    {
        $cart = new Cart();
        $products = $cart->getCartItems();

        if (empty($products)) {
            $this->loadTemplate('shop/checkout', $this->data);
            exit;
        }

        $email = $_POST['email'];
        $name = $_POST['name'];
        $createAccount = $_POST['create_account'];
        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $person = new Person($name, $email, $passwordHash);

        if ($createAccount == 1 && !$person->emailExists()) {
            $result = $person->addPerson();
            if ($result == 0) {
                return;
            }
        }

        $operation = new Operation();
        $transactionId = 1;

        foreach ($products as &$product) {
            $productId = $product['id'];
            $totalQuantity = $product['quantity'];
            $totalPrice = $product['price'] * $product['quantity'];
            $unitPrice = $product['price'];
            $dateAdded = new DateTime();
            $operation->create($productId, $email, $dateAdded, $totalQuantity, $totalPrice, $unitPrice, $transactionId);
            $result = $operation->addOperation();

            if ($result == 0) {
                return;
            }
        }

        $stateUf = $_POST['state_uf'];
        $addressLine = $_POST['address_line'];
        $number = $_POST['number'];
        $complement = $_POST['complement'];
        echo $stateUf;
        $delivery = new OperationDelivery();
        $delivery->create($stateUf, $addressLine, $number, $complement, $transactionId);

        print_r($delivery);
        $result = $delivery->addOperationDelivery();
        echo 'criou delivery';

        if ($result == 0) {
            return;
        }

        $cardNumber = $_POST['card_number'];
        $cardName = $_POST['card_name'];
        $dateExpiration = $_POST['date_expiration'];
        $cardCpf = $_POST['card_cpf'];
        $cvv = $_POST['cvv'];
        $cardAmount = $_POST['card_amount'];

        $this->loadTemplate('thankyou', $this->data);
    }

    public function calculate_delivery()
    {
        $cep = intval($_POST['cep']);
        $distance = 0;
        $distance = rad2deg($cep);

        $this->data['deliveryCost'] = calculateDelivery(15, $distance);

        $this->loadTemplate('checkout', $this->data);
    }
}