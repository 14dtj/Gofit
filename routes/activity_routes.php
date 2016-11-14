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
$app->get('/activity/organized', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new ActivityController();
        return $controller->getOrganized($username);
    } else {
        return $this->view->render($response, 'login.html');
    }
});
$app->get('/activity/joined', function (Request $request, Response $response) use ($app) {
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $controller = new ActivityController();
        return $controller->getJoined($username);
    } else {
        return $this->view->render($response, 'login.html');
    }
});
$app->post('/createActivity', function (Request $request, Response $response) use ($app) {
    $data = $request->getParsedBody();
    session_start();
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
        $type = filter_var($data['type'], FILTER_SANITIZE_STRING);
        $sports = filter_var($data['sports'], FILTER_SANITIZE_STRING);
        $intro = filter_var($data['introduction'], FILTER_SANITIZE_STRING);
        $startDate = filter_var($data['startDate'], FILTER_SANITIZE_STRING);
        $startTime = filter_var($data['startTime'], FILTER_SANITIZE_STRING);
        $start = $startDate + " " + $startTime;
        $endDate = filter_var($data['endDate'], FILTER_SANITIZE_STRING);
        $endTime = filter_var($data['endTime'], FILTER_SANITIZE_STRING);
        $end = $endDate + " " + $endTime;
        $award = filter_var($data['award'], FILTER_SANITIZE_STRING);
        $number = filter_var($data['number'], FILTER_SANITIZE_STRING);
//about picture
        $target_dir = "view/images/activity/";
        $target_file = $target_dir . basename($_FILES['picture']['name']);

        $check = getimagesize($_FILES['picture']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                $pic = $_FILES['picture']['name'];
                $controller = new ActivityController();
                $controller->createActivity($name, $number, $award, $type, $pic, $sports, $username, $intro, $start, $end);
                $response->getBody()->write("<script>alert('Start activity successfully'); history.go(-1);</script>");
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