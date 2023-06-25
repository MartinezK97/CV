


<?php



function debug($context, $type = 'msg'){
    
    if(constant('debug') == false){
        return false;
    }
    $backtrace = debug_backtrace();
    //Callers
    $class = $backtrace[1]['class'];
    $method = $backtrace[1]['function'];

    $strE = getMessageLog($class, $method, $type, $context);
    error_log($strE, 3, constant('debug_file'), 0);
    //If console is active
    if(constant('console') == true){
        $strC = getMessageConsole($class, $method, $type, $context);
        error_log($strC, 3, constant('console_file'), 0);
    }
}

function getMessageConsole($c,$m, $t, $v){
    return "<p class='$t'><span >$c</span>::<span>$m()</span> → $v</p>\r\n";
}

function getMessageLog($c,$m, $t, $v){
    $str = "[". date('d/m/Y')." a las ".date('H:i')." en ".date_default_timezone_get()."] → ";
    $str .= "[$c]::[$m()] → ".strtoupper($t).": $v\r\n";
    return $str;  
}
     




?>