<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

//TEMPLATES -- Ruta
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig("../templates/", []);
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));
    return $view;
};

//LOGS - folder permisos de escritura
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$app->get('/', function (Request $request, Response $response) {
	//Save in log the request
	$this->logger->addInfo("View[Root]");
    $response = $this->view->render($response, "index.html", ["data" => "This is a demo"]);
    return $response;
});

$app->run();