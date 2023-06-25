<?php
/**
 * Controlador que también maneja las sesiones
 */
class SessionController extends Controller{
    
    private $userSession;
    private $username;
    private $userid;

    private $session;
    private $sites;
    private $defaultSites;

    private $user;
 
    function __construct(){
        parent::__construct();
        # $this->report('msg', 'SessionController::construct', 'Controller runing');
        $this->init();

    }

    public function getUserSession(){
        return $this->userSession;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getUserId(){
        return $this->userid;
    }

    /**
     * Inicializa el parser para leer el .json
     */
    private function init(){
        //se crea nueva sesión
        # $this->report('msg','SessionController::init', "Executing method...");
        $this->session = new Session();
        # $this->report('suc','SessionController::init',"New session created");
        //se carga el archivo json con la configuración de acceso
        $json = $this->getJSONContent('config/json/access.json');
        // se asignan los sitios
        $this->sites = $json['sites'];
        // se asignan los sitios por default, los que cualquier rol tiene acceso
        $this->defaultSites = $json['default-sites'];
        // inicia el flujo de validación para determinar
        // el tipo de rol y permismos
        $this->validateSession();
    }
    
    /*** Implementacion del flujo de autorización para entrar a las páginas publicas/privadas*/
    function validateSession(){
        # $this->report('msg', 'SessionController::validateSession', 'Method is running..');
        //Si existe la sesión
        //echo "ValidateSession();<br>";

        if($this->existsSession()){
            //echo "Existe session<br>";
            # $this->report('suc','SessionController::validateSession', 'Existe la sesion');
            $role = $this->getUserSessionData()->getRole();
            //echo "rol: $role";
            # $this->report('msg','',"sessionController::validateSession(): El username es:  - role: " . $this->user->getRole());
            if($this->isPublic()){
                //echo "La pagina es publica<br>"; 
                # $this->report('msg','SessionController::validateSession', "El sitio es público, redirige al main de cada rol" );
                // $this->redirectDefaultSiteByRole($role);
            }else{
                //echo "La pagina no es publica<br>"; 

                if($this->isAuthorized($role)){
                    //echo "El usuario esta autorizado";
                    # $this->report('err','SessionController::validateSession', "Usuario autorizado a acceder. Fin del flujo." );
                    //si el usuario está en una página de acuerdo
                    // a sus permisos termina el flujo
                }else{
                    # $this->report('err','SessionController::validateSession', "Usuario no autorizado, redirige al main de cada rol" );
                    // si el usuario no tiene permiso para estar en
                    // esa página lo redirije a la página de inicio
                    //echo "El usuario no esta autorizado"; 
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        }else{
            //No existe ninguna sesión
            //se valida si el acceso es público o no
                    //echo "No existe session<br>"; 

            if($this->isPublic()){
                //la pagina es publica
                //echo "isPublic(): la pagina es publica<br>";
                return true;
                # $this->report('suc', 'SessionController::validateSession', 'La pagina es publica');
            }else{
                //Private page → redirect login
                //echo "La pagina no es publica"; 
                $this->redirect('login');
                return false;
                # $this->report('err','SessionController::validateSession','El usuario no tiene persmisos para acceder a este sitio');
                // header('location: '. constant('URL') . 'login/');
                // $this->view->render('login');
                
            }
        }
    }
    /**
     * Valida si existe sesión, 
     * si es verdadero regresa el usuario actual
     */
    function existsSession(){
        # $this->report('msg','SessionController::existSession',"Running..");
        if(!$this->session->exists()){
            # $this->report('err','SessionController::existSession',"The session not exist..");
            return false;
        }
        if($this->session->getCurrentUser() == NULL){
            # $this->report('err','SessionController::existSession',"The session is null..");
            return false;
        }
        $userid = $this->session->getCurrentUser();
        # $this->report('err','SessionController::existSession',"The session exist: ".$userid);

        if($userid > 0) return true;

        return false;
    }

    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        $this->user = new UserModel();
        $this->user->get($id);
        # $this->report('msg','sessionController::getUserSessionData()', "El nombre se usuario de la session es: ".$this->user->getUsername());
        return $this->user;
    }

    public function initialize($user){
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRole());
    }

    private function isPublic(){
        # $this->report('msg','sessionController::isPublic',"Executing method...");
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public'){
                # $this->report('suc','sessionController::isPublic',"The page <b>$currentURL</b> is public");
                return true;
            }
        }
        # $this->report('err','sessionController::isPublic',"The page <b>$currentURL</b> not is public");
        return false;
    }

    private function redirectDefaultSiteByRole($role){
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($this->sites[$i]['role'] == $role){
                $this->redirect($this->sites[$i]['role']);
            }
        }
    }

    private function isAuthorized($role = ''){
        //echo "isAuthorized():"; 
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $role){
                //echo "true"; 
                return true;
            }
        }
        //echo "false"; 

        return false;
    }

    private function getCurrentPage(){
        
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        return $url[2];
    }

    function authorizeAccess($role){
        switch($role){
            case 'user':
                // return json_encode(['defaultSite'=>'user']);
                //echo "autorizeAccess: user<br>"; exit;
                $this->redirect($this->defaultSites['user']);
            break;
            case 'admin':
                // return json_encode(['defaultSite'=>'admin']);
                $this->redirect($this->defaultSites['admin']);
            break;
            // default: 
            //     # $this->report('msg', 'SessionController::authorizeAccess','El usuario no tiene rol asignado');
                $this->redirect('');

        }
    }

    public function logout(){
        
        $this->session->closeSession();
    }
}


?>