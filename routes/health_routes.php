<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/10
 * Time: 10:45
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'controller/HealthController.php';

$app->get('/health', function (Request $request, Response $response, $args) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new HealthController();
        $result = $controller->getBMI($username);
        $obj = json_decode($result);
        return $obj->{'weight'};
    } else {
        return $this->view->render($response, 'login.html');
    }

});