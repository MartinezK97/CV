<?php

class View{
    protected $getData;
    function __construct(){
    }

    function render($nombre, $data = []){
        $this->getData = $data;
        $this->handleMessages();
        require 'views/' . $nombre . '.php';
        
        
    }


/**
 * Recibe un string y procesa el php dentro de él, 
 * retorna el mismo string con el php ejecutado 
 */
    function loadTemplate($html, $user = [], $print = 0){
        
       
        $fileView = tmpfile();
        fwrite($fileView, $html);
        fseek($fileView, 0);
        fread($fileView, 10024);
        }


    function generateTemplate($id, $data = []){
        $html = file_get_contents("views/templates/base.php");
        // $inc = include "views/templates/$id.php";
        $fileGetContents = file_get_contents("views/templates/$id.php");
        $html = str_replace(["{{css}}","{{template}}"] , [ $this->getCss([$id]), $fileGetContents], $html);
        $dataUser = json_decode(file_get_contents("config/json/defaultUserInfo.json"),true);
        $this->loadTemplate($html, $dataUser);
    }


    private function handleMessages(){
        if(isset($_GET['success']) && isset($_GET['error'])){
            // no se muestra nada porque no puede haber un error y success al mismo tiempo
        }else if(isset($_GET['success'])){
            
            $this->handleSuccess();
        }else if(isset($_GET['error'])){
            $this->handleError();
        }
    }

    private function handleError(){
        if(isset($_GET['error'])){
            $hash = $_GET['error'];
            $errors = new Errors();

            if($errors->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $errors->get($hash));
                $this->getData['error'] = $errors->get($hash);
            }else{
                $this->getData['error'] = NULL;
            }
        }
    }


    private function handleSuccess(){
        if(isset($_GET['success'])){
            $hash = $_GET['success'];
            $success = new Success();

            if($success->existsKey($hash)){
                error_log('View::handleError() existsKey =>' . $success->existsKey($hash));
                $this->getData['success'] = $success->get($hash);
            }else{
                $this->getData['success'] = NULL;
            }
        }
    }

    public function showMessages(){
        $this->showError();
        $this->showSuccess();
    }

    public function showError(){
        if(array_key_exists('error', $this->getData)){
            echo '<div class="error"><i class="fa-solid fa-xmark"></i> '.$this->getData['error'].'</div>';
        }
    }

    public function showSuccess(){
        if(array_key_exists('success', $this->getData)){
            echo '<div class="success"><i class="fa-solid fa-check"></i> '.$this->getData['success'].'</div>';
        }
    }

    function modals($files){
        //Si es vacio
        if(empty($files)) return false;
        // Si es un solo parametro
        if(!is_array($files)){
            $file = "views/modals/$files.css";
            if(file_exists($file)):
                include $file;
            endif;
            return true;
        }
        //Si es un arreglo
        foreach($files as $file):
            $file = "views/modals/$file.php";
            if(file_exists($file)):
                include $file;
            endif;
        endforeach;
        return true;
    }

    function css($files){
        //Si es vacio
        if(empty($files)) return false;
        // Si es un solo parametro
        if(!is_array($files)){
            $file = "resource/css/$files.css";
            if(file_exists($file)):
                echo "<link rel='stylesheet' href='".constant('URL').$file."'>";echo "\r\n";
            endif;
            return true;
        }
        //Si es un arreglo
        foreach($files as $file):
            $file = "resource/css/$file.css";
            if(file_exists($file)):
                echo "<link rel='stylesheet' href='".constant('URL').$file."'>";echo "\r\n";
            endif;
        endforeach;
        return true;
    }

    function getCss($files){
        //Si es vacio
        if(empty($files)) return false;
        // Si es un solo parametro
        if(!is_array($files)){
            $file = "resource/css/$files.css";
            if(file_exists($file)):
                return "<link rel='stylesheet' href='".constant('URL').$file."'>\r\n";
            endif;
            return false;
        }
        //Si es un arreglo
        $html = "";
        foreach($files as $file):
            $file = "resource/css/$file.css";
            if(file_exists($file)):
                $html .= "<link rel='stylesheet' href='".constant('URL').$file."'>\r\n";
            endif;
        endforeach;
        return $html;
    }
    // Agregar una lista de archivos javascript
    function js($files, $set = []){
        //Si es vacio
        if(empty($files)) return false;

        //Si se mandan otros parametros
        $htmlAdd = "";
        if(isset($set['type'])){
            $htmlAdd .= " type='".$set['type']."'";  
        }

        // Si es un solo parametro
        if(!is_array($files)){
            $file = "resource/js/$files.js";
            if(file_exists($file)):
                

                echo "<script $htmlAdd src='".constant('URL').$file."'></script>";echo "\r\n";
            endif;
            return true;
        }
        //Si es un arreglo
        foreach($files as $file):
            $file = "resource/js/$file.js";
            if(file_exists($file)):
                echo "<script $htmlAdd src='".constant('URL').$file."'></script>";echo "\r\n";
            endif;
        endforeach;
        return ;

        
    }
    
    //Argregar librerias, frameworks, y otras enlaces externos
    function libs($files){
        //Si es vacio
        if(empty($files)): return false; endif;
        //Si se recibe un arreglo, se carga cada archivo
        if(is_array($files)){
            foreach($files as $file):
                $file = "resource/libs/$file.php";
                if(file_exists($file)):
                    require $file; echo "\r\n";
                endif;
            endforeach;
            return;
        }

        //Si solo se requiere uno
        if(file_exists(constant('URL')."resource/libs/$files.php")):
            echo $file; echo "\r\n";
        endif;
       
        return;
    }


    function console(){
        echo "<section>";
        require "logs/console.php";
        echo "</section>";
    }

    function html($renders = []){
        
    }


    

     

}

?>