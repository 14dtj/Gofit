<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'controller/UserController.php';
$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response) {
//    $name = $request->getAttribute('name');
    $controller = new UserController();
    $controller->login('tj', '123456');
    $response->getBody()->write("done");

    return $response;
});
$app->run();