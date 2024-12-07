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
        // print_r($this->data['products']);
        $this->loadTemplate('shop', $this->data);
    }
    public function detail()
    {
        $id = $_GET['id'];
        $shop = new Product();
        $product = $shop->getById($id);
        $this->loadTemplate('shop', $product);
    }
}