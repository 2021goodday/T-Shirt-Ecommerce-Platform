<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default Home route
$routes->get('/', 'Home::index');

// Test email route
$routes->get('test-email', 'MailTest::sendTestEmail'); // http://localhost/ecommerce/public/test-email

// Customer login and register routes
// http://localhost/ecommerce/public/auth/customer/login
// http://localhost/ecommerce/public/auth/customer/register
$routes->group('auth/customer', function ($routes) {
    $routes->get('login', 'Auth::login');       // Customer login page
    $routes->get('register', 'Auth::register'); // Customer register page
    $routes->post('login', 'Auth::login');      // Process customer login
    $routes->post('register', 'Auth::register'); // Process customer registration
});
$routes->get('auth/customer/register', 'Auth::register');
$routes->post('auth/customer/register', 'Auth::register');


// Admin login and register routes
// http://localhost/ecommerce/public/auth/admin/login
// http://localhost/ecommerce/public/auth/admin/register
$routes->group('auth/admin', function ($routes) {
    $routes->get('login', 'Auth::adminLogin');        // Admin login page
    $routes->get('register', 'Auth::adminRegister');  // Admin register page
    $routes->post('login', 'Auth::processAdminLogin');    // Process admin login
    $routes->post('register', 'Auth::processAdminRegister'); // Process admin registration
});
$routes->post('auth/register', 'Auth::register');
$routes->post('auth/admin/register', 'Auth::adminRegister');


// Product catalog routes
// http://localhost/ecommerce/public/products/catalog
$routes->get('products/catalog', 'ProductController::catalog');

// http://localhost/ecommerce/public/inventory
$routes->post('/inventory/toggleStatus/(:num)', 'InventoryController::toggleStatus/$1');
$routes->post('/inventory/updateStatus/(:num)', 'InventoryController::updateStatus/$1');
$routes->get('inventory', 'InventoryController::inventoryManagement');

// Add product
// http://localhost/ecommerce/public/inventory/add
$routes->get('inventory/add', 'InventoryController::create');
$routes->post('inventory/add', 'InventoryController::create');

// Edit product
// http://localhost/ecommerce/public/inventory/edit/<productID>
$routes->get('/inventory/edit/(:num)', 'InventoryController::edit/$1');
$routes->post('/inventory/edit/(:num)', 'InventoryController::edit/$1');


$routes->get('test-database', 'Auth::testDatabase');
$routes->get('test-insert', 'Auth::testInsert');
