<?php

    class Errors{
        
        /************************ CONSTANTS ERRORS ************************/
            //LOGIN
                CONST ERROR_LOGIN_AUTHENTICATE_DATA              = "453214632532932154";
                CONST ERROR_LOGIN_EMPTY_PARAMS              = "45321435189321540";
                //lOGIN -> FORGOT
                CONST ERROR_LOGIN_FORGOT_EMPTY_PARAMS       = "462546804163289605";
                CONST ERROR_LOGIN_FORGOT_USER_NOT_EXIST     = "462143514300774131";
                CONST ERROR_LOGIN_FORGOT_USER_NOT_RECIVED   = "654354187354674354";
                CONST ERROR_LOGIN_FORGOT_USER_INCORRECT_ID  = "285014321875223750";
                    //Login::reset()      This is a reports for reset password
                    CONST ERROR_LOGIN_RESET_PASSWORD_SAVE  = "543960632408501";
                    CONST ERROR_LOGIN_RESET_EXPIRED_TOKEN  = "65435110221";
                    //Identify
                    CONST ERROR_LOGIN_RECOVER_EMPTY_PARAMS = "448501809641";
                    
                    
                    //RECOVER
                    CONST ERROR_LOGIN_RECOVER_USER_NOT_MATCH = "95065205065";
                    CONST ERROR_LOGIN_RECOVER_USER_NOT_EXIST = "62626565654";
        
        //SIGNUP
        CONST ERROR_SIGNUP_EMAIL_EXIST = "354135413541354";
        
        
        //Define list errors
        private $errorsList = [];

        public function __construct(){
            $this->errorsList = [
                Errors::ERROR_LOGIN_AUTHENTICATE_DATA                => 'Usuario y/o contraseña incorrectos.',
                Errors::ERROR_LOGIN_EMPTY_PARAMS                => 'Los campos no pueden estar vacios.',
                Errors::ERROR_LOGIN_FORGOT_EMPTY_PARAMS         => 'Los campos no pueden estar vacios.',
                Errors::ERROR_LOGIN_FORGOT_USER_NOT_EXIST       => 'El usuario que buscas no existe.',
                Errors::ERROR_LOGIN_FORGOT_USER_NOT_RECIVED     => 'No se ha recivido el usuario correctamente.',
                Errors::ERROR_LOGIN_FORGOT_USER_INCORRECT_ID    => 'El usuario es incorrecto.',
                //Login::reset() messages
                Errors::ERROR_LOGIN_RESET_PASSWORD_SAVE    => 'No se ha podido actualizar la contraseña.',
                //
                Errors::ERROR_LOGIN_RESET_EXPIRED_TOKEN    => 'Este enlace ya no se encuentra disponible.',
                //Login:identify()
                Errors::ERROR_LOGIN_RECOVER_EMPTY_PARAMS    => 'Debe completar el campo para continuar.',
                //Login::recover() messages
                Errors::ERROR_LOGIN_RECOVER_USER_NOT_MATCH    => 'El usuario que buscas no existe.',
                Errors::ERROR_LOGIN_RECOVER_USER_NOT_EXIST    => 'El usuario que buscas no existe o se ha eliminado. Si entiende que esto es un error <a href="#">Reportelo aqui</a>',

                //SignUp
                Errors::ERROR_SIGNUP_EMAIL_EXIST => "El email ya se ecuentra registrado. Puede iniciar sesion",

            ];
        }

        function get($hash){
            return $this->errorsList[$hash];
        }

        function existsKey($key){
            if(array_key_exists($key, $this->errorsList)){
                return true;
            }else{
                return false;
            }
        }
    }//End class
?>