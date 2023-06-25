<?php

class Controller {

    public $view;
    protected $model;
    //Construye la clase
    function __construct(){
        $this->view = new View();
    }

    //Carga el modelo
    function loadModel($model){
        $dir = 'models/'.$model.'model.php';
        if(file_exists($dir)){
            require_once $dir;
            // $model = ucfirst($model);
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function existPOST($params = []){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                $this->report('dan','Controller::existPost',"No existe el parametro $param");
                return false;
            }
        }
        $this->report('suc','Controller::existPost', "Existen todos los parámetros");
        return true;
    }

    function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }

    /**
     * FUNCTIONES DE VISTA DE ERRORES
     */
        //Obtener datos POST escapados de caracteres especiales
        function getPost($name){
            // $_POST = json_decode(file_get_contents('php://input'), true);
            return $_POST[$name];
            
            /*Filtramos solo letras y numeros mas !?. */
            $val = preg_replace("/[^A-Za-z0-9.!? [:space:] ]/", "", $_POST[$name]);
            error_log("CONTROLLER::getPost() → ");
            if (!empty($val)) : 
                echo json_encode(['value'=>$val]);
                return; 
            endif;
            error_log("CONTROLLER::getPost() → El parametro *". $name . " no es valido");
                echo json_encode(['Error'=>'Usuario y/o contraseña incorrectos']);
            return false; 
        }
        //Obtener datos GET escapados de caracteres especiales
        function getGet($name){
            /*Filtramos solo letras y numeros mas !?. */
            $val = preg_replace("/[^A-Za-z0-9_-@.!? ]/", "", $_GET[$name]);
            if (!empty($val)) : return $val; endif;
            $this->report('error', 'Controller::getName', "El parametro ". $name . " no existe");
            return false; 
        }



    function getFile($name){
        if(!empty($_FILES[$name]['name'])){
            return $_FILES[$name];
        }else{  
            return false;
        }
    }

    function getAxiosPost($name){
        $_POST = json_decode(file_get_contents('php://input'), true);
        // return $_POST[$name];
        
        /*Filtramos solo letras y numeros mas !?. */
        $val = preg_replace("/[^A-Za-z0-9.!? [:space:] ]/", "", $_POST[$name]);
        error_log("CONTROLLER::getPost() → ");
        if (!empty($val)) : 
            echo json_encode(['value'=>$val]);
            return $val; 
        endif;
        error_log("CONTROLLER::getPost() → El parametro *". $name . " no es valido");
            echo json_encode(['Error'=>'Usuario y/o contraseña incorrectos']);
        return false; 
    }

    function base64($path){
        if(exif_read_data($path, 0, true)){
            echo "Exif read data: true";
        }
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $img = ('image'.$ext)();
        echo $ext;
        $file = base64_encode(file_get_contents($path));
        // if(readfile($path)){
        //     echo "Existe el archivo ". $path;
        // }else{
        //     echo "No existe el archivo ". $path;
        // }
        return $file;
    }


/**
 * Abre el archivo JSON y regresa el resultado decodificado
 */
    function getJsonContent($src){
        if(!file_exists($src)) return false;
        $string = file_get_contents($src);
        $json = json_decode($string, true);
        return $json;
    }


    function redirect($url, $mensajes = []){
        $data = [];
        $params = '';
        
        foreach ($mensajes as $key => $value) {
            array_push($data, $key . '=' . $value);
        }
        $params = join('&', $data);
        
        if($params != ''){
            $params = '?' . $params;
        }
        header('location: ' . constant('URL') . $url . $params);
    }

    function getCurrentTime(){ return strtotime(date('H:i'));}        
    function getCurrentDate(){return strtotime(date('Y-m-d'));}        
    function getCurrentDateTime(){return strtotime(date('Y-m-d H:i'));}       
    function controlMail($mail){if(filter_var($mail, FILTER_VALIDATE_EMAIL) ){return true;}return false;}
    function maxChar($val, $max){if($val < $max){return true;}return false;}
    function minChar($val, $min){if($val > $min){return true;}return false;}
    //  $array = ['ruta':'',  'maxSize':'', 'typeFile':'']
    function controlFile($file, $array){
        if($array['typeFile'] == 'imagen' && $file['type'] == ("image/jpg" || "image/jpeg" || "image/png" || "image/gif")   ){
          return true;  
        }else if($array['typeFile'] == 'archive' && $file['type'] == ('pdf') ){
            return true;
        }else{
            return false;
        }
    }
    

    function report($type = 'msg', $controllerMethod, $error){
        $str = "<p class='$type'>";
        $explode = explode('::', $controllerMethod);
        $str .= "<span>".$explode[0]."</span>::";
        $str .= "<span>".$explode[1]."()</span> → ";
        $str .= $error."</p>\r\n";
        error_log($str, 3, constant('debug_file'), 0);

    }

   



}

?>