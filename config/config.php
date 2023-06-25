<?php 
    //Configure datetime for Uruguay
    define('local_timezone','America/Montevideo');
    define('local_time','es_UY');

    // Configure timezone local
    setlocale( LC_ALL, constant('local_time'));
    date_default_timezone_set(constant('local_timezone'));
    
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, ');

    //Tokens
    define('expired_token_reset_password', '1 day');

    //Routers
    define('URL', 'http://www.localhost/CV/');
    define('login', constant('URL').'/login');
    define('signup', constant('URL').'/signup');
    define('identify', constant('URL').'/identify');

    //Controller index
    define('controller', 'Login');
    define('model', 'LoginModel');

    
    //Database credentials and options
    define('HOST', 'localhost');
    define('DB', 'onlinecv');
    define('USER', 'root');
    define('PASSWORD', '1234');
    define('CHARSET', 'UTF8');
    
    //Email credentials for auth
    define('MAIL_DIR', 'miproximoauto@hotmail.com');
    define('MAIL_PASS', 'Danubio1932');
    define('MAIL_PORT', '587');
    define('MAIL_HOST', 'smtp-mail.outlook.com');
    define('MAIL_SMTPSecure', 'tls');

   
?>
