<?php
require_once 'model.php';

class register extends modele{

    //Fonction pour insérer un nouveau client dans la BDD
    //Ne retourne rien
    public function createAccount($name, $surname, $streetNb, $streetName, $postCode, $city, $email, $password){
        $requete = "INSERT INTO client(name, surname, street_number, street_name, postcode, city, email)
                    values (?, ?, ?, ?, ?, ?, ?)";
        $this->executerRequete($requete, array($name, $surname, $streetNb, $streetName, $postCode, $city, $email));
        $requeteClient = "SELECT id FROM client WHERE name = '" . $name . "'";
        $client_id = $this->executerRequete($requeteClient)->fetchColumn(0);
        $requete = "INSERT INTO account(login, passwd, client_id)
                    VALUES (?, ?, ?)";
        $this->executerRequete($requete, array($name.$surname, $password, $client_id));
    }

    //Fonction pour checker si l'email utilisé pour créer un compte est déjà
    //utilisé. Appelée dans le routeur
    public function checkAccount($email){
        $sql = "SELECT count(*) FROM client WHERE
            email = '" . $email . "'";
        $reponse = $this->executerRequete($sql)->fetchColumn(0);
        if ($reponse == 1){
            return true;
        }
        else{
            return false;
        }
    }
}