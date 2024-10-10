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

$routes->get('/addcatagory', 'CatagoryController::addcatagory');
$routes->post('/addcatagory_form', 'CatagoryController::addcatagory_form');
$routes->get('/catagory', 'CatagoryController::catagory');


$routes->get('/addsubcatagory', 'CatagoryController::addsubcatagory');
$routes->post('/addsubcatagory_form', 'CatagoryController::addsubcatagory_form');
$routes->get('/subcatagory', 'CatagoryController::subcatagory');




$routes->get('/productlisting', 'CatagoryController::productlisting');
$routes->get('/addproduct', 'CatagoryController::addproduct');


// =============== END HERE ============

// =============== AJAX CONTROLLER RTOUTE START FROM HERE =============
$routes->get('/changestatus','AjaxController::changestatus');
$routes->post('/ajaxcallchangestatus','AjaxController::changestatus');
// =============== END HERE ===================