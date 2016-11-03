<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/3
 * Time: 23:31
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'controller/UserController.php';
$controller = new UserController();

$app->post('/login', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    $controller = new UserController();
    $result = $controller->login($username, $password);
    $response->getBody()->write($result);
    return $response;
});
