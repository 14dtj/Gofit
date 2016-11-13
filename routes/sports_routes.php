<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/13
 * Time: 9:25
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'controller/SportsController.php';
$app->get('/sports/record', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new SportsController();
        $result = $controller->getAchievedGoal($username);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});

$app->get('/sports/{date}', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $date = $request->getAttribute('date');
        $username = $_SESSION['user'];
        $controller = new SportsController();
        $result = $controller->getRecord($username, $date);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});

$app->post('/sports/saveGoal', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $data = $request->getParsedBody();
        $type = filter_var($data['type'], FILTER_SANITIZE_STRING);
        $value = filter_var($data['value'], FILTER_SANITIZE_STRING);
        $username = $_SESSION['user'];
        $controller = new SportsController();
        $result = $controller->saveGoal($username, $type, $value);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});