<?php

    namespace Decapitated\Model {
        /*!
         *
         */
        class Base implements \ArrayAccess, \Countable, \JsonSerializable  {
			protected $data = [];
			protected $delimiter = '/';

            function __construct(Array $data = []) {
				$this->setData($data);
            }

			public function __get ($offset) {
				$ret = null;
				if (isset($this->data[$offset])) {
					$ret = $this->data[$offset];
					if (is_array($ret)) {
						return new static($ret);
					}
				}
				return $ret;
		    }

			public function __set($offset, $value) {
			}

			public function count(): int {
				return count($this->data);
			}

			public function offsetExists($offset): bool {
				$find = $this->offsetGet($offset);
		        return isset($find);
		    }

			public function offsetGet($offset): mixed {
				$data = $this->data;
				if (!is_null($offset)) {
					$offset = array_filter(explode($this->delimiter, (string)$offset));
					foreach ($offset as $key) {
						if (isset($data[$key])) {
							$data = $data[$key];
						} else {
							$data = null;
						}
					}
					if (is_array($data)) {
						return new static($data);
					}
				}
				return $data;
		    }

			public function offsetSet($offset, $value): void {
		    }

			public function offsetUnset($offset): void {
		    }

			public function jsonSerialize(): mixed {
				return $this->data;
			}

			protected function setData(Array &$data = []) {
				$this->data = &$data;
			}

			public function toArray() {
				return $this->data;
			}
        }
    }
