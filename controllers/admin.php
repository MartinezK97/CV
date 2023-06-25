<?php
    require_once "models/componentsmodel.php";
    require_once "controllers/errores.php";

    class Admin extends SessionController{
        public $view;
        protected $setData, $model, $component;
        function __construct(){
            parent::__construct();
            $this->setData = [];
            $this->model = $this->loadModel('admin');
            // $this->createModelComponent('estado');
            // $this->view = new View();
        }

        function render(){
            $this->view->render('admin/index', $this->setData);
        }
        //Profile
        function profile($array = []){
            $this->view->render('admin/profile/index', $this->setData);
        }

        //Settings
        function settings($array = []){
            if(isset($array[0])){
                // if(!isset($array[1])):$this->redirect('admin/settings'); endif;
                if($array[0] == "lists"):
                    $listModel = new ComponentsModel();
                    $infoOfComponent = $listModel->getAllData();
                    $this->setData['components'] = $infoOfComponent;
                    $this->view->render('admin/settings/lists', $this->setData);
                    return;
                endif;
            }
            
        }

        
        function propertys($array = []){
            //Sin parametros
            if(!isset($array)) echo "No params"; $this->view->render('admin/propertys/index', $this->setData);
            //Con parametros
            if(isset($array[0]) && !empty($array[0])){
                switch($array[0]):
                    case 'new':
                        if(isset($array[1]) && $array[1] == 'save'){
                            $form = new FormData();
                            $form->set('admin/propertys/new');
                            print_r("<br>Admin::Propertys('new')  → Called FormData<br>");
                            print_r($form->getValues());
                            // $propertyModel->from(['name'=>$this->getPost('name')]);
                            exit;
                        }
                        $this->view->render('admin/propertys/new');
                    
                    break;//fin new
                        default:
                        $this->view->render('admin/propertys/index');

                endswitch;
            }
        }



        function components($array = []){
            $accept = ['new', 'delete','update','get']; 
            
            //If is sent params url    

            $new = function(){
                if($this->existPost(['component_name'])):
                    $name = $this->getPOST('component_name');
                    
                    if($this->model->componentExist($name)){
                        echo "El componente ya existe";
                        return false;
                    }
                
                    $this->model->from(['component'=>$name]);
                    $saved = $this->model->saveNewComponent();
                    if($saved){
                        $filecreated = $this->createModelComponent($name);
                        echo "<br>Se ha creado el archivo $name.php<br>";
                        echo "Enlazar componente a ddbb de propiedades";
                        $rewriteBD = $this->model->linkedComponentToPropietys();
                    }
                    return false;
                else:
                    echo "Admin::Components( new() ) No existe el nombre del componente";
                    return false;
                endif;
            };

            $update = function(){
                echo " executing update function";
            };
            
            
            if(isset($array[0])){
                //Accept only this values in the position [1];
               
                if(!empty($array[0]) && in_array($array[0], $accept) ){
                    echo "El parametro ". $array[0]." es una funcion";
                    $res = ${$array[0]}();
                    if($res){
                        echo "Success";
                        print_r($res);
                    }
                }
            }
        }

        
        function createModelComponent($name){
            $basefile = file_get_contents("models/basefile/componentmodel.txt", true);
            $basefile = str_replace("replaceme", $name, $basefile);

            $up = strtoUpper($name[0]);
            $basefile = str_replace("Replaceme", $name, $basefile);
            $source = "models/components/$name.php";

            $file = fopen($source, 'w');
            $file = fwrite($file, $basefile);
            if($file) return true; return false;

        }







        function company(){
            require 'company.php';
            $company = new Company();
        }



    }//End class
?>