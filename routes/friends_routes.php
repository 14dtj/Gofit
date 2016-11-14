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
$app->get('/friend/info/{username}', function (Request $request, Response $response) use ($app) {
    $name = $request->getAttribute('username');
    $controller = new FriendController();
    return $controller->getUserInfo($name);
});
$app->get('/friend/followerNum/{username}', function (Request $request, Response $response) use ($app) {
    $name = $request->getAttribute('username');
    $controller = new FriendController();
    return $controller->getFollowerNum($name);
});
$app->get('/friend/followingNum/{username}', function (Request $request, Response $response) use ($app) {
    $name = $request->getAttribute('username');
    $controller = new FriendController();
    return $controller->getFollowingNum($name);
});
$app->get('/friend/sports/{username}', function (Request $request, Response $response) use ($app) {
    $name = $request->getAttribute('username');
    $controller = new FriendController();
    return $controller->getAchievedGoal($name);
});
$app->get('/friend/follow/{action}/{name}', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $name = $request->getAttribute('name');
        $action = $request->getAttribute('action');
        $controller = new FriendController();
        if ($action == "follow") {
            return $controller->followUser($username, $name);
        } else if ($action == "unFollow") {
            return $controller->unFollow($username, $name);
        }
    } else {
        return $this->view->render($response, 'login.html');
    }
});
$app->get('/friend/isFollow/{name}', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $name = $request->getAttribute('name');
        $controller = new FriendController();
        return $controller->isFollow($username, $name);
    } else {
        return $this->view->render($response, 'login.html');
    }
});