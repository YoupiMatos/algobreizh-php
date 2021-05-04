<?php
require_once 'model.php';

class login extends modele{
    
    //Fonction qui prends le nom d'utilisateur et le mot de passe et qui
    //renvoie 1 si la connection est bonne, et 0 si elle est mauvaise
    public function getLoginInfo($username, $password){
        $requete = "SELECT count(*) FROM account WHERE
                    login = '" . $username . "' AND passwd = '" . $password . "'";
        $reponse = $this->executerRequete($requete)->fetchColumn(0);
        return $reponse;
    }

    //Fonction qui retourne l'ID d'un utilisateur grâce à son nom d'utilisateur
    public function getLoginID($username){
        $id = "SELECT client_id FROM account WHERE login = '" . $username . "'";
        $reponse = $this->executerRequete($id)->fetchColumn(0);
        return $reponse;
    }

    public function getAccountType($username){
        $sql = "SELECT count(*) FROM account WHERE login = '{$username}' AND admin = 1";
        $reponse = $this->executerRequete($sql)->fetchColumn(0);
        return $reponse;
    }

}