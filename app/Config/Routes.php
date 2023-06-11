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
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/about', 'About::index');

    $routes->group('product', static function ($routes) {
        $routes->get('/', 'Product::index');
        $routes->get('create', 'Product::create');
        $routes->post('create', 'Product::create');
        $routes->get('update/(:num)', 'Product::update/$1');
        $routes->put('update/(:num)', 'Product::update/$1');
        $routes->delete('delete/(:num)', 'Product::delete/$1');
    });

    $routes->group('category', static function ($routes) {
        $routes->get('/', 'Category::index');
        $routes->get('create', 'Category::create');
        $routes->post('create', 'Category::create');
        $routes->get('update/(:num)', 'Category::update/$1');
        $routes->put('update/(:num)', 'Category::update/$1');
        $routes->delete('delete/(:num)', 'Category::delete/$1');
    });

    $routes->group('cart', static function ($routes) {
        $routes->get('/', 'Cart::index');
        $routes->post('create', 'Cart::create');
        $routes->put('update/(:num)', 'Cart::update/$1');
        $routes->delete('update/(:num)', 'Cart::update/$1');
    });

    $routes->group('payment', static function ($routes) {
        $routes->get('/', 'Payment::index');
        $routes->get('uploadImage', 'Payment::uploadImage');
        $routes->get('image/(:num)', 'Payment::paymentImage/$1');
        $routes->put('upload', 'Payment::upload');
    });

    $routes->group('transaction', static function ($routes) {
        $routes->get('/', 'Transaction::index');
        $routes->post('create', 'Transaction::create');
    });
});

$routes->get('/logout', 'Login::logout');
$routes->group('login', static function ($routes) {
    $routes->get('/', 'Login::index');
    $routes->post('/', 'Login::execute');
});

$routes->group('register', static function ($routes) {
    $routes->get('/', 'Register::index');
    $routes->post('/', 'Register::execute');
});

$routes->group('forgot-password', static function ($routes) {
    $routes->get('/', 'Forgot::index');
    $routes->post('verify', 'Forgot::verify');
    $routes->post('reset', 'Forgot::reset');
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
