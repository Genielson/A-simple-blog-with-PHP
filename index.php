<?php
ob_start();
session_start();
require __DIR__ . "/vendor/autoload.php";
$router = new \CoffeeCode\Router\Router(ROOT);
$router->namespace("Source\Controllers");

$router->group(null);
$router->get('/',"Web:home");
$router->get('/home',"Web:home");


/*
 * PÁGINA DE ERRO
 */
$router->group('ops');
$router->get("/{errcode}", "Web:error");
$router->dispatch();
if ($router->error()) {
    echo $router->error();
}
ob_end_flush();