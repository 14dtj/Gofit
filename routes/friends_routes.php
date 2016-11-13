<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2016/11/13
 * Time: 10:46
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'controller/FriendController.php';

$app->get('/friend/following', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new FriendController();
        $result = $controller->getFollowing($username);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});

$app->get('/friend/follower', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new FriendController();
        $result = $controller->getFollower($username);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});