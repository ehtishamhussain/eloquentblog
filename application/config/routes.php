<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home']='Pages/home';
$route['about']='Pages/about';

$route['posts']='posts/index';
$route['posts/create']='posts/create';


$route['posts/(:any)']='posts/view/$1';
$route['users']='UsersController/index';
$route['users/register']='UsersController/register';
$route['users/login']='UsersController/login';
$route['users/logout']='UsersController/logout';