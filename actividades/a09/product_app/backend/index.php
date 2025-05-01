<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use TECWEB\MYAPI\CREATE\Create;
use TECWEB\MYAPI\DELETE\Delete;
use TECWEB\MYAPI\READ\Read;
use TECWEB\MYAPI\UPDATE\Update;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->setBasePath('/tecweb/actividades/a09/product_app/backend');

//CREATE
$app->post('/productos', function($request, $response, $args){
    $data = $request->getParsedBody();
    $products = new Create("marketzone");
    $producto = (object)$data;
    $products->add($producto);
    $response->getBody()->write(json_encode($products->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

//DELETE
$app->delete('/productos/{id}', function($request, $response, $args){
    $products = new Delete("marketzone");
    $id = $args['id'];
    $response->getBody()->write(json_encode($products->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

//READ
$app->get('/productos', function ($request, $response, $args){
    $products = new Read("marketzone");
    $products->list();
    $response->getBody()->write(json_encode($products->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/productos/{search}', function($request, $response, $args){
    $products = new Read("marketzonw");
    $search = $args['search'] ?? '';
    $products->search($search);
    $response->getBody()->write(json_encode($products->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/search-name', function($request, $response, $args){
    $products = new Read("marketzone");
    $par = $request->getQueryParams();
    $name = $par['name'] ?? '';
    $products->single($name);
    $response->getBody()->write(json_encode($products->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

//UPDATE
$app->put('/producto', function($request, $response, $args){
    $products = new Update("marketzone");
    $input = $request->getBody()->getContents();
    $data = json_decode($input, true);
    $producto = (object)$data;
    $products->edit($producto);
    $response->getBody()->write(json_encode($products->getData()));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
?>