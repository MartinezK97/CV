<?php
    class ProjectsModel extends Model{
        
        public $id;
        function __construct(){
            
            parent::__construct();
        
        }

        function getAll(){
            return true;
        }

        function getId() { return $this->id;}
        function setId($v){$this->id = $v;}
         
    
    
    }//END CLASS

?>