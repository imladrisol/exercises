<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/******************SETTINGS********************/

$contact_email = "admin@site.com";
$host = substr($_SERVER['SERVER_ADDR'], 0,5);
if(in_array($host, array('local','127.0','192.1'))){
    $local = true;
}
else{
    $local = false;
}

if($local){
    $debug = true;
    define('BASE_URI','/excercise');
    define('BASE_URL','http://localhost/excercise');
    define('DB', 'mysqli.php');
}
else{
    
}

if(!isset($debug))
    $debug = FALSE;


function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
    global $debug, $contact_email;
    
    $message = "An error occured in script '$e_file' on line $e_line: $e_message";
    $message .= print_r($e_vars, 1);
    if($debug){
        echo "<div class='error'>$message</div>";
        debug_print_backtrace();
    }
    else{
        error_log($message,1,$contact_email);
        if ( ($e_number != E_NOTICE) && ($e_number < 2048)) {
            echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
    }
}

set_error_handler('my_error_handler');


