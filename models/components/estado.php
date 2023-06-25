<?php 
    class estado extends Model{
        protected $id, $value;
        function __construct(){
            parent::__construct();
            $this->id = '';
            $this->value = '';
        }
        //Get by id
        function get($id){
            try{
                $query = $this->prepare('SELECT * FROM estado WHERE id = :id');
                $query->execute(['id'=>$id]);
                if($query->rowCount() > 0 ): return $query->fetch(PDO::FETCH_ASSOC); endif;
                return false;
            }catch(PDOException $e){
                debug($e);
                return false;
            }
        }
        //Get all
        function getAll(){
            try{
                $query = $this->prepare('SELECT * FROM estado');
                $query->execute([]);
                if($query->rowCount() > 0 ):
                    return $query->fetch(PDO::FETCH_ASSOC); 
                endif;
                return false;
            }catch(PDOException $e){
                debug($e);
                return false;
            }
        }

        function delete($id){
            try{
                $query = $this->prepare('DELETE FROM estado WHERE id = :id');
                $query->execute(['id'=>$id]);
                if($query->rowCount() > 0 ): return true; endif;
                return false;
            }catch(PDOException $e){
                debug($e);
                return false;
            }
        }
        function update($id){
            try{
                $query = $this->prepare('UPDATE estado SET(value = :value) WHERE id = :id');
                $query->execute(['value'=>$this->value, 'id'=>$id]);
                if($query->rowCount() > 0 ): return true; endif;
                return false;
            }catch(PDOException $e){
                debug($e);
                return false;
            }
        }
        function from($array = []){
            foreach($array as $key=>$val){
                $this->$key = $val;
            }
        }

        // Getters
        function setId($p){$this->id = $p;}
        function setValue($p){$this->value = $p;}
        
        // Getters
        function getId(){return $this->id;}
        function getValue(){return $this->value;}



     }//END CLASS

?>