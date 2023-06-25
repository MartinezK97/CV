<?php 
   class DateTimeConfig{
      public $dateTime;
      function __construct(){
         //
         $this->init();
         $this->dateTime = '';
      }

      private function init(){
         // Set local time for Uruguay
         setlocale( LC_ALL, "es_UY", "Spanish_spanish", 'spanish' );
         setlocale( LC_ALL, "UY", 10);
         
         // $date = new DateTime('Y-m-d H:i:s' se);

         echo "DateTime::init() → Is runing becose is call from construct";
         // echo "DateTime::init() -> ".strtotime($date);
         $start_date = new DateTime();
         $this->dateTime = $start_date->createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
         $token = $start_date->createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
         print_r("<br>DateTime::init() → El token fue creado: ");
         print_r("<br>");

         print_r("<br>DateTime::init() → La hora actual es: ");
         print_r($start_date);
         print_r("<br>");
      }

      

      
   }//END CLASS
   

?>