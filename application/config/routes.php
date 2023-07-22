<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']		= 'login';
$route['login']						= 'login/login';
$route['logout']					= 'login/logout';
$route['developer']					= 'login/developer';


$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;
