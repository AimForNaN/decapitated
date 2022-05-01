<?php

    namespace Decapitated\App {
		use \Decapitated\Model\Base as Model;
		use \Decapitated\View\{Base as View, Factory as ViewFactory, Json as JsonView};

        /**
         *
         */
        class Base {
			protected $data = [];

            function __construct(Array $opts = []) {
				$opts = array_merge([
					'model' => [],
					'view' => JsonView::class,
					'views' => '.',
				], $opts);
				$this->data = new Model($opts);

				$this->__autoload();
            }

			protected function __autoload() {
				$base = $this->views;
				spl_autoload_register(function ($class) use ($base) {
					$file = ViewFactory::parsePath($class . '.php', $base);
					if (file_exists($file)) {
						require_once($file);
					}
				});
			}

			public function __get($key) {
				return $this->data->{$key};
			}

            public function __invoke(Array $model = []) {
				echo $this->view($this->view, $model);
            }

			public function __toString() {
				return $this->view($this->view, $this->model->toArray());
			}

			public function view($view, $model = []) {
				$view = ViewFactory::fromString(
					ViewFactory::parsePath($view, $this->views)
				);

				return $view($model, $this);
			}
        }
    }