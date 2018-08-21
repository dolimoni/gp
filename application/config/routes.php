<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$default_controller = "Welcome"; // default controller name
$route['default_controller'] = $default_controller;

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$controller_exceptions = array("seminaire","conseil","index","formation","informatique","management","identificationCompte",
"contact","signup");


foreach($controller_exceptions as $v) {
    $route[$v] = "$default_controller/".$v;
    $route[$v."/(.*)"] = "$default_controller/".$v.'/$1';
}