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

//HOME - ROOT
$app->get('/', function (Request $request, Response $response) {
	//Save in log the request
	$this->logger->addInfo("View[Root]");
	$fruits = [
		['name' => 'Apples', 'price' => 0.7],
		['name' => 'Bananas', 'price' => 1.1],
		['name' => 'Oranges', 'price' => 1.5]
	];
    $response = $this->view->render($response, "home/index.html", ["data" => "This is a demo", "menu" => "home", "fruits" => $fruits]);
    return $response;
});

//CONTACT
$app->get('/contact', function (Request $request, Response $response) {
	//Save in log the request
	$this->logger->addInfo("View[Contact]");
    $response = $this->view->render($response, "contact/contact.html", ["data" => "Contact Page :D", "menu" => "contact"]);
    return $response;
});

//API
$app->group('/api', function() {
	// Get all fruits (/api/fruits)
    $this->get('/fruits', function ($request, $response, $args) {
		$this->logger->addInfo("API[fruits]");
		//example
		$fruits = [
			'name' => 'Fruteria Demo', 
			'fruits' => [
				['name' => 'Apples', 'price' => 0.7],
				['name' => 'Bananas', 'price' => 1.1],
				['name' => 'Oranges', 'price' => 1.5]
			]
		];
		return $response->withJson($fruits);
    });

    // Get fruit (/api/fruit/1)
    $this->get('/fruit/{id:[0-9]+}', function ($request, $response, $args) {
		$this->logger->addInfo("API[fruit]", $args);
		$id = $args['id'];
		//example
		$fruits = [
			['name' => 'Apples', 'price' => 0.7],
			['name' => 'Bananas', 'price' => 1.1],
			['name' => 'Oranges', 'price' => 1.5]
		];
		return $fruits[$id] == null ? $response->withJson("Error", 400) : $response->withJson($fruits[$id]);
	});
});

$app->run();