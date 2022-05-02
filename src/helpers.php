<?php

	function view($view = null, $model = []) {
		if (!empty($view)) {
			return \Decapitated\App\Base::view($view, $model);
		}
	}
