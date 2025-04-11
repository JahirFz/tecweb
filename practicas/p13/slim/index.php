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

$app->get("/hola[/{nombre}]", function($request, $response, $args){
    $response->getBody()->write("Hola, " . $args["nombre"]);
    return $response;
});

$app->post("/pruebapost", function($request, $response, $args){
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost["val1"];
    $val2 = $reqPost["val2"];

    $response->getBody()->write("Valores:" . $val1 ." ".$val2);
    return $response;
});

$app->get("/testjson", function($request, $response, $args){
    $data[0]["nombre"]="Sergio";
    $data[1]["apellidos"]="Rojas Espino";
    $data[2]["nombre"]="Pedro";
    $data[3]["nombre"]="Perez Lopez";
    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response;
});

$app->run();
?>