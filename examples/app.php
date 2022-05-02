<?php

	require_once './vendor/autoload.php';
	use Decapitated\App\Base as App;

	App::$views = './views';
	$app = new App([
		'model' => [
			'hello' => 'world',
		],
		'view' => 'HelloWorld',
	]);

	// Use model provided in options
	echo $app;

	// Override model
	$app([
		'hello' => 'user',
	]);
