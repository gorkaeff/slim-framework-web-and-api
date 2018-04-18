<?php
class HomeController extends Controller
{
	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function index($request, $response, $args) {
		//Save in log the request
		$this->logger->addInfo("View[Root]");

		$fruits = [
			['name' => 'Apples', 'price' => 0.7],
			['name' => 'Bananas', 'price' => 1.1],
			['name' => 'Oranges', 'price' => 1.5]
		];

		$response = $this->view->render(
			$response, 
			"home/index.html", 
			["data" => "This is a demo", "menu" => "home", "fruits" => $fruits]
		);

		return $response;
	}
}