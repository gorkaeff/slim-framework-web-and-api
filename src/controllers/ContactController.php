<?php
namespace Controllers;

class ContactController extends Controller
{
	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}
	
	public function index($request, $response, $args) {
		//Save in log the request
		$this->logger->addInfo("View[Contact]");

		$response = $this->view->render(
			$response, 
			"contact/contact.html", 
			["data" => "Contact Page :D", "menu" => "contact"]
		);

		return $response;
	}
}