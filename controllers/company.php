<?php
    class Company extends Admin{
        function __construct(){
            parent::__construct();
            $this->render();
            // $this->view->render('admin/company/index', $this->setData);
        }
        function render(){
            $this->view->render('admin/company/index', $this->setData); 
        } 
     }//END CLASS
?>