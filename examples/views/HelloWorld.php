<?php

	use \Decapitated\View\File as View;

	class HelloWorld extends View {
		function __construct() {
			parent::__construct(__DIR__ . '/index.php');
		}
	}
