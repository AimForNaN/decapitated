<?php

	namespace Decapitated\View {
		/*!
		 *
		 */
		class Json extends Base {
			function __invoke(Array $data, $app) {
				return json_encode($data);
			}
		}
	}
