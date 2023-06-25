<?php

class Success{
    
    /*INSERTS*/
    const SUCCESS_CONTROLLER_METHOD     = "123456789";
    const SUCCESS_LOGIN_RESET_PASSWORD_SAVE     = "543413582574113510";

    //SIGNUP
    const SUCCESS_SIGNUP_NEW_USER = "46324652154165";
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            Success::SUCCESS_CONTROLLER_METHOD => "Vehículo guardado exitosamente.",
            Success::SUCCESS_LOGIN_RESET_PASSWORD_SAVE => "Se ha actualizado su contraseña.",
            //SIGNUP
            Success::SUCCESS_SIGNUP_NEW_USER => "Usuario guardado. Inicie sesion.",

        ];
    }

    function get($hash){
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>