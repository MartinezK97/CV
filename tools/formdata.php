<?php
    class FormData extends Controller{
        protected $form, $jsonConfig, $errors, $success, $values, $inputsName; 
        function __construct(){
            $this->form = '';
            $this->jsonConfig = $this->json('admin/propertys/new');
            $this->errors = [];
            $this->success = [];
            $this->values = [];
            $this->inputsName = [];
        }

        function getParamsName(){
            $inputs = [];
            foreach($this->jsonConfig as $name){
                array_push($inputs, $name);
            }
            return $inputs;
            
        }

       


        function set($f){
            $this->form = $f;
            $this->jsonConfig = $this->json($f);
        }


        function json($filename){
            if(!file_exists("config/json/forms/$filename.json")):
                echo "No existe el archivo json";
                return false;
            endif;
            return json_decode(file_get_contents("config/json/forms/$filename.json"), true);
        }


        function type(){
            if(gettype($this->value) != $this->gettype){
                echo "El valor del parametro no es del tipo esperado";
            }
        }

        function getValues(){
            foreach($this->inputsName as $key){
                $this->values[$key] = $_POST[$key];

            }
        }

        function get(){
            $this->inputsName = $this->getParamsName();
            if($this->isPost($this->inputsName) === true){
               echo "Existen todos los parametros en el post";
               $this->getValues(); 
               $this->validate();
                return $this->values;
            
            }elseif($this->isPost($this->inputsName)['errors']){
                //Se detectaron errores
                return $this->isPost($this->inputsName)['errors'];
            }
        }

        function validate(){
            print_r('<br><br>');
            $this->params = $this->json('params');
            foreach($this->inputsName as $input){
                
                echo $input;
            }
            exit;
        }


        function isPOST($array = []){
            $errors['errors'] = [];
            //Para cada uno de los nombres recibidos
            foreach($array as $name){
                if(!isset($_POST[$name])){
                    $errors['errors'][$name] = "Parametro no detectado";
                }
            }
            //No no hay errores devuelve verdadero, sino los errores
            if(empty($errors['errors'])) return true;
            return $errors;
        }



    }

?>