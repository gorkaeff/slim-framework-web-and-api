<?php
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
	return new \Controllers\HomeController($container);
};

$container['ContactController'] = function($container) {
	return new \Controllers\ContactController($container);
};

$container['ApiFruitController'] = function($container) {
	return new \Controllers\ApiFruitController($container);
};