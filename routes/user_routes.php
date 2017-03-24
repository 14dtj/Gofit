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


$app->post('/login', function (Request $request, Response $response) use ($app) {
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
        if ($username == "admin") {
            return $response->withStatus(302)->withHeader('Location', '/user/getAllUsers');
        } else {
            return $app->$response->redirect('/view/sports.html', 301);
        }
    }
});
$app->post('/register', function (Request $request, Response $response) use ($app) {
    $data = $request->getParsedBody();
    $username = filter_var($data['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    $controller = new UserController();
    $controller->register($username, $password);
    $response->getBody()->write("<script>alert('registered successfully'); history.go(-2);</script>");
    return $response;
});

$app->post('/editProfile', function (Request $request, Response $response) use ($app) {
    $data = $request->getParsedBody();
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
        $gender = filter_var($data['gender'], FILTER_SANITIZE_STRING);
        $birth = filter_var($data['birth'], FILTER_SANITIZE_STRING);
        $loc = filter_var($data['location'], FILTER_SANITIZE_STRING);
        $interest = filter_var($data['interest'], FILTER_SANITIZE_STRING);
        $motto = filter_var($data['motto'], FILTER_SANITIZE_STRING);
        $controller = new UserController();
        $controller->editProfile($username, $name, $gender, $birth, $loc, $interest, $motto);
        $response->getBody()->write("<script>alert('Edit profile successfully'); history.go(-1);</script>");
    } else {
        return $this->view->render($response, 'login.html');
    }
});

$app->get('/showBasicInfo', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new UserController();
        $result = $controller->showBasicInfo($username);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});

$app->post('/uploadAvatar', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $target_dir = "view/images/avatar/";
        $target_file = $target_dir . basename($_FILES['avatar']['name']);

        $check = getimagesize($_FILES['avatar']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                $username = $_SESSION['user'];
                $controller = new UserController();
                $controller->storeAvatar($username, $_FILES['avatar']['name']);
                $response->getBody()->write("<script>alert('Uploaded successfully'); history.go(-1);</script>");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            $response->getBody()->write("<script>alert('File is not an image.'); history.go(-1);</script>");
        }
    } else {
        return $this->view->render($response, 'login.html');
    }
});
$app->get('/getBriefInfo', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new UserController();
        $result = $controller->getBriefInfo($username);
        return $result;
    } else {
        return $this->view->render($response, 'login.html');
    }
});
$app->get('/user/getAll', function (Request $request, Response $response) use ($app) {
    $controller = new UserController();
    return $controller->getAllUsers();
});
$app->get('/user/getAllUsers', function (Request $request, Response $response) use ($app) {
    return $this->view->render($response, 'admin.html');
});
$app->post('/user/changeLevel', function (Request $request, Response $response) use ($app) {
    $data = $request->getParsedBody();
    $level = filter_var($data['level'], FILTER_SANITIZE_STRING);
    $username = filter_var($data['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($data['password'], FILTER_SANITIZE_STRING);
    $controller = new UserController();
    $controller->updateUserInfo($username, $password, $level);
    return $this->view->render($response, 'admin.html');
});
