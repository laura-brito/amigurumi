<?php
class aboutController extends controller
{

    private $dados;

    public function __construct()
    {
        parent::__construct();
        $this->dados = array();
    }

    public function index()
    {
        $this->loadTemplate('about', $this->dados);
    }

}