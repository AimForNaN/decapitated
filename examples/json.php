<?php

	header('Content-Type: application/json');

	require_once './vendor/autoload.php';
	use Decapitated\App\Base as App;

	$app = new App([
		'model' => [
			'hello' => 'world',
		],
	]);

	// Use model provided in options
	echo $app;

	// Override model
	echo $app([
		'hello' => 'user',
	]);
