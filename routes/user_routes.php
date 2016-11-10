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


$app->post('/login', function (Request $request, Response $response, $args) use ($app) {
    $data = $request->getParsedBody();
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    $controller = new UserController();
    $result = $controller->login($username, $password);
    if ($result == 0) {
        $response->getBody()->write("<script>alert('password is wrong'); history.go(-1);</script>");
        return $response;
    } else {
        session_start();
        $_SESSION['user'] = $username;
        return $this->view->render($response, 'index.html');
    }
});
$app->post('/register', function (Request $request, Response $response, $args) use ($app) {
    $data = $request->getParsedBody();
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    $controller = new UserController();
    $controller->register($username, $password);
    $response->getBody()->write("<script>alert('registered successfully'); history.go(-2);</script>");
    return $response;
});
