<?php

	header('Content-Type: application/json');

	require_once './vendor/autoload.php';
	use Decapitated\App\Base as App;
	use Decapitated\Model\Base as Model;

	$app = new App([
		'model' => [
			'hello' => 'world',
		],
	]);

	// Use model provided in options
	echo $app;

	// Override model
	$app([
		'hello' => 'user',
	]);
