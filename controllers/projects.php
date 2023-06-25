<?php
    // use User;
    require "user.php";
    class Projects extends User{
        protected $setData;
        
        function __construct(){
            parent::__construct();
            // $this->model = $this->loadModel('Projects');
            $this->setData['user'] = ["Usuario"];
        }
        
        function render(){
            $this->view->render('projects/index', $this->setData); 
        } 

        function all(){
            $this->view->render('projects/all', $this->setData); 
        }

        function drafts(){
            $this->view->render('projects/drafts', $this->setData); 
        }



        function finalized(){
            $this->view->render('projects/finalized', $this->setData); 
        }


     }//END CLASS
?>