<?php
class View
{
    private $file;

    public function __construct($action){
        $this->file = "Vue/".$action.".php";
    }

    public function show(){
        //genere la page demander
        $content = $this->prepareFile($this->file, array()); //tableau vide qui serviras a générer des donnée
        //genere la page de demander plus l'habillage(gab.php)
        $view = $this->prepareFile('Vue/gab.php' , array('content' => $content));
        echo $view;

        //cette version fonctionne
        /*$view = $this->prepareFile($this->file);
        echo $view;*/
    }

    public function generer($array) {
        // Génération de la partie spécifique de la vue
        $content = $this->prepareFile($this->file, $array);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->prepareFile('Vue/gab.php',
                array('content' => $content));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    public function prepareFile($file, $array) {
        if (file_exists($file)){

        extract($array); //$content must be an array
        ob_start();
        require $file;
        return ob_get_clean();
        }
        else {
            throw new Exception('Fichier'.$file.'introuvable' );
            //show path of file not found
        }
    }
}
