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
    $view = new \Slim\Views\Twig("../views/", []);
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

$container['HomeController'] = function($container) {
	return new \src\controllers\HomeController($container);
};

$container['ContactController'] = function($container) {
	return new \src\controllers\ContactController($container);
};

$container['ApiFruitController'] = function($container) {
	return new \src\controllers\ApiFruitController($container);
};

$app->get('/', '\HomeController:index');
$app->get('/contact', '\ContactController:index');

//API
$app->group('/api', function() {
	// Get all fruits (/api/fruits)
	$this->get('/fruits', '\ApiFruitController:getFruits');
    // Get fruit (/api/fruit/1)
    $this->get('/fruit/{id:[0-9]+}', '\ApiFruitController:getFruitById');
});

$app->run();