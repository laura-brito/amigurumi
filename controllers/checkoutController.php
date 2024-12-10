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

        $email = isset($_SESSION['person']) ? $_SESSION['person']['email'] : $_POST['email'];
        $name = isset($_SESSION['person']) ? $_SESSION['person']['name'] : $_POST['name'];

        $createAccount = $_POST['create_account'];

        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $person = new Person();
        $person->create($name, $email, $passwordHash);

        if ($createAccount) {
            if ($createAccount == 1 && !$person->emailExists()) {
                $result = $person->addPerson();
                if ($result == 0) {
                    return;
                }
            }
        }

        $operation = new Operation();
        $transactionId = generateTransactionId();
        foreach ($products as &$product) {

            $productId = $product['id'];
            $totalQuantity = $product['quantity'];
            $totalPrice = $product['price'] * $product['quantity'];
            $unitPrice = $product['featured'] ? calculateQuota($product['price'], $product['featured_percentage']) : $product['price'];
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
        $deliveryCost = $_SESSION['deliveryCost'] ?? 0;
        $delivery = new OperationDelivery();
        $delivery->create($stateUf, $addressLine, $number, $complement, $transactionId, $deliveryCost);

        $result = $delivery->addOperationDelivery();

        if ($result == 0) {
            return;
        }

        $cardNumber = $_POST['card_number'];
        $cardName = $_POST['card_name'];
        $dateExpiration = $_POST['date_expiration'];
        $cardCpf = $_POST['card_cpf'];
        $cvv = $_POST['cvv'];
        $cardAmount = $_POST['card_amount'];

        // Fazer chamada na api do banco

        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }

        $this->data['email'] = $email;
        $this->loadTemplate('thankyou', $this->data);
    }

    public function calculate_delivery()
    {
        $coupon = isset($_GET['coupon']) ? $_GET['coupon'] : null;
        if ($coupon !== null && $coupon !== '' && $coupon === 'PRIMEIRACOMPRA') {
            $result = 0;
            $_SESSION['deliveryCost'] = $result;
            header('Content-Type: application/json');
            echo json_encode(['deliveryCost' => $result]);
            exit;
        }

        $cep = intval($_GET['cep']);
        $distance = rad2deg($cep);
        $result = calculateDelivery(15, $distance, $cep);
        $_SESSION['deliveryCost'] = $result;

        header('Content-Type: application/json');
        echo json_encode(['deliveryCost' => $result]);
        exit;
    }
}