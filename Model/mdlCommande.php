<?php
require_once 'Model/model.php';

class commande extends modele{
    public function getProducts() {

        $sql = "SELECT id, name, price
                FROM products";
        $products = $this->executerRequete($sql)->fetchAll();
        return $products;
    }

    public function getCommandes($user_id){

        $sql = "SELECT * 
            FROM `order`
            WHERE client_id = {$user_id} AND `order`.`status` = 'ordered'";
        return $this->executerRequete($sql)->fetchAll();
    }

    public function getCommande($commande_id){
        $sql = "SELECT * 
                    FROM `order` 
                    INNER JOIN order_items ON order_id = id 
                    JOIN products ON products.id = product_id
                    WHERE `order`.id = {$commande_id} AND order_items.quantite != 0
                    GROUP BY product_id";
        return $this->executerRequete($sql)->fetchAll();
    }

    public function getFactures($user_id){

        $sql = "SELECT * 
                FROM `order`
                WHERE client_id = {$user_id} AND `order`.`status` = 'confirmed'";
        $factures = $this->executerRequete($sql)->fetchAll();
        return $factures;
    }

    public function sendOrder($total_price, $produits){

        $sql = "INSERT INTO `order`(total_price, client_id)
                VALUES ({$total_price}, {$_SESSION['id']})";
        $this->executerRequete($sql);
        $i = 0;

        foreach($produits as $produit){

            $sql = "INSERT INTO order_items(order_id, product_id, quantite) " .
                    "VALUES (LAST_INSERT_ID(), {$produit[0]}, {$produit[1]})";
            $this->executerRequete($sql);
            $i++;
        }
    }

    public function adminGetOrder(){
        $sql = "SELECT * 
                    FROM `order`
                    JOIN client ON client.id = client_id
                    WHERE `order`.`status` = 'ordered'
                    GROUP BY `order`.id";
        return $this->executerRequete($sql)->fetchAll();
    }

    public function adminConfirmOrder($order_id){
        $sql = "UPDATE `order`
                    SET status = 'confirmed'
                    WHERE id = {$order_id}";
        $this->executerRequete($sql);
    }
    
}