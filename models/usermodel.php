<?php

class UserModel extends Model {

    private $id;
    private $username;
    private $password;
    private $email;
    private $role;
    private $photo;
    private $name;
    private $token;
    private $data;

    public function __construct(){
        parent::__construct();

        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->role = '';
        $this->photo = '';
        $this->name = '';
        $this->token = '';
        $this->data = '';
    }

    
    

    function updateName($name, $iduser){
        try{
            $query = $this->db->connect()->prepare('UPDATE users SET name = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePhoto($name, $iduser){
        try{
            $query = $this->prepare('UPDATE users SET photo = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->db->connect()->prepare('UPDATE users SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function comparePasswords($current, $userid){
        try{
            $query = $this->db->connect()->prepare('SELECT id, password FROM USERS WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['password']);

            return NULL;
        }catch(PDOException $e){
            return NULL;
        }
    }



    public function save(){
        try{
            $query = $this->prepare('INSERT INTO users (username, password, email, role, photo, name, data) VALUES(:username, :password, email, :role, :photo, :name, :data )');
            $query->execute([
                'username'  => $this->username, 
                'password'  => $this->password,
                'email'     => $this->email,
                'role'      => $this->role,
                'photo'     => $this->photo,
                'name'      => $this->name,
                'data'      => json_encode($this->data),
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    } 

    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM users');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password'], false);
                $item->setEmail($p['email']);
                $item->setRole($p['role']);
                $item->setPhoto($p['photo']);
                $item->setName($p['name']);
                $item->setData($p['data']);
                

                array_push($items, $item);
            }
            return $items;


        }catch(PDOException $e){
            echo $e;
        }
    }

    /**
     *  Gets an item
     */
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->password = $user['password'];
            $this->role = $user['role'];
            $this->photo = $user['photo'];
            $this->name = $user['name'];
            $this->data = $user['data'];
            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE users SET username = :username, password = :password, email = :email,  photo = :photo, data = :data, name = :name WHERE id = :id');
            $query->execute([
                'id'        => $this->id,
                'username' => $this->username, 
                'password' => $this->password,
                'email' => $this->email,
                'photo' => $this->photo,
                'name' => $this->name,
                'data' => $this->data,

                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function exists($id){
        try{
            $query = $this->prepare('SELECT username FROM users WHERE id = :id');
            $query->execute( ['id' => $id]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    

    public function from($array){
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->email = $array['email'];
        $this->role = $array['role'];
        $this->photo = $array['photo'];
        $this->name = $array['name'];
        $this->data = $array['data'];
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public function setUsername($username){ $this->username = $username;}
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }

    function saveNewToken(){
       try{
            $query = $this->prepare("UPDATE users SET token = :token, token_time = :tokenTime WHERE id = :id");
            $query->execute([
                'token'=>$this->token,
                'tokenTime'=>date('Y-m-d H:i:s'),
                'id'=>$this->id,
            ]);
            if($query->rowCount() > 0){
                return true;
            }
            return false;
       }catch(PDOException $e){
            echo "UserModel::saveNewToken() → $e";
       } 
    }

    function validateToken($token){
        try{
            $query = $this->prepare("SELECT id FROM users WHERE (id= :id AND token = :token)");
            $query->execute([
                'id'=>$this->id,
                'token'=>$token
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            return false;

        }catch(PDOException $e){
            echo "UserModel::validateToken() → $e";
        }
    }

    public function setId($id){             $this->id = $id;}
    public function setRole($role){         $this->role = $role;}
    public function setPhoto($photo){       $this->photo = $photo;}
    public function setName($name){         $this->name = $name;}
    public function setEmail($name){        $this->email = $name;}
    public function setToken($name){        $this->token = $name;}
    public function setTokenTime($name){    $this->tokenTime = $name;}
    public function setData($str = []){          $this->data = $str;}

    public function getId(){        return $this->id;}
    public function getUsername(){  return $this->username;}
    public function getPassword(){  return $this->password;}
    public function getEmail(){     return $this->email;}
    public function getRole(){      return $this->role;}
    public function getPhoto(){     return $this->photo;}
    public function getName(){      return $this->name;}
    public function getToken(){     return $this->token;}
    public function getData(){      return json_decode($this->data, true);}
}

?>