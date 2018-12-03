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

$route['boats/view/(:any)'] = 'boats/view/$1';
$route['boats/edit/(:any)'] = 'boats/edit/$1';
$route['boats/add'] = 'boats/add';
$route['boats/(:any)'] = 'boats';
$route['boats'] = 'boats';

$route['guides/view/(:any)'] = 'guides/view/$1';
$route['guides/edit/(:any)'] = 'guides/edit/$1';
$route['guides/add'] = 'guides/add';
$route['guides/all_to_excel'] = 'guides/all_to_excel';
$route['guides/(:any)'] = 'guides';
$route['guides'] = 'guides';

$route['visitors/view/(:any)'] = 'visitors/view/$1';
$route['visitors/edit/(:any)'] = 'visitors/edit/$1';
$route['visitors/add'] = 'visitors/add';
$route['visitors/match_find'] = 'visitors/match_find';
$route['visitors/review_changes'] = 'visitors/review_changes';
$route['visitors/review_details'] = 'visitors/review_details';
$route['visitors/partner_add'] = 'visitors/partner_add';
$route['visitors/partner_entries'] = 'visitors/partner_entries';
$route['visitors/view_p_entry'] = 'visitors/view_p_entry';
$route['visitors/move_entry/(:any)'] = 'visitors/move_entry/$1';
$route['visitors/remove_entry/(:any)'] = 'visitors/remove_entry/$1';
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
$route['activities'] = 'activities';

$route['photoid/edit/(:any)'] = 'photoid/edit/$1';
$route['photoid/add'] = 'photoid/add';
$route['photoid/latest'] = 'photoid/latest';
$route['photoid'] = 'photoid';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

$route['users'] = 'users/index';
$route['users/add'] = 'users/add';
$route['users/mod'] = 'users/mod';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
