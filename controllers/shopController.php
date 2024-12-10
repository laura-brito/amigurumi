<?php
session_start();
class shopController extends controller
{
    private $data;
    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function index()
    {
        $shop = new Product();
        $this->data['products'] = $shop->getAll();
        $this->loadTemplate('shop', $this->data);
    }
    public function product()
    {
        $id = $_GET['id'];
        $shop = new Product();
        $this->data['product'] = $shop->getById($id);
        $this->loadTemplate('product', $this->data);
    }

    public function cart()
    {
        $cart = new Cart();
        if (isset($_SESSION['deliveryCost'])) {
            unset($_SESSION['deliveryCost']);
        }

        $this->data['products'] = $cart->getCartItems();

        $this->loadTemplate('cart', $this->data);
    }


    public function add_to_cart()
    {
        $id = $_POST['product_id'];
        $quantity = $_POST['quantity'] ?? 1;

        $product = new Product();
        $item = $product->getById($id);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'id' => $id,
                'quantity' => $quantity,
                'name' => $item['name'],
                'price' => $item['featured'] == 0 ? $item['price'] : calculatePercentage($item['price'], $item['featured_percentage'])
            ];
        } else {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        }

        print_r($_SESSION['cart']);

        header("Location: " . BASE_URL . "shop/cart");
        exit;
    }

    public function remove_from_cart()
    {
        $id = $_GET['id'];

        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }

        header("Location: " . BASE_URL . "shop/cart");
        exit;
    }
}