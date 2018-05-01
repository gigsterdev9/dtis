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
|	http://codeigniter.com/user_guide/general/routing.html
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
//$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
$route['beneficiaries/match_find'] = 'beneficiaries/match_find';
$route['beneficiaries/(:any)'] = 'beneficiaries';
$route['beneficiaries'] = 'beneficiaries';

$route['rvoters/view/(:any)'] = 'rvoters/view/$1';
$route['rvoters/edit/(:any)'] = 'rvoters/edit/$1';
$route['rvoters/add'] = 'rvoters/add';
$route['rvoters/(:any)'] = 'rvoters';
$route['rvoters'] = 'rvoters';

$route['nonvoters/view/(:any)'] = 'nonvoters/view/$1';
$route['nonvoters/edit/(:any)'] = 'nonvoters/edit/$1';
$route['nonvoters/add'] = 'nonvoters/add';
$route['nonvoters/(:any)'] = 'nonvoters';
$route['nonvoters'] = 'nonvoters';

$route['scholarships/view/(:any)'] = 'scholarships/view/$1';
$route['scholarships/edit/(:any)'] = 'scholarships/edit/$1';
$route['scholarships/add'] = 'scholarships/add';
$route['scholarships/add_term'] = 'scholarships/add_term';
$route['scholarships/edit_term'] = 'scholarships/edit_term';
$route['scholarships/test'] = 'scholarships/test';
$route['scholarships/(:any)'] = 'scholarships';
$route['scholarships'] = 'scholarships';

$route['services/view/(:any)'] = 'services/view/$1';
$route['services/edit/(:any)'] = 'services/edit/$1';
$route['services/add'] = 'services/add';
$route['services/add_exist'] = 'services/add_exist';
$route['services/edit_exist'] = 'services/edit_exist';
$route['services/batch_import'] = 'services/batch_import';
//$route['services/do_upload'] = 'services/do_upload';
$route['services/(:any)'] = 'services';
$route['services'] = 'services';
*/

$route['visitors/view/(:any)'] = 'visitors/view/$1';
$route['visitors/edit/(:any)'] = 'visitors/edit/$1';
$route['visitors/add'] = 'visitors/add';
$route['visitors/all_to_excel'] = 'visitors/all_to_excel';
$route['visitors/(:any)'] = 'visitors';
$route['visitors'] = 'visitors';

$route['visits/view/(:any)'] = 'visits/view/$1';
$route['visits/edit/(:any)'] = 'visits/edit/$1';
$route['visits/add'] = 'visits/add';
$route['visits/add_exist'] = 'visits/add_exist';
$route['visits/(:any)'] = 'visits';
$route['visits'] = 'visits';

$route['activities/butanding'] = 'activities/butanding';
$route['activities/girawan'] = 'activities/girawan';
$route['activities/firefly'] = 'activities/firefly';
$route['activities/islandhop'] = 'activities/islandhop';
$route['activities'] = 'visits';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

$route['users'] = 'users/index';
$route['users/add'] = 'users/add';
$route['users/mod'] = 'users/mod';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';