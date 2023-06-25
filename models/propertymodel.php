<?php 
    class PropertyModel extends Model{
        protected $id, $name;
        //Constructor
        function __construct(){
            parent::__construct();
        }


        function new(){
            try{
                $query = $this->prepare('INSERT INTO propertys(name) VALUES(:name)');
                $query->execute(['name'=>$this->name]);
                if($query->rowCount() > 0){
                    debug('New property create');
                    return $this->getLastId();
                }
                debug("Not create new propperty");
                return false;
            }catch(PDOException $e){
                debug($e); return false;

            }
        }   
     

        //Setters
        function setId($p){$this->id = $p;}
        function setName($p){$this->name = $p;}


        //Getters
        function getId(){return $this->id;}
        function getName(){return $this->name;}


     }//END CLASS
?>