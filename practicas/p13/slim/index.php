<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
require 'vendor/autoload.php';
$app = AppFactory::create();
$app->setBasepath("/tecweb/practicas/p13/slim");

$app->get('/', function ($request, $response, $args){
    $response->getBody()->write("Hola mundo");
    return $response;
});

$app->run();
?>