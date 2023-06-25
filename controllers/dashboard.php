<?php
    class Dashboard extends SessionController{
        public $view;
        protected $setData, $model;
        function __construct(){
            parent::__construct();
            $this->setData = [];
            $this->setData['currentUser'] = $this->getUserSessionData();
            $this->model = $this->loadModel('user');
            // $this->view = new View();
        }

        function render(){
            $templates = new TemplatesModel();
            $this->setData['templates'] = $templates->getAll();;
            $this->view->render('dashboard/index', $this->setData);
        }

    }//End class
?>