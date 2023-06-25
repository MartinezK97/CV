<?php 
    class TemplatesModel extends Model{
        public $id, $type, $name;

        function __construct(){
            parent::__construct();
            $this->id = '';
            $this->type = '';
            $this->name = '';
        }

        
        
        function getAll(){
            try{
                $query = $this->prepare('SELECT * FROM templates LIMIT 10');
                $query->execute([]);
                if($query->rowCount() > 0){
                    $res = [];
                    while($template = $query->fetch(PDO::FETCH_ASSOC)){
                        array_push($res, $template);
                    }
                    return $res;
                }
                return false;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }


        function exist($id){
            try{
                $query = $this->prepare("SELECT * FROM templates WHERE id = :id");
                $query->execute(['id'=>$id]);
                if($query->rowCount() > 0){
                    //Existe el id
                    return true;

                }
                return false;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }

        // function getAll(){
        //     try{
        //         $query = $this->prepare("SELECT * FROM 'templates' WHErE 'type' = 'free' ");
        //         $query->execute([]);
        //         if($query->rowCount() > 0){
        //             return $query->fetch(PDO::FETCH_ASSOC);
        //         }
        //         return false;
        //     }catch(PDOException $e){

        //         echo $e;
        //         return false;
        //     } 
        // }



     }//END CLASS
?>