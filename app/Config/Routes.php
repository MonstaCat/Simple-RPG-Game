<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'PlayerController::index');
$routes->get('/admin', 'AdminController::index');

$routes->match(['get', 'post'], '/admin/add_item', 'AdminController::AddItem');
$routes->match(['get', 'post'], '/admin/edit_item/(:any)', 'AdminController::EditItem/$1');
$routes->match(['get', 'post'], '/admin/delete_item/(:any)', 'AdminController::DeleteItem/$1');
$routes->match(['get', 'post'], '/profile', 'PlayerController::PlayerProfile');

$routes->match(['get', 'post'], '/match', 'MatchController::MatchSimulation');
$routes->match(['get', 'post'], '/match/add_battle', 'MatchController::AddBattle');
// $routes->get('/attack', 'MatchController::MatchAttack');

$routes->match(['get', 'post'], '/login', 'Auth::index');
$routes->match(['get', 'post'], '/register', 'Auth::UserRegister');
$routes->get('/logout', 'Auth::UserLogout');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
