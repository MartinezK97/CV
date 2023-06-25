<?php
  //Esta clase recibe como parametro, el nombre del formulario que un usuario ha enviado.
  //Con el nombre busca un archivo nombre.json donde se especifican los nombres de los campos
  //Uso del metodo controller::getForm('') que recibe el nombre de formulario como parametro
    //para obtener un arreglo con todos los datos enviados
    
  //Cada dato es puestro a prueba para ver si aprueba los reglas establecidas en el json
  //En caso de error, se agrega a un arreglo de errores para luego devolverlo
  //En caso contrario, se agrega a un arreglo de valores de forma ['columna'=>'valor']
  
  class Validate EXTENDS Controller{
      private $form;
      function __construct(){
        //Code..
        $this->form = '';
        print_r("<br>Listado de parametros<br>");
      }

      function initiate(){
        //Si el formulario no esta puesto o es vacio se detiene
        if(!isset($this->form) || $this->form == ''): echo "Especificar formulario"; exit; endif;
        //Nombres de los campos de entrada especificados por form.json y decodificados
        $inputs = $this->getJson();
        //Recorrer los inputs para generar un array filtrado de params.json
        //Para extraer solamente los especificados en form.json guardados en $inputs
        $values = $this->getValues($inputs);
      
        $this->validateValues($values);
          // $inputs = $this->getInputs($content);
          // print_r($inputs);
      }

      function getValues($inputs = []){
        //Para cada input comporobar si existe el post
        foreach($inputs as $num=>$name){
          //Si no existe el post  
          if(!$this->existPost(array_values($inputs))){
              echo "Controller::Validate::getValues() → No existe el parametro $name";
              exit;
            }
            //Agregar el post a la variable values con el index del input
            $values[$name] = $this->getPost($name);
            // echo "Controller::Validate::getValues() → Existe el parametro $name";
          }

          return $values;
      }

      function validateValues($array = []){
          foreach($array as $key=>$val){
            echo "<br>".$key . " → ".$val; 
          }
      }

      function filterParams($array = []){
        foreach($array as $key=>$name){
          if(!key_exists($name, $this->params)){
            echo "Controller::Validate::filterParams() → No existe $name en el archivo json";
            exit;
          }
          $orderedParams[$name] = $this->params[$name];
        }
        return $orderedParams;
      }

      private function getJson(){
        $decodedJSON = $this->getJsonContent('config/json/'.$this->form.'.json');
        return $decodedJSON;
        // var_dump($decodedJSON);
      }

      function setFORM($v){ $this->form = $v;}
      function getForm(){   return $this->form;}



    }//END CLASS



 ?>