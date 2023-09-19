<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Except admin auth
$routes->get('/', '\CodeIgniter\Shield\Controllers\LoginController::loginView', ['as' => 'login']);
$routes->post('/', '\CodeIgniter\Shield\Controllers\LoginController::loginAction');

$routes->get('/register', 'Teacher\RegisterController::index', ['as' => 'register']);
$routes->post('/register', 'Teacher\RegisterController::create');

$routes->get('/dashboard', 'Teacher\DashboardController::index');

\Config\Services::auth()->routes($routes);

$routes->resource("study-references", ['controller' => 'Teacher\StudyReferenceController']);
$routes->resource("study-modules", ['controller' => 'Teacher\StudyModuleController']);
$routes->resource("opinions", ['controller' => 'Teacher\OpinionController']);

$routes->group("admin", ["filter" => ["visits", "loginFilter"], "namespace" => "App\Controllers\Admin"], function ($routes) {
    $routes->get('/', function () {
        return redirect('admin/login');
    });

    // Admin auth
    $routes->get('login', 'LoginController::loginView');
    $routes->post('login', 'LoginController::loginAction');
    $routes->get('logout', 'LoginController::logoutAction');

    // Dashboard
    $routes->get('dashboard', 'DashboardController::index');

    // Users
    $routes->post('users/(:num)/status', 'UserController::status/$1');
    $routes->resource("users", ['controller' => 'UserController', 'except' => 'show']);

    $routes->resource("category-references", ['controller' => 'CategoryReferenceController', 'except' => 'show']);

    $routes->resource("study-references", ['controller' => 'StudyReferenceController', 'except' => 'show']);

    $routes->resource("category-modules", ['controller' => 'CategoryModuleController', 'except' => 'show']);

    $routes->resource("study-modules", ['controller' => 'StudyModuleController', 'except' => 'show']);

    $routes->resource("opinions", ['controller' => 'OpinionController', 'except' => 'show']);

    $routes->put('study-communities', 'StudyCommunityController::update');
    $routes->resource("study-communities", ['controller' => 'StudyCommunityController', 'except' => 'show', 'update']);

    $routes->resource("sharing-practices", ['controller' => 'SharingPracticeController', 'except' => 'show']);

    $routes->resource("profile", ['controller' => 'ProfileController', 'except' => 'show', 'edit', 'new', 'create', 'update', 'delete']);
});

$routes->group("teacher", ["filter" => "visits", "namespace" => "App\Controllers\Teacher"], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'DashboardController::index');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
