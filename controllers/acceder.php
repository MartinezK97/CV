<?php
    class Acceder extends Controller{
        protected $model;
        public $view;
        function __construct(){
            parent::__construct();
            $this->model = new LoginModel();
        }

        function render(){
            $this->view->render('login/index');
        }
    


        function authenticate(){
            $this->report('msg','Login::authenticate','Executing method...');
            //Comprobar si existen los post
            if( !$this->existPOST(['username', 'password']) ){
                $this->report('msg','Login::authenticate','No existen los parametros');
                $this->report('msg','Login::authenticate','Los campos no pueden ser vacios');
                $this->redirect('login');
            }
            if( $this->existPOST(['username', 'password']) ){
                $username = $this->getPost('username');
                $password = $this->getPost('password');
                $this->report('msg','Login::authenticate', 'u: $username, p:true');
                //validate data
                if($username == '' || empty($username) || $password == '' || empty($password)){
                    //$this->errorAtLogin('Campos vacios');
                    $this->report('msg', 'Login::method','Login::authenticate() → empty');
                    //$this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                    // echo json_encode(['Error'=>'Complete todos los campos']);
                    echo "Complete todos los campos";
                    $this->redirect('login', ['error'=>Errors::ERROR_LOGIN_EMPTY_PARAMS]);
                }
    
                
                // si el login es exitoso regresa solo el ID del usuario
                
                $user = $this->model->login($username, $password);
    
                if($user != NULL){
                    // inicializa el proceso de las sesiones
                    $this->initialize($user);
                    $this->report('msg', 'Login::authenticate','El ususario no es nulo');    
                }else{
                    //Error de credenciales
                    $this->report('msg', 'Login::authenticate','Username and/or password wrong');
                    $this->redirect('login/error');
                    return;
                }
            }else{
                //Not exist username or password
                //Debug
                $this->report('msg', 'Login::authenticate','Not exist index username or password');
                $this->redirect('login');
                return false;
            }
        }

        function send($array = []){
        if(!isset($array[0])): $this->redirect('login/confirmate/error'); endif;

    }

    function identify(){
        $this->view->render('login/identify');
    }

    function recover(){
        if($this->existPost(['forgot_user'])){
            //$searched contiene el valor del campo
            $searched = $this->getPost('forgot_user');
            //Comprobar que lo enviado no es nulo ni vacio
            if(empty($searched)): $this->redirect('login/identify', ['error'=>Errors::ERROR_LOGIN_RECOVER_EMPTY_PARAMS]); endif;
            
            $user = $this->model->searchUser($searched);
            if($user){
                $this->view->render('login/confirmate', ['userdata'=>$user]);
                return;
            }
            $this->redirect('login/identify', ['error'=>Errors::ERROR_LOGIN_RECOVER_USER_NOT_MATCH]);
            echo "No existe el usuario buscado: <b>$searched</b>";
            exit;
            
            
             
        }else{
         $this->redirect('login/identify/error');
        }
    }

    function reset($array = []){
        //Comprobar si por URL llegan dos parametros [id_de_usuario, token]
        if(!isset($array[0]) || !isset($array[1])): echo "Login::Reset() → Faltan parametros en la url"; return; endif;
        $id = $array[0];
        //Validar el id de usuario en el modelo
        $validateUser = $this->model->exist($id);
        //Si es valido, analizamos el token
        if($validateUser){
            //El id de usuario es valido
            // echo "Login::reset() → Id de usuario valido";
            // $this->report('success', "Login::reset", "Id de usuario valido");
            $token = $array[1];
            $validateToken = $this->model->validateTokenResetPassword($id, $token);
            if($validateToken){
                //El token es valido
                //Comprobar si existe un 'save' en la url
                if(isset($array[2]) && $array[2] == 'save'){
                    //Se ha detectado un 'save' en la url
                    echo "Login::reset() → Se debe actualizar la contraseña en la db";
                    if(!$this->existPOST(['new_password', 'r_new_password', 'token'])){
                        echo "No se ha enviado la nueva contraseña";
                        return;
                    }
                    
                    $pass = $this->getPost('new_password');
                    $rpass = $this->getPost('r_new_password');
        
                    if($pass !== $rpass){
                        echo "Las contraseñas no coinciden";
                        return false;
                    }
                    echo "Todo ok, Cambiar la contraseña del usuario $id a $pass";
                    $updated = $this->model->changePassword($id, $pass);
                    if($updated){
                        //Contraseña actualizada
                        $this->redirect('login/', ['success'=>Success::SUCCESS_LOGIN_RESET_PASSWORD_SAVE]);
                        echo "Contraseña actualizada";
                        exit;
                    }
                    echo "No actualizado";
                    exit;
                    // $this->redirect("login/reset/$id/$token", ['error'=>Errors::ERROR_LOGIN_RESET_PASSWORD_SAVE]);
                }
                //No se ha detectado 'save' en la url
                //Default view
                $this->view->render('login/reset_pass', ['datauser'=>['id'=>$id,'token'=>$token]]);
                
                return;
            }
            $this->view->render('errores/reset');
            exit;
        }else{
            //El id de usuario no existe o esta deshabilitado
            echo "Login::reset() → El id de usuario '$id' no existe, o ha sido dehabilitado";
            $this->redirect('login', ['error'=> Errors::ERROR_LOGIN_RECOVER_USER_NOT_EXIST]);
            exit;
        }
        if(isset($array[2]) && $array[2] == 'save'){
            echo "Login::reset() → Se detectp 'save' en la url";
            
        }else{
            echo $token;
        }
        $this->view->render('login/reset_pass', ['datauser'=>$id]);
        return;
    }


}//END CLASS

?>