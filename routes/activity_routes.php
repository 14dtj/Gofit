<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/14
 * Time: 8:36
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'controller/ActivityController.php';

$app->get('/activity/getAll', function (Request $request, Response $response) use ($app) {
    $controller = new ActivityController();
    $result = $controller->getAllActivities();
    return $result;
});

$app->get('/activity/getSingle', function (Request $request, Response $response) use ($app) {
    $controller = new ActivityController();
    $result = $controller->getSingleActivities();
    return $result;
});

$app->get('/activity/getTeam', function (Request $request, Response $response) use ($app) {
    $controller = new ActivityController();
    $result = $controller->getTeamActivities();
    return $result;
});

$app->get('/activity/getMulti', function (Request $request, Response $response) use ($app) {
    $controller = new ActivityController();
    $result = $controller->getMultiActivities();
    return $result;
});

$app->get('/activity/join/{id}', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $id = $request->getAttribute("id");
        $username = $_SESSION['user'];
        $controller = new ActivityController();
        return $controller->joinActivity($username, $id);
    } else {
        return $this->view->render($response, 'login.html');
    }
});