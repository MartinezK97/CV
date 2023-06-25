<?php
    class Templates extends Controller{
        protected $setData;
        protected $model;
        protected $templates;
        
        function __construct(){
            parent::__construct();
            // $this->model = $this->loadModel('templates');
            $this->setData = [];
            $this->setData['currentUser'] = json_decode(file_get_contents('config/json/defaultUserInfo.json'), true);

            
        }
        
        function render(){
            $this->setData['templates'] = $this->model->getAll();
            $this->view->render('templates/index', $this->setData); 
        } 

        function preview($array = []){
            if(isset($array[0]) && !empty($array[0])){
                $templateId = $array[0];
                //Si no existe el id
                if(!$this->model->exist($templateId)){
                    echo "No existe el template.";
                    return false;
                }
                // $this->previewTemplate($array[0]);
                $demoUser = json_decode(file_get_contents('config/json/defaultUserInfo.json'), true);
                $this->view->render('templates/preview', ['template'=>$templateId, 'currentUser'=>$demoUser]);

                return;
            }
            echo "Sin parametros en la url";
            return;
        }

        function getAllTemplates(){
            //  $this->model->getAllFree();
        }



        



     }//END CLASS


?>