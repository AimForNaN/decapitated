<?php

	namespace Decapitated\View {
		use \Decapitated\Model\Base as Model;

		/*!
		 *
		 */
		class File extends Base {
			protected $path = null;

			function __construct($path) {
				$this->path = $path;
			}

			function __invoke(Array $data) {
				$data = new Model($data);

				ob_start();
				if (file_exists($this->path)) {
					include $this->path;
				}
				$output = ob_get_contents();
				ob_end_clean();

				return $output;
			}
		}
	}
