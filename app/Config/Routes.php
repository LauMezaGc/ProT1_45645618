<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/registro','Usuario_controller::create');
$routes->post('/enviar-form','Usuario_controller::formValidation');

$routes->get('/login', 'Login_controller');
$routes->post('/enviarlogin','Login_controller::auth');
$routes->get('/login-correcto', 'Panel_controller::index',['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');

$routes->get('/', 'Home::armarPagina/inicio');
$routes->get('/(:any)', 'Home::armarPagina/$1');