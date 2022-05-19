<?php

	namespace Decapitated\App {
		/*!
		 *
		 */
		class Folders /*extends \League\Plates\Template\Folders*/ {
            static protected $folders = [];

            static public function add($name, $path, $fallback = false) {
                // if (static::exists($name)) {
                //     throw new \LogicException('The template folder "' . $name . '" is already being used.');
                // }
                static::$folders[$name] = new \League\Plates\Template\Folder($name, $path, $fallback);
            }

            static public function exists($name) {
                return isset(static::$folders[$name]);
            }

            static public function get($name) {
                if (!static::exists($name)) {
                    throw new LogicException('The template folder "' . $name . '" was not found.');
                }

                return static::$folders[$name];
            }

            static public function remove($name) {
                if (!static::exists($name)) {
                    throw new LogicException('The template folder "' . $name . '" was not found.');
                }

                unset(static::$folders[$name]);
            }
		}
	}
