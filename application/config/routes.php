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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['rt_rw'] = 'data_pokok/rtrw';
$route['rt_rw/add'] = 'data_pokok/rtrw/add';
$route['rt_rw/view/(:num)'] = 'data_pokok/rtrw/view';
$route['rt_rw/update/(:num)'] = 'data_pokok/rtrw/update';
$route['rt_rw/updating'] = 'data_pokok/rtrw/updating';
$route['rt_rw/deleting/(:num)'] = 'data_pokok/rtrw/deleting';
$route['rt_rw/inserting'] = 'data_pokok/rtrw/inserting';

//------- KELUARGA --------
$route['keluarga'] = 'pemerintahan/Data_keluarga';
$route['keluarga/add'] = 'pemerintahan/Data_keluarga/add';
$route['keluarga/inserting'] = 'pemerintahan/Data_keluarga/inserting';
$route['keluarga/insertingAnggota/(:num)'] = 'pemerintahan/Data_keluarga/insertingAnggota';
$route['keluarga/view/(:num)'] = 'pemerintahan/Data_keluarga/view';
$route['keluarga/update/(:num)'] = 'pemerintahan/Data_keluarga/update';
$route['keluarga/updating'] = 'pemerintahan/Data_keluarga/updating';
$route['keluarga/delete/(:num)'] = 'pemerintahan/Data_keluarga/delete';
$route['keluarga/deleting/(:num)'] = 'pemerintahan/Data_keluarga/deleting';
$route['keluarga/deleteAnggota/(:num)/(:num)'] = 'pemerintahan/Data_keluarga/deleteAnggota';
$route['keluarga/deletingAnggota/(:num)/(:num)'] = 'pemerintahan/Data_keluarga/deletingAnggota';

//$route['keluarga/view/(:num)/(:num)'] = 'pemerintahan/Data_keluarga/view';

//------- BIODATA RT RW --------
$route['biodata'] = 'pemerintahan/biodata_rt_rw/index';
$route['biodata/add'] = 'pemerintahan/biodata_rt_rw/add';
$route['biodata/adding'] = 'pemerintahan/biodata_rt_rw/adding';
$route['biodata/view/(:num)'] = 'pemerintahan/biodata_rt_rw/view';
$route['biodata/update/(:num)'] = 'pemerintahan/biodata_rt_rw/update';
$route['biodata/updating'] = 'pemerintahan/biodata_rt_rw/updating';
$route['biodata/deleting/(:num)'] = 'pemerintahan/biodata_rt_rw/deleting';

//------- LINMAS --------
$route['linmas'] = 'pemerintahan/linmas/index';
$route['linmas/add'] = 'pemerintahan/linmas/add';
$route['linmas/adding'] = 'pemerintahan/linmas/adding';
$route['linmas/view/(:num)'] = 'pemerintahan/linmas/view';
$route['linmas/update/(:num)'] = 'pemerintahan/linmas/update';
$route['linmas/updating'] = 'pemerintahan/linmas/updating';
$route['linmas/deleting/(:num)'] = 'pemerintahan/linmas/deleting';

//------- Warga Sementara --------
$route['ws'] = 'pemerintahan/warga_sementara/index';
$route['ws/add'] = 'pemerintahan/warga_sementara/add';
$route['ws/adding'] = 'pemerintahan/warga_sementara/adding';
$route['ws/view/(:num)'] = 'pemerintahan/warga_sementara/view';
$route['ws/update/(:num)'] = 'pemerintahan/warga_sementara/update';
$route['ws/updating'] = 'pemerintahan/warga_sementara/updating';
$route['ws/deleting/(:num)'] = 'pemerintahan/warga_sementara/deleting';

//------- Warga Miskin --------
$route['wm'] = 'kemasyarakatan/warga_miskin/index';
$route['wm/add'] = 'kemasyarakatan/warga_miskin/add';
$route['wm/adding'] = 'kemasyarakatan/warga_miskin/adding';
$route['wm/view/(:num)'] = 'kemasyarakatan/warga_miskin/view';
$route['wm/update/(:num)'] = 'kemasyarakatan/warga_miskin/update';
$route['wm/updating'] = 'kemasyarakatan/warga_miskin/updating';
$route['wm/deleting/(:num)'] = 'kemasyarakatan/warga_miskin/deleting';

//------- Warga Lansia --------
$route['wl'] = 'kemasyarakatan/warga_lansia/index';
$route['wl/add'] = 'kemasyarakatan/warga_lansia/add';
$route['wl/adding'] = 'kemasyarakatan/warga_lansia/adding';
$route['wl/view/(:num)'] = 'kemasyarakatan/warga_lansia/view';
$route['wl/update/(:num)'] = 'kemasyarakatan/warga_lansia/update';
$route['wl/updating'] = 'kemasyarakatan/warga_lansia/updating';
$route['wl/deleting/(:num)'] = 'kemasyarakatan/warga_lansia/deleting';
