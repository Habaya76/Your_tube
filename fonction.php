<?php
 
function verifyInput($var)
{
    $var = trim($var);              //enlever les space suplementaiere
    $var = stripslashes($var);      //enlever tout les anti_slass
    $var = htmlspecialchars($var); //securiter
    return $var;
}

function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

?>

