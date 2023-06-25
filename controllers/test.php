<?php
    class Test extends SessionController{
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
        }
        function render(){
            $this->setData['test'] = $this->user->getData();
            $this->view->render('test', $this->setData); 
        } 
     }//END CLASS
?>