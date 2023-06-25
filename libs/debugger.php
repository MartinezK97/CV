<?php 
   class Debugger{
      public $controllers, $models, $views, $classes, $console;
      
      function __construct(){
         $this->controllers = [];
         $this->models = [];
         $this->views = [];
         $this->classes = [];
         $this->console =  [
                              $this->controllers,
                              $this->models,
                              $this->views,
                              $this->classes,
                           ];
      }

      function add( $array = []){

         // if(isset($array['controllers'])){
         //    echo "Debugger::add(): El controlador es:";
         //    print_r($array['controllers']);
         // }
         print_r("Debugger::Add()");
         print_r($array);


      }

      function console(){
         $line = '';
         $error = '';
         $success = '';
         $danger = '';
         foreach($this->console as $class => $method){

         }
      }


   }

?>