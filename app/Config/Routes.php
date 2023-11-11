<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/upload-image', 'Home::upload_image');  
$routes->get('/slider', 'Home::slider'); 
$routes->get('/ajax-slider', 'Home::footer_slider'); 

