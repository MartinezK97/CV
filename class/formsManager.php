<?php
   class FormsManager extends Controller{
      public $form, $method, $rules, $values, $errors;

      function __construct(){
         parent::__construct();
         $this->form = '';
         $this->values = [];
         $this->errors = [];
         $this->method = 'POST';
      }

      //La funcion buscara los campos especificados en el json del form
      //Dependiendo de si es POST O GET; la funcion
      //Buscara (En post o get) los valores que se detallan en el json
      //de forma {"inputs":{"0":"inputname"}}
      //Los valores seran guardados dentro de la propiedad values;
      function getValues(){
         //Para cada entrada especificada en los inputs, recolectar su valor
         foreach($this->rules['inputs'] as $k=>$v){
            //Setear los valores a la propiedad values
            $this->values[$v] = $this->getVal($v);
         }
         //Devolver valores
         return $this->values; 
      }

      //Define la propiedad form
      //Lee el contenido del json y lo asigna a la propiedad rules en forma de array
      function set($name){
         $this->form = $name;
         $this->rules = $this->getJsonContent("config/json/forms/$name.json");
      }

      //Devulelve el valor de un campo
      //Dependiendo de si es POST O GET
      private function getVal($name){
         //Si el methodo es GET
         if($this->method == 'GET'){
            if($this->existGet([$name])):
               return $this->getGet($name);
            endif;
         }

         //Si el methodo es POST
         if($this->method == 'POST'){
            if($this->existPOST([$name])):
               return $this->getPOST($name);
            endif;
         }
      }
      //Recibe un parametro que indica que tipo de mthod es el form 
      //Se lo asigna a la propiedad method 
      function method($m){ $this->method = $m; }

      //Validar un campo
      function validate(){
         foreach($this->rules['inputs'] as $name){
            $this->showSuccess("FormsManager::Validate() → Se controlará el campo: <b>$name:</b>");

            //Si es requerido
            if(isset($this->rules[$name]['required']) && $this->rules[$name]['required']== true){
               if($this->values[$name] == ''){
                  $this->errors[$name] = "El campo $name es requerido";
                  $this->showError("FormsManager::validate() → Error: El campo $name es requerido");
               }else{
                  $this->showSuccess("FormsManager::validate() → Success: El campo $name es requerido y válido");
               }
            }

            //Validar si contiene el minimo de caracteres
            if(isset($this->rules[$name]['minlength'])){
               if(strlen($this->values[$name]) < $this->rules[$name]['minlength']){
                  $this->errors[$name] = "El campo $name debe contener al menos ".  $this->rules[$name]['minlength'] ." caracteres"; 
                  $this->showError("FormsManager::validate() → Error: El campo $name debe contener al menos ".$this->rules[$name]['minlength'] ." caracters ");

               }else{
                  $this->showSuccess("FormsManager::validate() → Success: El campo $name tiene mas de ". $this->rules[$name]['minlength'] ." caracteres");
               }
            }//End if isset minlength 

            //Si es contiene el minimo de caracteres
            if(isset($this->rules[$name]['maxlength'])){
               if(strlen($this->values[$name]) > $this->rules[$name]['maxlength']){
                  $this->errors[$name] = "El campo $name debe contener ".  $this->rules[$name]['minlength'] ." caracteres como maximo"; 
                  $this->showError("FormsManager::validate() → Error: El campo $name debe contener al menos ".$this->rules[$name]['minlength'] ." caracters ");

               }else{
                  $this->showSuccess("FormsManager::validate() → Success: El campo $name tiene menos de ". $this->rules[$name]['maxlength'] ." caracteres");
               }
            }//End if isset max length

            //Si tiene activado el modo email
            if(isset($this->rules[$name]['email']) && $this->rules[$name]['email'] == true){
               //Aplicar filtros para validar el email
               $email = filter_var($this->values['email'], FILTER_VALIDATE_EMAIL);
               //Si el email de entrada y de salida son los mismos, es valido   
               if($email == $this->values['email']){
                  $this->showSuccess('FormsManager::Validate() → Success: El formato de email es correcto');
               }else{
                  //El email no es valido
                  $this->showError("FormsManager::Validate() → El formato de email no es valido");
                  $this->errors[$name] = "El formato del email no parece ser válido";
               }
            }//endif for email

            //Si se especifica que el campo es de tipo contraseña
            if(isset($this->rules[$name]['password']) && $this->rules[$name]['password'] == true){
               //Crear hash para el password
               // $this->values[$name] = password_hash($this->values[$name], PASSWORD_DEFAULT, ['COST'=>10]);
            }//End if isset password

            //Si se especifica password_repeat
            //Necesariamente, el formulario debe contener otro campo llamado password
            if(isset($this->rules[$name]['password_repeat']) && $this->rules[$name]['password_repeat'] == true){
               //Si no se mando una contraseña en otro campo
               if(!isset($this->values['password'])): $this->showError("FormsManager::validate() → No se puede analizar la repeticion de contraseña porque no se hay con que comprararla"); endif;
               //Compare passwords
               if($this->values[$name] === $this->values['password']){
                  $this->showSuccess('FormManager::validate() → Success: Las contraseñas coinciden');
               }else{
                  $this->showError('FormManager::validate() → Error: Las contraseñas no coinciden');
                  $this->errors[$name] = "Las contraseñas no coinciden";
               }//End compare paswords
            }//End if isset password_repeat
         }//end foreach
         
         //Comprobar si no hay errores
         if(!empty($this->errors)){
            return ['errors'=>$this->errors];
         }

         //Si los valores pasaron los controles
         //Devolvemos la propiedad values
         return $this->values;
      }

   }//END CLASS

?>