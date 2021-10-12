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

$route['default_controller'] = 'front';

//admin panel
$route['admin'] = 'admin/index';
$route['admin-home'] = 'admin/home';
$route['admin-check_signin'] = 'admin/check_signin';
$route['admin-menu'] = 'admin/menu';
$route['admin-add-menu'] = 'admin/add_menu';
$route['admin-insert_menu'] = 'admin/insert_menu';
$route['admin-edit-menu'] = 'admin/edit_menu';
$route['admin-menu_action'] = 'admin/menu_action';
$route['admin-menu_visibility'] = 'admin/menu_visibility';
$route['admin-update_menu'] = 'admin/update_menu';
$route['admin-blog'] = 'admin/blog';
$route['admin-add-blog'] = 'admin/add_blog';
$route['admin-insert_blog'] = 'admin/insert_blog';
$route['admin-edit-blog'] = 'admin/edit_blog';
$route['admin-update_blog'] = 'admin/update_blog';
$route['admin-delete-blog'] = 'admin/delete_blog';
$route['admin-signout'] = 'admin/signout';
$route['admin-emp'] = 'admin/emp';
$route['admin-add-emp'] = 'admin/add_emp';
$route['admin-insert_emp'] = 'admin/insert_emp';
$route['admin-edit-emp'] = 'admin/edit_emp';
$route['admin-update_emp'] = 'admin/update_emp';
$route['admin-assign-emp'] = 'admin/assign_emp';
$route['admin-unassign-emp'] = 'admin/unassign_emp';
$route['admin-view-blog'] = 'admin/view_blog';
$route['admin-blog_approval'] = 'admin/blog_approval';
$route['admin-sub-menu'] = 'admin/sub_menu';
$route['admin-add-sub-menu'] = 'admin/add_sub_menu';
$route['admin-insert_sub_menu'] = 'admin/insert_sub_menu';
$route['admin-edit-sub-menu'] = 'admin/edit_sub_menu';
$route['admin-update_sub_menu'] = 'admin/update_sub_menu';
$route['admin-select_sub_menu'] = 'admin/select_sub_menu';
$route['admin-qa'] = 'admin/qa';
$route['admin-add-qa'] = 'admin/add_qa';
$route['admin-insert_qa'] = 'admin/insert_qa';
$route['admin-edit-qa'] = 'admin/edit_qa';
$route['admin-update_qa'] = 'admin/update_qa';
$route['admin-assign-emp-qa'] = 'admin/assign_emp_qa';
$route['admin-delete-menu'] = 'admin/delete_menu';
$route['admin-delete-sub-menu'] = 'admin/delete_sub_menu';
$route['admin-submenu_action'] = 'admin/submenu_action';
$route['admin-submenu_visibility'] = 'admin/submenu_visibility';

//new front panel 
$route['about'] = 'front/about';
$route['contact'] = 'front/contact';
$route['disclaimer'] = 'front/disclaimer';
$route['privacy-policy'] = 'front/privacy_policy';
$route['terms-and-conditions'] = 'front/terms_and_conditions';
$route['insert-contact'] = 'front/insert_contact';
$route['sitemap'] = 'front/sitemap';


//Emp panel
$route['emp'] = 'emp/index';
$route['emp-check_signin'] = 'emp/check_signin';
$route['emp-blogs'] = 'emp/blogs';
$route['emp-signout'] = 'emp/signout';
$route['emp-edit-blog'] = 'emp/edit_blog';
$route['emp-update_blog'] = 'emp/update_blog';
$route['emp-publish-blog'] = 'emp/publish_blog';
$route['emp-unpublish-blog'] = 'emp/unpublish_blog';
$route['emp-view-blog'] = 'emp/view_blog';


//QA panel
$route['qa'] = 'qa/index';
$route['qa-check_signin'] = 'qa/check_signin';
$route['qa-emp'] = 'qa/emp';
$route['qa-blogs/(:num)'] = 'qa/blogs';
$route['qa-signout'] = 'qa/signout';
$route['qa-view-blog'] = 'qa/view_blog';
$route['qa-approval_yes-blog'] = 'qa/approval_yes_blog';
$route['qa-approval_no-blog'] = 'qa/approval_no_blog';



$route['page-not-found']   = 'front/error_404';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//new front panel
$route['front-load_blog'] = 'front/load_blog';
$route['in/(:any)'] = 'front/blog';
$route['in/(:any)/(:any)'] = 'front/blog_detail';