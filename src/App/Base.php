<?php

    namespace Decapitated\App {
		use \Decapitated\Model\Base as Model;

        /*!
         *
         */
        class Base {
			protected $data = [];
			protected $engine = null;
			static protected $ns = [];

            function __construct(Array $opts = []) {
				$opts = array_merge([
					'model' => [],
					'view' => 'decapitated::json',
					'views' => '.',
				], $opts);
				$this->data = new Model($opts);

				$this->engine = new Engine($this->views);
				$this->addNS('decapitated', realpath(__DIR__ . '/../Views'));
            }

			public function __get($key) {
				return $this->data->{$key};
			}

            public function __invoke($model = [], $view = null) {
				return $this->render($view ?? $this->view, $model);
            }

			public function __toString() {
				return $this->render($this->view, $this->model);
			}

			static public function addNS(string $namespace, string $path, bool $fallback = false) {
				Folders::add($namespace, $path, $fallback);
			}

			public function render($view = null, $model = []) {
				if (!empty($view)) {
					if (!($model instanceof Model) && is_array($model)) {
						$model = new Model($model);
					}

					return $this->engine->render($view, [
						'data' => $model,
					]);
				}
			}
        }
    }
