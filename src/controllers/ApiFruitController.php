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
		$fruits = [
			'name' => 'Fruteria Demo Controller', 
			'fruits' => [
				['name' => 'Apples', 'price' => 0.7],
				['name' => 'Bananas', 'price' => 1.1],
				['name' => 'Oranges', 'price' => 1.5]
			]
		];
		return $response->withJson($fruits);
	}

	public function getFruitById($request, $response, $args) {
		$this->logger->addInfo("API[fruit]", $args);

		$id = $args['id'];

		//example
		$fruits = [
			['name' => 'Apples', 'price' => 2],
			['name' => 'Bananas', 'price' => 3],
			['name' => 'Oranges', 'price' => 4]
		];
		return $fruits[$id] == null ? $response->withJson("Error", 400) : $response->withJson($fruits[$id]);
	}
}