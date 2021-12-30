<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/Login';
	$route['login/process'] = 'auth/Login/process';
$route['register'] = 'auth/Register';
	$route['register/process'] = 'auth/Register/process';
$route['logout'] = 'auth/Login/logout';

$route['wilayah/:num'] = 'Wilayah';

$route['menu-management'] = 'MenuManagement';

// API Lokal

$route['getPekerjaan/json'] = 'Pekerjaan/show';

// Konfigurasi

$route['config'] = 'Configuration';
	$route['config/store'] = 'Configuration/store';
	$route['config/update'] = 'Configuration/update';

// Master Data > Data Penduduk

$route['data-pengajar'] = 'DataPengajar';
	$route['data-pengajar/store'] = 'DataPengajar/store';
	$route['data-pengajar/get/(:num)'] = 'DataPengajar/show/$1';
	$route['data-pengajar/create'] = 'DataPengajar/create';
	$route['data-pengajar/update'] = 'DataPengajar/update';
	$route['data-pengajar/delete'] = 'DataPengajar/delete';
