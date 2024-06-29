<?php

use CodeIgniter\Router\RouteCollection;
use \App\Controllers\HomeController;
use \App\Controllers\TaskController;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', [HomeController::class, 'index']);
$routes->get('/tasks', [TaskController::class, 'index']);
