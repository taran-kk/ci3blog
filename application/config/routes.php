<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['(:any)'] = 'pages/view/';

$route['articles/index'] = 'articles/index';
$route['articles/create'] = 'articles/create';
$route['articles/(:any)'] = 'articles/view/$1';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['comments'] = 'comments/index';
$route['comments/create'] = 'comments/create';
