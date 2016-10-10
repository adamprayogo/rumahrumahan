<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the 'welcome' class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = 'default/home';
$route['404_override'] = 'notfound';
$route['notfound'] = 'default/notfound';
$route['packages'] = 'default/packages';

$route['payments/complete'] = 'default/payments/complete';
$route['payments/checkout'] = 'default/payments/checkout';
$route['payments/cancel_payment'] = 'default/payments/cancel_payment';

$route['properties/detail/(:num)/(:any)'] = 'default/properties/detail/$1/$1';
$route['properties/(:any)'] = 'default/properties/$1/$1';
$route['page/(:any)/(:num)'] = 'default/page/load/$1';
$route['agent/profile/:(num)/(:any)'] = 'default/agent/profile/$1/$1';
$route['agent/(:any)'] = 'default/agent/$1/$1';
$route['contact'] = 'default/home/contact';
$route['users/profile'] = 'default/users/profile';
$route['users/(:any)'] = 'default/users/$1/$1';
$route['post/(:any)'] = 'default/properties/post/$1';
$route['posts/(:any)'] = 'default/posts/detail/$1';
$route['images/remove'] = 'default/images/remove';
$route['images/set_thumbnail'] = 'default/images/set_thumbnail';

/* backend router */
$route['admin/types/(:num)'] = 'admin/types/index/$1';
$route['admin/estates/(:num)'] = 'admin/estates/index/$1';
$route['admin/county/(:num)'] = 'admin/county/index/$1';
$route['admin/cities/(:num)'] = 'admin/cities/index/$1';
$route['admin/marker/(:num)'] = 'admin/marker/index/$1';
$route['admin/users/(:num)'] = 'admin/users/index/$1';
$route['admin/contact/(:num)'] = 'admin/contact/index/$1';
$route['admin/pages/(:num)'] = 'admin/pages/index/$1';
$route['admin/amenities/(:num)'] = 'admin/amenities/index/$1';

/* api router */
$route['api/amenities_api/(:num)'] = 'api/amenities_api/index/$1';
$route['api/cities_api/(:num)'] = 'api/cities_api/index/$1';
$route['api/county_api/(:num)'] = 'api/county_api/index/$1';
$route['api/estate_api/(:num)'] = 'api/estate_api/index/$1';
$route['api/images_api/(:num)'] = 'api/images_api/index/$1';
$route['api/market_api/(:num)'] = 'api/market_api/index/$1';
$route['api/type_api/(:num)'] = 'api/type_api/index/$1';
$route['api/users_api/(:num)'] = 'api/users_api/index/$1';
$route['api/amenities_api/(:num)'] = 'api/amenities_api/index/$1';


/* home frontend router */
$route['home'] =            'default/home';
$route['search'] =          'default/home/search';
$route['search/(:num)'] =   'default/home/search/$1';
$route['subscribe'] =       'default/home/subscribe';
$route['requpsub'] =        'default/home/requpsub';
$route['upref'] =           'default/home/upref';
$route['unsub']=            'default/home/unsub';
/* End of file routes.php */
/* Location: ./application/config/routes.php */