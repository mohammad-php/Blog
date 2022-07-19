<?php

require '../vendor/autoload.php';

use ErickFirmo\Router;

$router = new Router;

$router->setNamespace('Blog\Controllers\\');
$router->get('/login', LoginController::class, 'index', 'login.index');
$router->run();