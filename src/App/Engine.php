<?php

	namespace Decapitated\App {
		/*!
		*
		*/
		class Engine extends \League\Plates\Engine {
			public function __construct() {
				parent::__construct();
				$this->folders = new Folders();
			}

			public function make($name) {
				return new Template($this, $name);
			}
		}
	}
