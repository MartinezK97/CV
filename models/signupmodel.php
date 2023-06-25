<?php
    class SignUpModel extends Model{

        private $email, $password;

        public function __construct(){
            parent::__construct();
        }

        function set($values = []){
            foreach($values as $key=>$val){
                $this->$key = $val;
            }
        }

        function save(){
            try{
                $query = $this->prepare('INSERT INTO users(email, password) VALUES(:email, :password)');
                $query->execute([
                    'email'=>$this->email,
                    'password'=>$this->password,
                ]);
                if($query->rowCount() > 0){
                    return $this->getLastId();
                }
                return false;
            }catch(PDOException $e){
                error_log("SignUpModel::save() → $e");
                return false;
            }
        }

        function emailExist($e){
            try{
                $query = $this->prepare('SELECT id FROM users WHERE email = :email');
                $query->execute(['email'=>$e]);
                if($query->rowCount() > 0){
                    return true;
                }
                return false;
            }catch(PDOException $e){
                error_log("SignUpModel::emailExist() → $e");
                return false;
            }
        }

        function from($a = []){
            foreach($a as $k=>$v){
                $this->$k = $v;
            }
        }

        
        

    }    
?>