<?php

class Errores extends Controller{
    public $view;
    function __construct($n){
        parent::__construct();

        if(file_exists("views/errors/$n.php")){
            $this->view->render("errors/$n");
        }
      
    }
}

?>