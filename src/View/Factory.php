<?php

	namespace Decapitated\View {
		/**
		 *
		 */
		class Factory {
			static public function fromString($path) {
				if (file_exists($path)) {
					return new File($path);
				} else {
					return new $path;
				}
			}

			static public function parsePath($path, $base = './') {
				$join = implode(DIRECTORY_SEPARATOR, [
					rtrim($base, '/\\'),
					str_replace('\\', DIRECTORY_SEPARATOR, $path),
				]);
				if (file_exists($join)) {
					return realpath($join);
				} else {
					// If file doesn't exist, assume class!
					return $path;
				}
			}
		}
	}
