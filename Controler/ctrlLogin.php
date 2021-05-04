<?php
require_once 'Vue/pageView.php';
require_once 'Model/mdlLogin.php';

class Connexion{

    public $page;
    public $info;

    public function __construct(){
        $this->page = new pageView();
        $this->info = new login();
    }

    public function verificationConnexion($username, $password){ //fonction de vérification des identifiants
            try{

            if($username !== "" && $password !== ""){ //Si les champs ne sont pas vides
                $reponse = $this->info->getLoginInfo($username, $password);

                if($reponse == 1){ //login et passwd bon

                    if($this->info->getAccountType($username) == 1){
                        $_SESSION['username'] = $username;
                        $_SESSION['admin'] = true;
                        $this->page->showPage('verification');
                    }

                    else{
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['id'] = $this->info->getLoginID($username);
                        $this->page->showPage('verification');
                    }
                    
                } 

                else{
                    header('Location: index.php?action=connexion');
                }

            }
        
            else{
                header('Location: index.php?action=connexion');
            }
        }
        catch(Exception $error){
            echo $error;
        }
    }
        
    }
