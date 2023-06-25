<?php

class LoginModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        try{
            $query = $this->prepare('SELECT * FROM users WHERE username = :username');
            $query->execute(['username' => $username]);
            
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC); 

                $user = new UserModel();
                $user->from($item);

                error_log('login: user id '.$user->getId());

                if(password_verify($password, $user->getPassword())){
                    
                    //return ['id' => $item['id'], 'username' => $item['username'], 'role' => $item['role']];
                    return $user;
                    //return $user->getId();
                }else{
                    return NULL;
                }
            } 
        }catch(PDOException $e){
            return NULL;
        }
    }

    function searchUser($user){
        try{
            $sql = "SELECT * FROM users WHERE username = :username OR mail = :mail OR phone = :phone";
            $query = $this->prepare($sql);
            $query->execute([
                'username'=>$user,
                'mail'=>$user,
                'phone'=>$user,
            ]);
            if($query->rowCount() > 0){
                $response = [];
                $user = $query->fetch(PDO::FETCH_ASSOC);
                $response['id'] = $user['id'];

                if(!empty($user['phone'])){
                    $response['phone'] = $user['phone'];
                }

                if(!empty($user['mail'])){
                    $response['mail'] = $user['mail'];
                }

                if(!empty($user['username'])){
                    $response['username'] = $user['username'];
                }
                return $response;
            }
            return false;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    function exist($id){
        try{
            $query = $this->prepare('SELECT id FROM users WHERE id = :id');
            $query->execute(['id'=>$id]);
            if($query->rowCount() > 0): return true; endif;
            return false;

        }catch(PDOException $e){
            error_log("LoginModel::exist() → $e");
        }

    }

    function validateTokenResetPassword($id, $token){
        try{
            $query = $this->prepare('SELECT token_time FROM users WHERE (id =:id AND token = :token)');
            $query->execute([
                'id'=>$id,
                'token'=>$token,
            ]);
            if($query->rowCount() > 0){
                //Valor que viene desde la BBDD [y-m-d h:i:s];
                $created = $query->fetch(PDO::FETCH_ASSOC)['token_time'];
                //Right now
                $rn = new DateTime();
                $from = new DateTime($created);

                $rn->modify('- '.constant('expired_token_reset_password'));
                if($from > $rn->modify('- '.constant('expired_token_reset_password')) ){
                    //La diferencia es menor a 30 minutos";
                    return true;
                }else{
                    return false;
                } 
            }
            return false;
        }catch(PDOException $e){
            echo "Login::validateTokenResetPassword() → Error: $e";
            return false;
        }
    }

    function changePassword($id, $pass){
        try{
            $query = $this->prepare('UPDATE users SET password = :pass WHERE id = :id');
            $query->execute([
                'pass'=>password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]),
                'id'=>$id,
            ]);
            if($query->rowCount() > 0){
                return true;
            }
            return false;
        }catch(PDOException $e){
            echo "LoginModel::changePassword() → Error: $e";
            return false;
        }
    }

    

    

}
?>