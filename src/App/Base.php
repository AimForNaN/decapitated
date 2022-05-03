<?php

    namespace Decapitated\App {
		use \Decapitated\Model\Base as Model;

        /**
         *
         */
        class Base {
			protected $data = [];
			static protected $engine = null;

            function __construct(Array $opts = []) {
				$opts = array_merge([
					'model' => [],
					'view' => 'json',
				], $opts);
				$this->data = new Model($opts);

				static::init();
            }

			public function __get($key) {
				return $this->data->{$key};
			}

            public function __invoke($model = [], $view = null) {
				echo static::view($view ?? $this->view, $model);
            }

			public function __toString() {
				return static::view($this->view, $this->model);
			}

			static public function addNS(string $namespace, string $path, bool $fallback = false) {
				static::init();
				static::$engine->addFolder($namespace, $path, $fallback);
			}

			static protected function init() {
				if (!isset(static::$engine)) {
					static::$engine = new \League\Plates\Engine(realpath(__DIR__ . '/../Views'));
				}
			}

			static public function view($view = null, $model = []) {
				if (!empty($view)) {
					static::init();

					if (!($model instanceof Model) && is_array($model)) {
						$model = new Model($model);
					}

					return static::$engine->render($view, [
						'data' => $model,
					]);
				}
			}
        }
    }
