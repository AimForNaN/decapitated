<?php

	require_once './vendor/autoload.php';
	use Decapitated\App\Base as App;

	App::addNS('layouts', realpath(__DIR__ . '/layouts'));
	App::addNS('views', realpath(__DIR__ . '/views'));

	$app = new App();

	echo $app([
		'hello' => 'user',
		'title' => 'Aim For NaN',
	], 'views::HelloLayout');
