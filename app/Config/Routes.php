<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::armarPagina/inicio');
$routes->get('/(:any)', 'Home::armarPagina/$1');
