<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/accountsPage', 'Admin::accountsPage');
$routes->get('/userProfile', 'Users::userProfile');

$routes->get('/admin/orderPage', 'Admin::orderPage');
$routes->post('/admin/orderPage', 'Admin::orderPage');

$routes->get('/admin/menuPage', 'Admin::showMenuPage');
$routes->post('/admin/menuPage', 'Admin::menuPage');

$routes->get('/productsPage', 'MenuController::menu');
$routes->get('/product/(:num)', 'MenuController::productDetails/$1');

$routes->get('/loginPage', 'Auth::showLoginPage');
$routes->post('/loginPage', 'Auth::loginPage');

$routes->get('/logout', 'Auth::logout');

$routes->get('/signupPage', 'Auth::showSignupPage');
$routes->post('/signupPage', 'Auth::signupPage');

$routes->get('/plansPage', 'MenuController::Plans');

$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->post('/cart/increase/(:num)', 'Cart::increase/$1');
$routes->post('/cart/decrease/(:num)', 'Cart::decrease/$1');
$routes->post('/cart/remove/(:num)', 'Cart::remove/$1');

$routes->get('/checkout', 'Checkout::index');  
$routes->post('/checkout/PlaceOrder', 'Checkout::PlaceOrder');

$routes->get('/paymentPage', 'Payment::index');  
$routes->post('/paymentPage/Pay', 'Payment::Pay');

$routes->group('user', function ($routes) {
    $routes->post('update', 'Users::updateDetails');
    $routes->post('delete', 'Users::deleteAccount'); // for deleting account
});
