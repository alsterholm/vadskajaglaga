<?php
	class Message {
		private 	$_db,
					$_data;

		public function __construct($id = null) {
			if (!$id) {
				$this->_db = DB::getInstance();
				$this->_db->get('contact', array('id', '=', $id));

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
				if (!$this->_db->update('contact', $id, $fields)) {
					throw new Exception('Uppdateringsfel!');
				}
			}
		}

		public static function all() {
			$db = DB::getInstance();
			$db->getAll('contact');

			return $db->results();
		}

		public static function create($fields = array()) {
			$db = DB::getInstance();

			if (!$db->insert('contact', $fields)) {
				Redirect::to('kkk.php');
				throw new Exception('Receptfel!');
			}
		}
	}





?>