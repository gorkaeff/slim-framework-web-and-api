<?php
namespace Controllers;

class HomeController extends Controller
{
	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function index($request, $response, $args) {
		//Save in log the request
		$this->logger->addInfo("View[Root]");

		$fruitModel = new \Models\FruitModel();
		$fruits = $fruitModel->getFruits();

		$response = $this->view->render(
			$response, 
			"home/index.html", 
			["data" => "This is a demo", "menu" => "home", "fruits" => $fruits]
		);

		return $response;
	}
}