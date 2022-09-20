<?php

    namespace Decapitated\Model {
        /*!
         *
         */
        class Base implements \ArrayAccess, \Countable, \Iterator, \JsonSerializable  {
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

            public function current() {
				return \current($this->data);
			}

            public function key() {
				return \key($this->data);
			}

            public function next() {
				\next($this->data);
			}

			public function offsetExists($offset): bool {
				$find = $this->offsetGet($offset);
		        return isset($find);
		    }

			public function offsetGet($offset) {
				$data = $this->data;
				if (!\is_null($offset)) {
					$offset = \array_filter(\explode($this->delimiter, (string)$offset));
					foreach ($offset as $key) {
						if (isset($data[$key])) {
							$data = $data[$key];
						} else {
							$data = null;
						}
					}
					if (\is_array($data)) {
						return new static($data);
					}
				}
				return $data;
		    }

			public function offsetSet($offset, $value) {
		    }

			public function offsetUnset($offset) {
		    }

			public function jsonSerialize() {
				return $this->data;
			}

            public function rewind() {
				\reset($this->data);
			}

			protected function setData(Array &$data = []) {
				$this->data = &$data;
			}

			public function toArray() {
				return $this->data;
			}

            public function valid () {
                $key = \key($this->data);
				return isset($this->data[$key]);
			}
        }
    }
