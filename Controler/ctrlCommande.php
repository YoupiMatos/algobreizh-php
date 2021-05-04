<?php
require_once 'Model/mdlCommande.php';
require_once 'Vue/View.php';

class ctrlCommande{

    private $commande;

    public function __construct(){
        $this->commande = new commande;
    }

    public function factures(){
        $factures = $this->commande->getFactures();
        $vue = new View('factures');
        $vue->generer(array('factures' => $factures));
    }

    public function newCommande(){
        $products = $this->commande->getProducts();
        $vue = new View('newCommande');
        $vue->generer(array('produits' => $products));
    }

    public function sendOrder($total_price, $produits){
        $this->commande->sendOrder($total_price, $produits);
    }

    public function getProducts(){
        return $this->commande->getProducts();
    }

    public function getCommandes($user_id){
        return $this->commande->getCommandes($user_id);
    }
    
    public function getCommande($commande_id){
        return $this->commande->getCommande($commande_id);
    }

    public function getFactures($user_id){
        return $this->commande->getFactures($user_id);
    }

    public function getAdminCommandes(){
        return $this->commande->adminGetOrder();
    }

    public function confirmerCommande($order_id){
        $this->commande->adminConfirmOrder($order_id);
    }
}