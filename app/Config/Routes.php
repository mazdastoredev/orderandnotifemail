<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Order routes
$routes->get('/order', 'OrderController::index');
$routes->post('/order/create', 'OrderController::create');
$routes->get('/order/success/(:num)', 'OrderController::success/$1');

// Admin routes (optional)
$routes->get('/admin/orders', 'AdminController::orders');
$routes->get('/admin/orders/(:num)', 'AdminController::orderDetail/$1');
$routes->post('/admin/orders/(:num)/update-status', 'AdminController::updateOrderStatus/$1');
