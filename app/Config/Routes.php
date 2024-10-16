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
// edit catagory data
$routes->get('/edit_catagory/(:any)', 'CatagoryController::edit_catagory');
$routes->post('/edit_catagoryform/', 'CatagoryController::edit_catagoryform');




$routes->get('/addsubcatagory', 'CatagoryController::addsubcatagory');
$routes->post('/addsubcatagory_form', 'CatagoryController::addsubcatagory_form');
$routes->get('/subcatagory', 'CatagoryController::subcatagory');

// edit sub catagory data
$routes->get('/edit_subcatagory/(:any)', 'CatagoryController::edit_subcatagory');
$routes->post('/edit_subcatagoryform/', 'CatagoryController::edit_subcatagoryform');



// Product function controller start here

$routes->get('/product_listing', 'ProductController::product_listing');

$routes->get('/addproduct', 'ProductController::addproduct');
$routes->post('/addproduct_form', 'ProductController::addproduct_form');

// end here

// =============== END HERE ============

// =============== AJAX CONTROLLER RTOUTE START FROM HERE =============
$routes->get('/changestatus','AjaxController::changestatus');
$routes->post('/changestatus','AjaxController::changestatus');

// delete catagory
$routes->get('/globaldelete','AjaxController::globaldelete');
$routes->post('/globaldelete','AjaxController::globaldelete');


// =============== END HERE ===================