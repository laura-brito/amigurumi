<?php
class contactController extends controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->loadTemplate('contact');
    }

    public function send_email()
    {
        $to = 'laurabritolol@email.com';
        $subject = $_POST['name'];
        $headers = 'From: ' . $_POST['email'];
        $message = $_POST['message'];

        // if (mail($to, $subject, $message, $headers)) {
        //     echo "E-mail enviado com sucesso!";
        // } else {
        //     echo "Falha ao enviar o e-mail.";
        // }

        $this->loadTemplate('contact');
    }

}