<?php

	namespace Decapitated\App {
		/*!
		*
		*/
		class Engine extends \League\Plates\Engine {
			public function make($name) {
				return new Template($this, $name);
			}
		}
	}
