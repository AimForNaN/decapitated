<?php

    namespace Decapitated\Model {
        /*!
         *
         */
        class Editable extends Base {
			protected $data = [];
			protected $delimiter = '/';

			public function __get ($offset) {
				$ret = null;
				if (isset($this->data[$offset])) {
					$ret = $this->data[$offset];
					if (is_array($ret)) {
						$tmp = new static();
						$tmp->setData($this->data[$offset]);
						$ret = $tmp;
					}
				}
				return $ret;
		    }

			public function __set($offset, $value) {
				$this->data[$offset] = $value;
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
						$ret = new static();
						$ret->setData($data);
						return $ret;
					}
				}
				return $data;
		    }

			public function offsetSet($offset, $value): void {
				if (is_null($offset)) {
					$this->data[] = $value;
				} else {
					$data = &$this->data;
					$offset = array_filter(explode($this->delimiter, (string)$offset));
					foreach ($offset as $key) {
						if (isset($data[$key]) && is_array($data[$key])) {
							$data = &$data[$key];
						}
					}
					if (is_array($data)) {
						$data[$key] = $value;
					}
				}
		    }

			public function offsetUnset($offset): void {
		        if ($this->offsetExists($offset)) {
		            unset($this->data[$offset]);
		        }
		    }
        }
    }
