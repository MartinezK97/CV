<?php
    class Document extends SessionController{
        protected $setData, $user;
        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            $this->setData['currentUser'] = $this->getUserSessionData();
            // print_r($this->setData['currentUser']);
        }

        function render(){
            $this->view->render('document/index', $this->setData); 
        } 

        function edit($array = []){
            //Si no se manda el id
            if(!isset($array[0])){ echo "Document::edit(): No se ha especificado el id del template a editar en la url.<br>"; exit;}
            // Comprobar si existe el id
            $templatesModel = new TemplatesModel();
            $id = intval($array[0]);
            if(!$templatesModel->exist($id)){
                echo "Document::edit(): No existe el id del template<br>";
                exit;
            }
            $this->setData['template'] = $id;
            $this->setData['userStyles'] = $this->user->getData();
            // $this->setData['currentUser'] = $this->getUserSession();
            $this->view->render('document/edit', $this->setData);
            
        }

        function setUserInfoIntoTemplate(){}
     }//END CLASS

?>