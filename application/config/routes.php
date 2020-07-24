<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['(:any)'] = 'pages/view/';

$route['articles/index'] = 'articles/index';
$route['articles/create'] = 'articles/create';
$route['articles/(:any)'] = 'articles/view/$1';
