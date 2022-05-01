<?php

	namespace Decapitated\Helpers {
		function view($view, $model = []) {
			if (!empty($view)) {
				return \Decapitated\App\Base::view($view, $model);
			}
		}
	}
