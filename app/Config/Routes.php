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

// Admin login and register routes
// http://localhost/ecommerce/public/auth/admin/login
// http://localhost/ecommerce/public/auth/admin/register
$routes->group('auth/admin', function ($routes) {
    $routes->get('login', 'Auth::adminLogin');        // Admin login page
    $routes->get('register', 'Auth::adminRegister');  // Admin register page
    $routes->post('login', 'Auth::processAdminLogin');    // Process admin login
    $routes->post('register', 'Auth::processAdminRegister'); // Process admin registration
});

// Product catalog routes
// http://localhost/ecommerce/public/products/catalog
$routes->get('products/catalog', 'ProductController::catalog');
