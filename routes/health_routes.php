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

$app->get('/health/bmi', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new HealthController();
        $result = $controller->getBMI($username);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }

});

$app->get('/health/sleep/{date}', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $date = $request->getAttribute('date');
        $username = $_SESSION['user'];
        $controller = new HealthController();
        $result = $controller->getSleepCondition($username, $date);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});

$app->get('/health/sleepNights', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new HealthController();
        $result = $controller->getWellSleepNights($username);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});
$app->get('/health/editBMI/{weight}/{height}', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $weight = $request->getAttribute("weight");
        $height = $request->getAttribute("height");
        $controller = new HealthController();
        $controller->updateBMI($username, $weight, $height);
        $response->getBody()->write("<script>alert('Update successfully');history.go(-1);</script>");
        return $response;
    } else {
        return $this->view->render($response, 'login.html');
    }
});