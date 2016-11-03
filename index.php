<?php

require 'vendor/autoload.php';
$app = new \Slim\App();
require 'routes/user_routes.php';
$app->run();