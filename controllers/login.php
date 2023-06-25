<?php
class Login extends SessionController{
    protected $setData;
    function __construct(){
        parent::__construct();
        $this->model = $this->loadModel('LoginModel');
        $this->setData['errors'] = "";
    }
    //Cargar vista por defecto
    function render(){
        $this->view->render('login/index', $this->setData);
    }

    function authenticate($array = []){
        
        if( $this->getPost('username') && $this->getPost('password') ){
            //Params
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            
        

            if($username == '' || empty($username) || $password == '' || empty($password)){
                //$this->errorAtLogin('Campos vacios');
                print_r("Los campos no pueden ser vacios");
                echo "Empty username or password";
                // $this->redirect('login', ['error'=>Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                exit;
                return false;
                
            }
            
            // si el login es exitoso regresa solo el ID del usuario
            
            $user = $this->model->login($username, $password);
           
            
            if($user != NULL){
                // inicializa el proceso de las sesiones   
                $this->initialize($user);
            }else{
                //error al registrar, que intente de nuevo
                 echo json_encode('Login::authenticate() ursername or pass incorrect');
                 return; 
                print_r('Login::authenticate() ursername or pass incorrect'); 
                //$this->errorAtLogin('Nombre de usuario y/o password incorrecto');
                error_log('Login::authenticate() username and/or password wrong');
                // $this->view->render('login/index');
                // $this->redirect('login', ['errors' =>[Errors::ERROR_LOGIN_AUTHENTICATE_DATA]]);
            }
        }else{
            echo "No se ha detectado usuario o contraseña en los parametros";
            exit;
            
            $undefined['params'] = "Null parameters";
            echo json_encode($undefined);
            print_r('Login::authenticate() error with params');
            error_log('Login::authenticate() error with params');
            // $this->redirect('login', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
        }

        // $this->redirect('login', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
    }

    function error($hash){
        $this->view->render('login/index', $this->setData);
    }

    function success($array=[]){
        foreach($array as $hash=>$message){
            echo $hash;
        }
        $this->view->render('login/index', $this->setData);

    }

    // function forgot(){

    //     if($this->existPOST(['email']) && !empty($this->getPost('email'))){
    //         $email = $this->getPOST('email');
    //         if($this->model->existEmail($email)){
    //             $this->showSuccess(["Existe el email <b>$email</b>"]);
    //             $info = $this->model->getInfo($email);
    //             $this->sendEmailToken(['id'=> $info['id']]);
    //             // $this->sendEmailToken();
    //             $this->showSuccess([$info['name']]);
    //             $info['token'] = $this->generateToken();
                 
    //             $link = constant('URL')."login/forgot/".$info['id']."/".$info['token'];
    //             $send['address'] = $info['email'];
    //             $send['subject'] = $this->setData['company']['business_name'] ." - Recuperar contraseña";
    //             $send['body'] = "Para recuperar su contraseña haga click en el siguiente enlace: <a href='".$link."'>$link</a>";
                
    //             $this->show([
    //                 $link, $send['address'], $send['subject'], $send['body'], $info['token']
    //             ]);
    //             if($this->sendEmail($send)){
    //                 echo "Ingrese a su casilla de correo electronico para restablecer su contraseña";
    //                 $this->model->setToken($info['token']);
    //                 $this->model->saveToken($email);

    //             }else{
    //                 echo "No se pudo enviar el correo";
    //             }





    //             exit;

    //         }else{
    //             echo "No existe el correo elecronico";
    //         }
    //     }

    //     $this->view->render('login/forgot', $this->setData);
    // }

    // private function sendEmailToken($array=[]){
    //     $this->showSuccess([ $this->generateToken() ]);

    // }

    // function reset($array = []){
    //     if(!isset($array['1'])){
    //         echo "No existe el token";
    //         return false;
    //     }
    //     if(!isset($array[0]) || !is_numeric($array[0])){
    //         echo "El id no es valido";
    //         return false;
    //     }
    //     $id = $array[0];
    //     $userModel = new UserModel();
    //     if(!$userModel->get($id)){
    //         echo "No existe el usuario";
    //         return false;
    //     }
    //     $token = $array[1];
    //     $validateToken = $userModel->getToken();
    //     if($validateToken !== $token){
    //         echo "El token no coincide";
    //         return false;
    //     }
    //     echo "Todo ok";

    // }



    
}

?>