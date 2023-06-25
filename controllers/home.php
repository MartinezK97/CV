<?php
    //Default controller
    class Home extends Controller{
        private $setData;
        function __construct(){
            //Instance of Controller()
            parent::__construct();
            $this->setData['menu']['select'] = 'home';
        }

        //Default view
        function render(){
            $this->view->render('index', $this->setData);

        }
    }//END CLASS

?>