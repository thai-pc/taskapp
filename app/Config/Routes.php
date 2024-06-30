<?php

use CodeIgniter\Router\RouteCollection;
use \App\Controllers\HomeController;
use \App\Controllers\TaskController;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', [HomeController::class, 'index']);
$routes->get('/tasks', [TaskController::class, 'index']);
$routes->get('/tasks/show/(:num)', [TaskController::class, 'show']);
$routes->get('/tasks/create', [TaskController::class, 'create']);
$routes->post('/tasks/store', [TaskController::class, 'store']);
$routes->get('tasks/edit/(:num)', [TaskController::class, 'edit']);
$routes->patch('tasks/update/(:num)', [TaskController::class, 'update']);