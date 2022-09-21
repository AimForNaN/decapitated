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
					if (\is_array($ret)) {
						$tmp = new static();
						$tmp->setData($this->data[$offset]);
						$ret = $tmp;
					}
				}
				return $ret;
		    }

			public function __set($offset, $value) {
				$this->offsetSet($offset, $value);
			}

			public function offsetSet($offset, $value) {
                $this->data[$offset] = $value;
		    }

			public function offsetUnset($offset) {
		        if ($this->offsetExists($offset)) {
		            unset($this->data[$offset]);
		        }
		    }
        }
    }
