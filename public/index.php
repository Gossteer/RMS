<?php

use App\Components\Router;
use App\Components\Start;

ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

require_once ROOT . '/vendor/autoload.php';


// Вызов Router
$router = new Router();
(new Start())->run();
$router->run();

// var_dump($_SESSION);
