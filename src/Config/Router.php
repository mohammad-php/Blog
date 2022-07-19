<?php

require '../vendor/autoload.php';

use ErickFirmo\Router;

$router = new Router;

$router->setNamespace('Blog\Controllers\\');
# LoginController
$router->get('/login', LoginController::class, 'index', 'login.index');
$router->post('/loginPost', LoginController::class, 'loginPost', 'login.login');
$router->get('/logout', LoginController::class, 'logout', 'login.logout');

# HomeController
$router->get('/', HomeController::class, 'index', 'home.index');
$router->get('/home', HomeController::class, 'index', 'home.index');

$router->run();