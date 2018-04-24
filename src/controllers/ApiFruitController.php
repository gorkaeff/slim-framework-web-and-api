<?php
namespace Controllers;

class ApiFruitController extends Controller
{
	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}
	
	public function getFruits($request, $response, $args) {
		$this->logger->addInfo("API[fruits]");
		//example
		$fruitModel = new \Models\FruitModel();
		$fruits = $fruitModel->getFruits();
		return $response->withJson($fruits);
	}

	public function getFruitById($request, $response, $args) {
		$this->logger->addInfo("API[fruit]", $args);

		$id = $args['id'];

		//example
		$fruitModel = new \Models\FruitModel();
		$fruits = $fruitModel->getFruits();
		return $fruits[$id] == null ? $response->withJson("Error", 400) : $response->withJson($fruits[$id]);
	}
}