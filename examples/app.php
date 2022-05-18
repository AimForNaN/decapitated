<?php

	require_once './vendor/autoload.php';
	use Decapitated\App\Base as App;

	App::addNS('views', realpath(__DIR__ . '/views'));

	$app = new App([
		'model' => [
			'hello' => 'world',
		],
		'view' => 'views::HelloWorld',
	]);

	// Use model provided in options
	echo $app;

	// Override model
	echo $app([
		'hello' => 'user',
	]);
