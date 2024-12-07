<?php
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
        // $id = $_GET['id'];
        $shop = new Product();
        // $this->data['product'] = $shop->getById($id);
        $this->loadTemplate('cart', $this->data);
    }

    public function checkout()
    {
        // $id = $_GET['id'];
        $shop = new Product();
        // $this->data['product'] = $shop->getById($id);
        $this->loadTemplate('checkout', $this->data);
    }
}