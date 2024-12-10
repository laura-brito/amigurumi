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
        $stateUf = $_POST['state_uf'];
        $addressLine = $_POST['address_line'];
        $number = $_POST['number'];
        $complement = $_POST['complement'];

        $cardNumber = $_POST['card_number'];
        $cardName = $_POST['card_name'];
        $dateExpiration = $_POST['date_expiration'];
        $cardCpf = $_POST['card_cpf'];
        $cvv = $_POST['cvv'];
        $cardAmount = $_POST['card_amount'];

        if (!isset($_SESSION['deliveryCost'])) {
            $this->data['errors'] = "Calcule o frete antes de continuar.";
            $this->loadTemplate('checkout', $this->data);

            exit;
        }

        if (empty($stateUf) || empty($addressLine) || empty($number)) {
            $this->data['errors'] = "Campos marcados com * são de preenchimento obrigatórios.";
            $this->loadTemplate('checkout', $this->data);

            exit;
        }

        if (empty($cardNumber) || empty($cardName) || empty($dateExpiration) || empty($cardCpf) || empty($cvv)) {
            $this->data['errors'] = "Informações de pagamento inválidas.";
            $this->loadTemplate('checkout', $this->data);

            exit;
        }

        $cart = new Cart();
        $products = $cart->getCartItems();

        if (empty($products)) {
            $this->data['errors'] = "O carrinho está vazio. Adicione itens para continuar.";
            $this->loadTemplate('shop/checkout', $this->data);
            exit;
        }

        $email = isset($_SESSION['person']) ? $_SESSION['person']['email'] : $_POST['email'];
        $name = isset($_SESSION['person']) ? $_SESSION['person']['name'] : $_POST['name'];

        if (empty($email) || $email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->data['errors'] = "E-mail inválido ou não informado.";
            $this->loadTemplate('checkout', $this->data);
            exit;
        }

        $createAccount = $_POST['create_account'];

        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $person = new Person();
        $person->create($name, $email, $passwordHash);

        if ($createAccount) {
            if ($createAccount == 1 && !$person->emailExists()) {
                $result = $person->addPerson();
                if ($result == 0) {
                    $this->data['errors'] = "E-mail inválido. Tente novamente.";
                    $this->loadTemplate('checkout', $this->data);
                    return;

                }
            } else {
                $this->data['errors'] = "E-mail já cadastrado, faça login para continuar.";
                $this->loadTemplate('checkout', $this->data);

                exit;
            }
        }

        $operation = new Operation();
        $transactionId = generateTransactionId();
        foreach ($products as &$product) {

            $productId = $product['id'];
            $totalQuantity = $product['quantity'];
            $totalPrice = $product['price'] * $product['quantity'];
            $unitPrice = $product['featured'] == 1 ? calculatePercentageWhitoutFormat($product['price'], $product['featured_percentage']) : $product['price'];
            $dateAdded = new DateTime();
            $operation->create($productId, $email, $dateAdded, $totalQuantity, $totalPrice, $unitPrice, $transactionId);
            $result = $operation->addOperation();

            if (!$result) {
                return;
            }
        }

        $deliveryCost = $_SESSION['deliveryCost'] ?? 0;
        $delivery = new OperationDelivery();
        $delivery->create($stateUf, $addressLine, $number, $complement, $transactionId, (double) $deliveryCost);

        $result = $delivery->addOperationDelivery();

        if (!$result) {
            return;
        }

        // Fazer chamada na api do banco

        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        if (isset($_SESSION['deliveryCost'])) {
            unset($_SESSION['deliveryCost']);
        }

        $this->data['email'] = $email;
        $this->loadTemplate('thankyou', $this->data);
    }

    public function calculate_delivery()
    {
        $operation = new Operation();
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        if (isset($_SESSION['person'])) {
            $email = $_SESSION['person']['email'];
        }

        $operations = $operation->getAll($email);

        $coupon = isset($_GET['coupon']) ? $_GET['coupon'] : null;
        if ($coupon !== null && $coupon !== '' && $coupon === 'PRIMEIRACOMPRA' && empty($operations)) {
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
        echo json_encode(['deliveryCost' => $result, 'couponInvalid']);
        exit;
    }
}