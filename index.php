<?php

//turning on the error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//Require the files (fat-free)
require_once('vendor/autoload.php');

require "models/PDO.php";

//Create an instance of the Base Class
$f3 = Base :: instance();

//Set debug level
//will take care of php errors as well which gives 500 error
$f3->set('DEBUG', 3);

/**
 ***********************************************************************
 ******* Initial route *******
 *************************************************************************
 */
$f3->route('GET|POST /', function ()
{
    $template = new Template();
    //render
    echo $template->render('views/home.html');
}
);

//Run fat free
$f3->run();