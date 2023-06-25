<?php
 class MessagesManager{
     private $messageList = [];

     public function __construct()
     {

     }

     function get($hash){
         return $this->messagesList[$hash];
     }

     function existKey($key){
         if(array_key_exists($key, $this->messageList)){
             return true;
         }else{
             return false;
         }
     }
 }
?>