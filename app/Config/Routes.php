<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

// ======================   Admin Controller Route Start here ==========================

$routes->get('/', 'AdminController::login');
$routes->get('/login', 'AdminController::login');
$routes->post('/userlogin', 'AdminController::userlogin');

$routes->get('/404', 'AdminController::expirepage');

$routes->get('/home', 'AdminController::home');
$routes->get('/logout', 'AdminController::logout');

// ====================== END HERE =============================

// ============== PRODCUT CONTROLLER ROUTE START ===============

$routes->get('/addcatagory', 'ProductController::addcatagory');
$routes->post('/addcatagory_form', 'ProductController::addcatagory_form');
$routes->get('/catagory', 'ProductController::catagory');


$routes->get('/addsubcatagory', 'ProductController::addsubcatagory');
$routes->post('/addsubcatagory_form', 'ProductController::addsubcatagory_form');




$routes->get('/productlisting', 'ProductController::productlisting');
$routes->get('/addproduct', 'ProductController::addproduct');


// =============== END HERE ============