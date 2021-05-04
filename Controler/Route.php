  <?php
 session_start();
 require_once 'Vue/pageView.php';
 require_once 'Vue/View.php';
 require_once 'ctrlLogin.php';
 require_once 'ctrlRegister.php';
 require_once 'ctrlCommande.php';

 class Route
 {
     public $page;
     public $connexionPage;
     public $register;
     public $commande;
     public $vue;
     public $clients;

     //build a home
     public function __construct(){
         $this->page = new pageView();
         $this->connexionPage = new Connexion();
         $this->register = new ctrlRegister();
         $this->commande = new ctrlCommande();
     }

     public function getTotalPrice(){
         
         $products = $this->commande->getProducts();
         $total_price = 0;
         $quantite = 0;
         $n = 1;

         foreach($products as $product){
            
             if(isset($_POST['Quantite'.$n])){
                 $quantite = $_POST['Quantite'.$n];
             }
             $total_price = $total_price + $quantite * $product['price'];
             $n++;
         }
         return $total_price;
     }

     public function getCommandeInfo(){

        $products = $this->commande->getProducts();
        $n = 1;
        $array = [];

        foreach($products as $product){
            $array[] = [$product['id'], $_POST['Quantite'.$n]];
            $n++;
        }
        return $array;
    }

     //manage all request
     public function doRequest()
     {
         try{
             if(isset($_GET['action'])){
                 if($_GET['action'] == 'connexion'){
                    $this->page->showPage('connexion');
                 }

                 if($_GET['action'] == 'verification'){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $this->connexionPage->verificationConnexion($username, $password);
                 }

                 if($_GET['action'] == 'registerView'){
                    $this->page->showPage('register');
                 }

                 if($_GET['action'] == 'register'){
                     $name = $_POST['name'];
                     $surname = $_POST['surname'];
                     $streetNb = $_POST['streetNb'];
                     $streetName = $_POST['streetName'];
                     $postCode = $_POST['postCode'];
                     $city = $_POST['city'];
                     $email = $_POST['email'];
                     $password = $_POST['password'];
                     $this->register->createAccount($name, $surname, $streetNb, $streetName, $postCode, $city, $email, $password);
                 }

                 if($_GET['action'] == 'disconnect'){
                     $_SESSION = array();
                     if (ini_get("session.use_cookies")){
                         $params = session_get_cookie_params();
                         setcookie(session_name(), '', time()-42000,
                         $params["path"], $params["domain"],
                         $params["secure"], $params["httponly"]);
                     }
                     session_destroy();
                     $this->page->showPage('homepage');
                 }

                 if($_GET['action'] == 'commande'){
                     $this->commande->newCommande();
                 }

                 if($_GET['action'] == 'confirmerCommande'){
                    $total_price = $this->getTotalPrice();
                    $produitsCommande = $this->getCommandeInfo();
                    $this->commande->sendOrder($total_price, $produitsCommande);
                    $vue = new View('confirmCommande');
                    $vue->generer(array('produits' => $produitsCommande));
                 }

                 if($_GET['action'] == 'commandes'){
                     $commandes = $this->commande->getCommandes($_SESSION['id']);
                     $vue = new View('commandes');
                     $vue->generer(array('commandes' => $commandes));
                 }

                 if($_GET['action'] == 'afficherCommande'){
                     $commandeID = $_GET['commandeID'];
                     $commande = $this->commande->getCommande($commandeID);
                     $vue = new View('afficherCommande');
                     $vue->generer(array('commande' => $commande));
                 }

                 if($_GET['action'] == 'confirmationCommandes'){
                     $commandes = $this->commande->getAdminCommandes();
                     $vue = new View('confirmationCommandes');
                     $vue->generer(array('commandes' => $commandes));
                 }

                 if($_GET['action'] == 'adminConfirmerCommande'){
                    $this->commande->confirmerCommande($_GET['commandeID']);
                    $commandes = $this->commande->getAdminCommandes();
                    $vue = new View('confirmationCommandes');
                    $vue->generer(array('commandes' => $commandes));
                 }

                 if($_GET['action'] == 'factures'){
                     $factures = $this->commande->getFactures($_SESSION['id']);
                     $vue = new View('factures');
                     $vue->generer(array('factures' => $factures));
                 }

             }
             else{
                 $this->page->showPage('homepage'); //if nothing get to home page
             }
         }
         catch(Exception $error) {
             echo 'erreur'.  $error; //a améliorer
         }
     }
 }
