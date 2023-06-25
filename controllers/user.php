<?php
    
    use Dompdf\Dompdf;
    use Dompdf\Options;

    class User extends SessionController{
        protected $model, $user;
        protected $setData, $jsonData, $name;
        function __construct($array = []){
            parent::__construct();
            $this->model = $this->loadModel('user');
            $this->setData = [];
            $this->user = $this->getUserSessionData();
            $this->setData['currentUser'] = $this->user->getData();
            
            // $this->jsonData = json_decode(file_get_contents("users/$this->name.json"), true);
            $this->jsonData = $this->user->getData();
        }

        

        function updateChange($array){
            if(empty($array)): $this->response("La función 'User::updateChanges()' no ha recibido parametros"); endif;
            
        }

        function response($msg, $type = 0){
            if(empty($msg)) echo "La función 'User::response()' no ha recibido parametros"; return false;
             $types = [0=>'error', 1=>'success', 2=>'message']  ;  
             $type =  $types[$type]; 
            // echo json_encode([$type=>['error'=>$msg]]);
            return true;
            
        }

        function info(){
            $this->view->render('user/info', $this->setData);
        }


        function render(){
            $this->setData['currentUser'] = $this->jsonData;
            $this->view->render("user/index", $this->setData);
        }
        //Actulizar nombre
        function name(){
            //Si existe y no es igual al que se guardó
            $_POST = json_decode(file_get_contents("php://files"),true);

            if(isset($_POST['name']) && $_POST['name'] != $this->jsonData['nombre']):
                $this->jsonData['nombre'] = $_POST['name'];
                $this->change('setData', $this->jsonData);
            endif;
        }

        function picture($array = []){
            header('Access-Control-Allow-Origin: *');

            if(!isset($array[0])){
                // echo json_encode(["error"=>"User::imagen() No se especifica que hacer"]);
                return false;
            }
            $file = $_FILES['file'];
            $target = "resource/img/users/";
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $basename = $this->user->getID().".".$ext;
            $this->jsonData['foto'] = $basename;
            if($this->change('setData', $this->jsonData)){
                // echo json_encode(['Success'=>"Nombre de imagen guardado en la DDBB"]);

                if (copy($file['tmp_name'], $target.basename($basename))){
                    echo json_encode(['success'=>true,'msg'=>"Imagen actualizada correctamente"]);
                    return true;
                }else{
                    echo json_encode(['error'=>true,'msg'=>"Imagen no actualizada"]);
                    return false;
                }
                return;
            }

            echo json_encode(['error'=>true,'msg'=>$basename]);
            return false;
        }

        //Actulizar nombre
        function profession(){
            //Si existe y no es igual al que se guardó
            $_POST = json_decode(file_get_contents("php://input"),true);
            if(isset($_POST['profession']) && $_POST['profession'] !== $this->jsonData['profession']):
                $this->jsonData['profesion'] = $_POST['profession'];
                $this->change('setData', $this->jsonData);
            endif;
        }

        function myprofile(){
            $_POST = json_decode(file_get_contents("php://input"),true);
            $this->jsonData['sobremi'] = $_POST['myprofile'];
            $this->change('setData', $this->jsonData);
        }
        
        function location(){
            $_POST = json_decode(file_get_contents("php://input"),true);
            $this->jsonData['localidad'] = $_POST['location'];
            $this->change('setData', $this->jsonData);
        }

        function email(){
            $_POST = json_decode(file_get_contents("php://input"),true);
            $this->jsonData['email'] = $_POST['email'];
            $this->change('setData', $this->jsonData);
        }

        function mobile(){
            $_POST = json_decode(file_get_contents("php://input"),true);
            $this->jsonData['movil'] = $_POST['mobile'];
            $this->change('setData', $this->jsonData);
        }

        // function picture(){
        //     $_FILES = json_decode(file_get_contents("php://input"),true);
        //     $file = $_FILES['picture'];
        //     echo json_encode(["data"=>"User::Picture()". $file]);
        //     // $foto = $this->
            
        //     // $this->jsonData['foto'] = $_POST['picture'];
        //     // $this->change('setData', $this->jsonData);
        //     // copy($)
        // }

        // function sobremi(){
        //     $this->jsonData['sobremi'] = $_POST['sobremi'];
        //     $this->actualizarInfo();
        // }

         function competencias($array = []){
            echo json_encode(["data"=>"User::competencias() run"]);
            switch($array[0]){
                case "actualizar":
                    $position = $_POST['position'];
                    $value = $_POST['value'];
                    echo json_encode(["data"=>"User::competencias() position: $position, value: $value"]);
                        $this->jsonData['competencias'][$position] = $value;
                        $this->change("setData", $this->jsonData);
                        return true;    
                    echo json_encode(["data"=>"User::competencias() The position: $position does not exist"]);
                break;
                case "eliminar":
                    $p = (int) $_POST['competence_delete'];
                    if(isset($this->jsonData['experiencias'][$p])){
                        unset($this->jsonData['experiencias'][$p]);
                    }
                break;
            }//end switch    
        }//end function
        

        function course($array = []){
            if(!isset($array[0])){
                echo json_encode(["error"=>"User::course() false"]);
            }
            $_POST = json_decode(file_get_contents("php://input"),true);
            
            switch($array[0]){
                case "update":
                    $p = $_POST['position'];
                    if(!isset($this->jsonData['educacion'][$p])){
                        echo json_encode(["data"=>"User::formacion() No existe la formacion. position: $p"]);
                        
                    }
                        echo json_encode(["data"=>"User::formacion() position: $p"]);

                    if(isset($_POST['date'])){
                        $v = $_POST['date'];
                        $this->jsonData['estudios'][$p]['date'] = $v;
                    }
                    if(isset($_POST['institution'])){
                        $v = $_POST['institution'];
                        $this->jsonData['estudios'][$p]['institution'] = $v;
                    }
                    if(isset($_POST['description'])){
                        $v = $_POST['description'];
                        $this->jsonData['estudios'][$p]['description'] = $v;
                    }
                    if($this->change('setData', $this->jsonData)){
                        echo json_encode(["data"=>["success"=>true, 'msg'=>"Informacion actualizada"]]);
                        return true;
                    }
                    echo json_encode(["data"=>"User::formacion() No existe el curso. position: $p"]);
                    return false;

                break;
                case "new":
                    if(!isset($_POST['date']) || !isset($_POST['institution']) || !isset($_POST['description'])){return false;}
                    if(empty($_POST['date']) || empty($_POST['institution']) || empty($_POST['description'])){return false;}
                    $formacion = [
                        'institution'=>$_POST['institution'],
                        'date'=>$_POST['date'],
                        'description'=>$_POST['description']
                    ];
                    array_push($this->jsonData['estudios'], $formacion);
                    if($this->change('setData', $this->jsonData)){
                        echo json_encode(["data"=>["success"=>true, 'msg'=>"Nueva curso agregado"]]);
                        return true;
                    }
                    echo json_encode(["data"=>["error"=>true, "msg"=>"User::estudios() No existe el curso. position"]]);
                    return false;
                break;

                case "trash":
                    if(!isset($_POST['position'])){
                    echo json_encode(["data"=>["error"=>true, "msg"=>"User::estudios() No se ha enviado la posicion"]]);
                        return false;
                    }
                    $p = $_POST['position'];
                    echo json_encode(["data"=>["success"=>true, 'msg'=>"position: $p"]]);

                    if(isset($this->jsonData['estudios'][$p])){
                        unset($this->jsonData['estudios'][$p]);
                    }

                    if($this->change('setData', $this->jsonData)){
                        echo json_encode(["data"=>["success"=>true, 'msg'=>"Nueva formacion academica agregada"]]);
                        return true;
                    }
                    echo json_encode(["data"=>["error"=>true, "msg"=>"User::formacion() No existe la formacion. position"]]);
                    return false;
                break;
                
            }
            return;
        }

        function dexterity($array = []){
            if(!isset($array[0])): 
                echo json_encode(["data"=>["success"=>true, "msg"=>"No se especifica la funcion"]]);
                 return false; 
            endif;
            $_POST = json_decode(file_get_contents("php://input"),true);
            //ACTUALIZAR DESTREZA
            switch($array[0]){
                case "update":
                    $position = $_POST['position'];
                    $value = $_POST['value'];
                    if(isset($this->jsonData['competencias'][$position])){
                        // echo json_encode(["data"=>["success"=>true, 'msg'=>"Existe la posicion"]]);
                        $this->jsonData['competencias'][$position] = $value;
                        if($this->change('setData', $this->jsonData)){
                            echo json_encode(["data"=>["success"=>true, 'msg'=>"Habilidad actualizada"]]);
                            return true;
                        }   
                    }
                    echo json_encode(["data"=>"User::competencias() The position: $position does not exist"]);
                    return false;  
                break;
                //ELIMINAR DESTREZA
                case "trash":
                    $position = $_POST['position'];
                    if(isset($this->jsonData['competencias'][$position])){
                        unset($this->jsonData["competencias"][$position]);
                        if($this->change('setData', $this->jsonData)){
                            echo json_encode(["data"=>["success"=>true, 'msg'=>"Habilidad actualizada"]]);
                            return true;
                        }
                    }
                    echo json_encode(["data"=>"User::competencias() The position: $position does not exist"]);
                    return false;    
                break;
                //AGREGAR DESTREZA
                case "new":
                    if($this->getPOST('value')){
                        array_push($this->jsonData['competencias'], $this->getPOST('value'));
                        if($this->change('setData', $this->jsonData)){
                            echo json_encode(["data"=>["success"=>true, 'msg'=>"Habilidad actualizada"]]);
                            return true;
                        }   
                    }
                
                    
                    echo json_encode(["data"=>"User::competencias() The position does not exist"]);
                    return false;  
                break;
            }
        }


        function experiences($array = []){
            if(!isset($array[0])){
                echo json_encode(["error"=>"User::experiencias() Falta especificar la funcion"]);
                return false;
            }
            $_POST = json_decode(file_get_contents("php://input"),true);
            switch($array[0]){
                case "update":
                    $p = $_POST['position'];
                    if(!isset($this->jsonData['experiencias'][$p])){
                        echo json_encode(["data"=>["error"=>"User::experiencias() No existe la experiencia. position: $p"]]);
                        return false;
                    }
                        // echo json_encode(["data"=>["success"=>"User::experiencias() Existe la experiencia. position: $p"]]);

                        // echo json_encode(["data"=>"User::experiencias() position: $p"]);

                    if(isset($_POST['date'])){
                        $v = $_POST['date'];
                        $this->jsonData['experiencias'][$p]['date'] = $v;
                    }
                    if(isset($_POST['appointment'])){
                        echo json_encode(["data"=>["succes"=>true, "msg"=>"Appointment detected"]]);
                        $v = $_POST['appointment'];
                        $this->jsonData['experiencias'][$p]['appointment'] = $v;
                    }
                    
                    if(isset($_POST['description'])){
                        $v = $_POST['description'];
                        $this->jsonData['experiencias'][$p]['description'] = $v;
                    }
                    if($this->change('setData', $this->jsonData)){
                        echo json_encode(["data"=>["success"=>true, 'msg'=>"Informacion actualizada"]]);
                        return true;
                    }
                    echo json_encode(["data"=>"User::formacion() No existe la formacion. position: $p"]);
                    return false;


            
                break;
                case "new":
                    if(!isset($_POST['appointment']) || !isset($_POST['description']) || empty($_POST['date'])){return false;}
                    if(empty($_POST['appointment']) || empty($_POST['description']) || empty($_POST['date'])){return false;}
                    $experience = [
                        'appointment'=>$_POST['appointment'],
                        'date'=>$_POST['date'],
                        'description'=>$_POST['description'],
                    ];
                    array_push($this->jsonData['experiencias'], $experience);
                    
                break;

                case "trash":
                    if(!isset($_POST['position'])){
                        return false;
                    }
                    $p = $_POST['position'];
                    if(isset($this->jsonData['experiencias'][$p])){
                        unset($this->jsonData['experiencias'][$p]);
                    }
                break;
                
            }
            if($this->change('setData', $this->jsonData)){
                // echo json_encode(["success"=>true, 'msg'=>"Probando 123"]);
                return true;
            }
            echo json_encode(["error"=>true]);
            return false;

            
        }

        function education($array = []){
            if(!isset($array[0])){
                echo json_encode(["error"=>"User::formacion() false"]);
            }
            $_POST = json_decode(file_get_contents("php://input"),true);
            
            switch($array[0]){
                case "update":
                    $p = $_POST['position'];
                    if(!isset($this->jsonData['formacion'][$p])){
                        echo json_encode(["data"=>"User::formacion() No existe la formacion. position: $p"]);
                        
                    }
                        echo json_encode(["data"=>"User::formacion() position: $p"]);

                    if(isset($_POST['date'])){
                        $v = $_POST['date'];
                        $this->jsonData['formacion'][$p]['date'] = $v;
                    }
                    if(isset($_POST['institution'])){
                        $v = $_POST['institution'];
                        $this->jsonData['formacion'][$p]['institution'] = $v;
                    }
                    if(isset($_POST['description'])){
                        $v = $_POST['description'];
                        $this->jsonData['formacion'][$p]['description'] = $v;
                    }
                    if($this->change('setData', $this->jsonData)){
                        echo json_encode(["data"=>["success"=>true, 'msg'=>"Informacion actualizada"]]);
                        return true;
                    }
                    echo json_encode(["data"=>"User::formacion() No existe la formacion. position: $p"]);
                    return false;

                break;
                case "new":
                    if(!isset($_POST['date']) || !isset($_POST['institution']) || !isset($_POST['description'])){return false;}
                    if(empty($_POST['date']) || empty($_POST['institution']) || empty($_POST['description'])){return false;}
                    $formacion = [
                        'institution'=>$_POST['institution'],
                        'date'=>$_POST['date'],
                        'description'=>$_POST['description']
                    ];
                    array_push($this->jsonData['formacion'], $formacion);
                    if($this->change('setData', $this->jsonData)){
                        echo json_encode(["data"=>["success"=>true, 'msg'=>"Nueva formacion academica agregada"]]);
                        return true;
                    }
                    echo json_encode(["data"=>["error"=>true, "msg"=>"User::formacion() No existe la formacion. position"]]);
                    return false;
                break;

                case "trash":
                    if(!isset($_POST['position'])){
                    echo json_encode(["data"=>["error"=>true, "msg"=>"User::formacion() No se ha enviado la posicion"]]);

                        return false;
                    }
                    $p = $_POST['position'];
                    echo json_encode(["data"=>["success"=>true, 'msg'=>"position: $p"]]);

                    if(isset($this->jsonData['formacion'][$p])){
                        unset($this->jsonData['formacion'][$p]);
                    }

                    if($this->change('setData', $this->jsonData)){
                        echo json_encode(["data"=>["success"=>true, 'msg'=>"Nueva formacion academica agregada"]]);
                        return true;
                    }
                    echo json_encode(["data"=>["error"=>true, "msg"=>"User::formacion() No existe la formacion. position"]]);
                    return false;
                break;
                
            }
            return;
        }

        function lang($array =  []){
            $_POST = json_decode(file_get_contents("php://input"),true);
            $this->jsonData['lang'] = $_POST['lang'];
            $this->change('setData', $this->setData);
        }
            function styles($array =  []){

            if(!isset($array[0])): echo json_encode(['data'=>"Ejecucion sin parametros de entrada"]);return; endif;
            
            $_POST = json_decode(file_get_contents("php://input"),true);
            switch($array[0]){
                //AGREGAR HABILIDAD
                case "headerColor":
                    $this->jsonData['styles']['headerColor'] = $_POST['headerColor'];
                break;
                case "nameColor":
                    $this->jsonData['styles']['nameColor'] = $_POST['nameColor'];
                break;
                case "profColor":
                    $this->jsonData['styles']['profColor'] = $_POST['profColor'];
                break;
                case "fotoX":
                    $this->jsonData['styles']['foto_x'] = $_POST['foto_x'];
                break;
                case "fotoY":
                    $this->jsonData['styles']['foto_y'] = $_POST['foto_y'];
                break;
                case "fotoZ":
                    $this->jsonData['styles']['foto_z'] = $_POST['foto_z'];
                break;
                case "titleColor":
                    $this->jsonData['styles']['titleColor'] = $_POST['titleColor'];
                break;
                case "subtitleColor":
                    $this->jsonData['styles']['subtitleColor'] = $_POST['subtitleColor'];
                break;
                case "borderRadiusPicture":
                    $this->jsonData['styles']['borderRadiusPicture'] = $_POST['borderRadiusPicture'];
                break;
                case "borderRadiusBox":
                    $this->jsonData['styles']['borderRadiusBox'] = $_POST['borderRadiusBox'];
                break;
                case "fontSizeHeader":
                    $this->jsonData['styles']['fontSizeHeader'] = $_POST['fontSizeHeader'];
                break;
                case "fontSizeHeader2":
                    $this->jsonData['styles']['fontSizeHeader2'] = $_POST['fontSizeHeader2'];
                break;
                case "picturePosition":
                    $this->jsonData['styles']['picturePosition']['top'] = $_POST['top'];
                    $this->jsonData['styles']['picturePosition']['left'] = $_POST['left'];
                break;
            }
            $this->change('setData', $this->jsonData);
            return;
        }

        function change($f, $val){
            $this->user->$f(json_encode($this->jsonData));
            // $this->user->{'set'.$param}($val);
           $saved =  $this->user->update();
            if($saved){
                echo json_encode(['success'=>true,'msg'=>"Informacion actualizada"]);
                return true;
            }
            echo json_encode(['data'=>['error'=>true,'msg'=>"Informacion no actualizada"]]);
            return false;

        }


        function save(){
            $this->user->update();
        }

        function saveCV(){
            $_POST = json_decode(file_get_contents("php://input"),true);
            $html = "<html>\r\n";
                $html .= "<head>\r\n";
                $html .= "<link rel='stylesheet' href='".constant('URL')."resource/css/fontawesome.css'>";
                $html .= "<style>\r\n";
                $html .= file_get_contents("resource/css/default.css");
                $html .= file_get_contents("resource/css/".$_POST['templateID'].".css");
                $html .= "</style>\r\n";
                $html .= "</head>\r\n";
                $html .= "<body>\r\n";
                    $html .= $_POST['html'];

                    // $html .= "<style>\r\n";
                $html .= file_get_contents("resource/libs/fontawesome.php");
                // $html .= "</style>\r\n";
                $html .= "</body>\r\n";
            $html .= "</html>\r\n";

            $html = str_replace(
                [
                    constant('URL'),


                    'var(--a4w)',
                    'var(--a4h)',


                    'var(--headerColor)',


                    'var(--nameColor)',

                    //P

                    'var(--picturePositionLeft)',
                    'var(--picturePositionTop)',
                    'var(--primaryColor)',
                    'var(--profColor)',


                    'var(--subtitleColor)',
                    'var(--titleColor)',

                ],[
                    "",

                    //A
                    "210mm",
                    "297mm",

                    //H
                    $this->user->getData()['styles']['headerColor'],

                    //N
                    $this->jsonData['styles']['nameColor'],
                    //P
                    $this->user->getData()['styles']['picturePosition']['left'],
                    $this->user->getData()['styles']['picturePosition']['top'],
                    $this->jsonData['styles']['primaryColor'],
                    $this->jsonData['styles']['profColor'],
                    //S
                    $this->jsonData['styles']['subtitleColor'],
                    //T
                    $this->jsonData['styles']['titleColor'],
                ], $html);


           
            // Abre el archivo en modo lectura/escritura. Si no existe, lo crea.
            $src = "users/pdf/".$this->user->getID().".html";
            if(file_put_contents($src, $html)){
                echo json_encode(['success'=>true, "msg"=>"Preparando documento para generar el PDF"]);
            }

            
        }

        function export($templateID){
            if(!file_exists("users/pdf/".$this->user->getId().".html")){
                echo "No existe el archivo 'users/pdf/".$this->user->getId().".html'";
                exit;
            }
            $html = file_get_contents("users/pdf/".$this->user->getId().".html");
            
            $this->stream($html, $templateID);
        }

        



        function stream($html, $templateID){

            //Instance of PDF options
            $options = new Options;
            $options->setChroot(constant('URL'));
            $options->setIsRemoteEnabled(true);
            //Instance of PDF generator
            $options->setIsPhpEnabled(true);
            $options->set('margin-top', '0');
            $options->set('margin-right', '0');
            $options->set('margin-bottom', '0');
            $options->set('margin-left', '0');
            //Set the paper size and orientation
            
            $dompdf = new Dompdf($options);
            $dompdf->setPaper("A4", "portrait");
            // //Load the HTML and replace placeholders with values from the form
            $html = file_get_contents("users/pdf/".$this->user->getId().".html");
            
            
            $dompdf->loadHtml($html); //or $dompdf->loadHtmlFile("template.html");
            // $dompdf->loadHtmlFile(constant('URL')."users/pdf/".$this->user->getID().".html");
            //Create the PDF and set attributes
            $dompdf->render();

            $dompdf->addInfo("Title", $this->jsonData['nombre']." - miCV "); // "add_info" in earlier versions of Dompdf

            // Send the PDF to the browser
            $dompdf->stream($this->jsonData['nombre'].".pdf", ['Attachment' => false]);

            //Save the PDF file locally
            //Probar si asi se descarga
            $dompdf->output();
            
               
        }

        function getHTML(){
            return file_get_contents('users/pdf/'.$this->user->getID().'.html');
           
        }
        
    }


       
    

?>