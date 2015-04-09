<?php
	class Recipe {
		private 	$_db,
					$_data;

		public function __construct($id = null) {
			if (!$id) {
				$this->_db = DB::getInstance();
				$this->_db->get('recipes', array('id', '=', $id));

				$this->_data = $this->_db->first();
			} else {
				return false;
			}
		}

		public function data() {
			return $this->_data;
		}

		public function update($fields = array(), $id = null) {
			if (!$id) {
				if (!$this->_db->update('recipes', $id, $fields)) {
					throw new Exception('Uppdateringsfel!');
				}
			}
		}

		public static function all() {
			$db = DB::getInstance();
			$db->getAll('recipes');

			return $db->results();
		}

		public static function create($fields = array()) {
			$db = DB::getInstance();

			if (!$db->insert('recipes', $fields)) {
				throw new Exception('Receptfel!');
			}
		}
	}

?>