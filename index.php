<?php 

$app = require "classes/Bootstrapper.php";
$app->start();

$router = new Router;

$router->rule('/', 'Controller');
$router->rule('/get-vars', 'DatabaseController');


$router->handle();