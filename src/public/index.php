<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/../config/settings.php';

$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../config/dependencies.php';

// Register routes
require __DIR__ . '/../config/routes.php';

$app->run();