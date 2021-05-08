<?php

use App\Components\Router;

ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

require_once ROOT . '/vendor/autoload.php';


// Вызов Router
$router = new Router();
$router->run();

// var_dump($_SESSION);
