<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Product::index');
$routes->get('product', 'Product::index');
$routes->get('product/create', 'Product::create');
$routes->post('product/save', 'Product::save');
$routes->get('product/delete/(:num)', 'Product::delete/$1');
