<?php
require_once 'controllers/errores.php';

class App{
    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $controllerDefault = constant('controller');
            $archivoController = "controllers/$controllerDefault.php";
            require_once $archivoController;
            $controller = new $controllerDefault();
            $controller->loadModel(constant('model'));
            $controller->render();
            return;
        }
        $archivoController = 'controllers/' . $url[0] . '.php';
        if(file_exists($archivoController)){
            require_once $archivoController;
            // inicializar controlador y modelo
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            // si hay un método que se requiere cargar
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        //el método tiene parámetros sacamos e # de parametros
                        $nparam = sizeof($url) - 2;
                        //crear un arreglo con los parametros
                        $params = [];
                        //iterar
                        for($i = 0; $i < $nparam; $i++){
                            array_push($params, $url[$i + 2]);
                        }
                        //pasarlos al metodo   
                        $controller->{$url[1]}($params);
                    }else{
                        //No se enviaron parametros en la url
                        $controller->{$url[1]}();    
                    }
                }else{
                    //No existe el metodo del controlador
                    $controller = new Errores('404'); 
                }
            }else{
                //No hay ningun method seleccionado, vista por defecto
                $controller->render();
            }
        }else{
           $controller = new Errores('404');
        }

    }



}

?>