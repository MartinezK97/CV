<?php

class AdminModel extends Model{

    public function __construct(){
        parent::__construct();
        $this->getComponentsFile();
    }

    function getComponentsFile(){
        // print_r(scandir('models/components/'));
    }

    function componentExist($component){
        $componentModel = new ComponentsModel();
        return $componentModel->exist($component);
        // if($exist) echo "El componente que deseas crear ya existe."; return false; 
        // return true;
    }

    function saveNewComponent(){
        try{
            $query = $this->prepare("INSERT INTO components(id, component) VALUES(null, :component)");
            $query->execute(['component'=>$this->component]);
            if($query->rowCount() > 0) return true; return false;
        }catch(PDOException $e){
            debug($e);
            return false;
        }
    }


    function from($array = []){
        foreach($array as $k => $v){
            $this->$k = $v;
        }
    }

    function createPropertyColumn($name, $indexed =['column'=>'' , "table" => 'propiety']){
        if(!isset($array['column']) || empty($array['column']) || $array['column'] == ''){
            echo "<br>El nombre de columns no es valido<br>";
            exit;
        }
        try{
            $query = $this->prepare("ALTER TABLE `property` ADD `index_component` INT(11) NULL AFTER `name`");
        }catch(PDOException $e){
            debug($e);
            return false;
        }

    }

    function removePropertyColumn(){
        try{
            $query = $this->prepare("ALTER TABLE `property` DROP `index_component`");
        }catch(PDOException $e){
            debug($e);
            return false;
        }

    }
    

    










}

?>