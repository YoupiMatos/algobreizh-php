<?php
require_once 'Vue/pageView.php';
require_once 'Model/mdlRegister.php';

class ctrlRegister{

    public $page;
    public $reg;

    public function __construct(){
        $this->page = new pageView();
        $this->reg = new register();
    }

    //Crée le compte si l'email utilisé n'est pas déjà utilisé
    public function createAccount($name, $surname, $streetNb, $streetName, $postCode, $city, $email, $password){
        try{
            if ($this->reg->checkAccount($email) == false){
                $this->reg->createAccount($name, $surname, $streetNb, $streetName, $postCode, $city, $email, $password);
            }
            else{
                $this->page->showPage('register');
            }
            $this->page->showPage('verificationRegister');
        }

        catch(Exception $error){
            echo $error;
        }
    }
}