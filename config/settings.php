<?php
//Debugger
    // $debuggerSettings = json_decode(file_get_contents('config/json/settings.json'),true)['debugger'];

    define('debug', true);                //View is screen debugger messages
    define('console',false);                //View is screen debugger messages
    define('debug_file', 'logs/errors.log');     //Source for logs error
    define('console_file', 'logs/console.php');     //Source for logs error

    //Company data
    DEFINE ('CompanyName','OnlineCV');
    DEFINE ('CompanyIcon', constant('URL').'resource/img/company/icon.png');
    ?>