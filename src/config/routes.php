<?php

$app->get('/', 'HomeController:index');
$app->get('/contact', 'ContactController:index');

//API
$app->group('/api', function() {
	// Get all fruits (/api/fruits)
	$this->get('/fruits', 'ApiFruitController:getFruits');
    // Get fruit (/api/fruit/1)
    $this->get('/fruit/{id:[0-9]+}', 'ApiFruitController:getFruitById');
});