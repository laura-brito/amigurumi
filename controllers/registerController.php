<?php
class registerController extends controller
{

    private $dados;

    public function __construct()
    {
        parent::__construct();
        $this->dados = array();
    }

    public function index()
    {
        $this->loadTemplate('register', $this->dados);
    }

}