<?php 

    class ComponentsModel extends Model{
        function __construct(){
            parent::__construct();
        }

        function exist($component){
            try{
                $query = $this->prepare('SELECT * FROM components WHERE component = :component');
                $query->execute(['component'=>$component]);
                if($query->rowCount() > 0) return true;return false;
            }catch(PDOException $e){
                debug($e);
                return false;
            }
        }
        
       
        function getListsName(){
            try{
                $query = $this->prepare('SELECT * FROM components');
                $query->execute([]);
                if($query->rowCount() > 0){
                    $res = [];
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                        array_push($res, $row['component']);
                    }
                   return $res;
                }
                return false;
            }catch(PDOException $e){
                debug($e);
                return false;
            }
        }


        function getAllData(){
            $componentsName = $this->getListsName();
            $allData = [];
            foreach($componentsName as $component){
                $allData[$component] = $this->getDataComponent($component);
            }
            return $allData;
        }

        function getDataComponent($component){
            try{
                $query = $this->prepare("SELECT * FROM $component");
                $query->execute([]);
                if($query->rowCount() > 0){
                    return $query->fetch(PDO::FETCH_ASSOC);
                }
                return false;
            }catch(PDOException $e){
                debug($e);
            }
        }


     }//END CLASS

?>