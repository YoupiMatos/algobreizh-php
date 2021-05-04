<?php

require_once 'View.php';

//Cette classe permet de générer la page associée à l'action envoyée dans le routeur
class pageView{
    public function showPage($action){
        $view = new View($action);
        $view->show();
    }
}