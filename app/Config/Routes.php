<?php

use CodeIgniter\Router\RouteCollection;
use \App\Controllers\HomeController;
use \App\Controllers\TaskController;
use \App\Controllers\SignupController;
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
$routes->delete('tasks/delete/(:num)', [TaskController::class, 'delete']);

$routes->get('signup', [SignupController::class, 'index']);
$routes->post('signup/store', [SignupController::class, 'store']);