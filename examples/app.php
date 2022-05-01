<?php

	require_once './vendor/autoload.php';
	use Decapitated\App\Base as App;
	use Decapitated\Model\Base as Model;

	$app = new App([
		'model' => [
			'hello' => 'world',
		],
		'view' => 'HelloWorld',
		'views' => './views',
	]);

	// Use model provided in options
	echo $app;

	// Override model
	$app([
		'hello' => 'user',
	]);
