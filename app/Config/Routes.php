<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Main Pages
$routes->get('/', 'Home::index');

// Placeholder routes (to be extended)
// $routes->get('/about', 'Pages::about');
// $routes->get('/fleet', 'Fleet::index');
// $routes->get('/contact', 'Contact::index');
