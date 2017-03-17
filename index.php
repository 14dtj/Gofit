<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
$app = new \Slim\App();
$app->get('/', function (Request $request, Response $response) {
    return $this->view->render($response, '/html/login.html');
});
$container = $app->getContainer();

$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('view');
};

require 'routes/user_routes.php';
require 'routes/health_routes.php';
require 'routes/sports_routes.php';
require 'routes/friends_routes.php';
require 'routes/activity_routes.php';
$app->run();