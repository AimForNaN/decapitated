<?php

	namespace Decapitated\View {
		/*!
		 *
		 */
		class Json extends Base {
			function __invoke(Array $data) {
				return json_encode($data);
			}
		}
	}
