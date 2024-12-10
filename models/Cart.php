<?php
class Cart extends model
{
    public $id;
    public $product_id;
    public $person_id;
    public $quantity;

    public function __construct()
    {
        parent::__construct();
    }

    function getCartItems()
    {
        $cart = $_SESSION['cart'] ?? [];

        if (empty($cart)) {
            return [];
        }

        $ids = array_keys($cart);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = $this->db->prepare("SELECT * FROM product WHERE id IN ($placeholders)");
        $sql->execute($ids);

        $products = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as &$product) {
            $product['quantity'] = $cart[$product['id']]['quantity'] ?? 0;
        }

        return $products;
    }

    function add_operation()
    {
        $products = $this->getCartItems();
        if (empty($products)) {
            return [];
        }

        foreach ($products as &$product) {
            echo $product;
        }

        // return $products;
    }
}