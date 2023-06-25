<?php
    //Config private constants
    require_once 'config/config.php';
    
    //Config settings constants
    require_once 'config/settings.php';
    
    //PHP ERRORS CONFIG
        error_reporting(E_ALL);                     // Desactivar TODOS los erores
        ini_set('ignore_repeated_errors', TRUE);    // Ignorar errores repetidos
        ini_set('display_errors', TRUE);            // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
        ini_set('log_errors', TRUE);                // Error/Exception file logging engine.
        ini_set("error_log", constant('debug_file'));
    //

    //PHPTools
    require "tools/PHPTools.php";

    //Datetime configuration
    require_once 'class/DateTimeConfig.php';

    //Libs files required
    require_once 'libs/database.php';
    require_once 'libs/messages.php';
    require_once 'libs/controller.php';
    require_once 'libs/view.php';
    require_once 'libs/model.php';
    require_once 'libs/app.php';

    //Formdata manager (use json files to config)
    require "tools/FormData.php";
    

    //Validations
    require_once 'class/validate.php';

    //Objects requires to start App
    require_once 'class/sessionController.php';
    require_once 'class/session.php';
    require_once 'class/errors.php';
    require_once 'class/success.php';
    require_once 'class/formsManager.php';
    require_once 'class/MailsManager.php';


    //Models required for start app
    require_once 'models/templatesmodel.php';
    include_once 'models/propertymodel.php';
    include_once 'models/usermodel.php';
    include_once 'models/adminmodel.php';
    include_once 'models/dashboardmodel.php';
    include_once 'models/homemodel.php';
    include_once 'models/loginmodel.php';
    include_once 'models/logoutmodel.php';
    require_once 'models/projectsmodel.php';

    //Composer dependences
    //(DomPDF)
    require_once 'vendor/autoload.php';


    

    //Init App
    $app = new App();
    
    if(constant('console') == true){
        echo "<section id='console'>";
        echo "<section id='consoleH'>";
        echo "PHPConsole";
        echo "</section>";
            echo "<style>";
            require "resource/css/console.css";
            echo "</style>";
        require "logs/console.php";
        echo "</section>";
    }

?>
