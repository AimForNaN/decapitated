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

				// HACK: Meh, easiest way to include helpers...
				include_once(__DIR__ . '/../helpers.php');

				ob_start();
				if (file_exists($this->path)) {
					include $this->path;
				}
				return ob_get_clean();
			}
		}
	}
