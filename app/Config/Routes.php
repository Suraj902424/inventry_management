<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home page (landing page)
$routes->get('/', 'Home::index');

/**
 * =======================================
 * ADMIN ROUTES (Super Admin Panel)
 * =======================================
 */
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    // Auth
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::doLogin');
    $routes->get('logout', 'Auth::logout');
    
    // Dashboard & Management
    $routes->get('/', 'Dashboard::index');
    $routes->get('vendors', 'Vendors::index');
    $routes->get('vendors/create', 'Vendors::create');
    $routes->post('vendors/store', 'Vendors::store');
    
    // ✅ VENDOR DELETE & EDIT ROUTES ADDED
    $routes->get('vendors/edit/(:num)', 'Vendors::edit/$1');
    $routes->post('vendors/update/(:num)', 'Vendors::update/$1');
    $routes->get('vendors/delete/(:num)', 'Vendors::delete/$1');  // ✅ DELETE FIXED!
    $routes->get('vendors/approve/(:num)', 'Vendors::approve/$1');
    
    $routes->get('inventory', 'Inventory::index');
});

/**
 * =======================================
 * VENDOR ROUTES (Vendor Panel)
 * =======================================
 */
$routes->group('vendor', ['namespace' => 'App\Controllers\Vendor'], function($routes) {
    // Auth
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::doLogin');
    $routes->get('logout', 'Auth::logout');
    
    // Registration
    $routes->get('register', 'Register::index');
    $routes->post('register', 'Register::store');
    
    // Dashboard
    $routes->get('/', 'Dashboard::index');
    
    // Inventory Management
    $routes->group('inventory', function($routes) {
        $routes->get('/', 'Inventory::index');
        $routes->get('create', 'Inventory::create');
        $routes->post('store', 'Inventory::store');
        $routes->get('edit/(:num)', 'Inventory::edit/$1');
        $routes->post('update/(:num)', 'Inventory::update/$1');
        $routes->get('delete/(:num)', 'Inventory::delete/$1');
    });
});
