<?php
	class Recipe{
		private $_db,
				$_data;
				

		public function __construct() {
			$this->_db = DB::getInstance();

		}

		public function create($fields = array()) {
			if (!$this->_db->insert('recipe', $fields)) {
				throw new Exception('There was a problem adding the recipe.');
			}
		}

		public function find($recipe = null) {
			if ($recipe) {
				$field = (is_numeric($recipe)) ? 'id' : 'recipe_name';
				$data = $this->_db->get('recipe', array($field, '=', $recipe));

				if ($data->count()) {
					$this->_data = $data->first();
					return true;
				}
			}
			return false;
		}

		public function search($fields = array()) {
			if (count($fields) {
				$values = null;
				$x = 1;

				foreach ($fields as $field) {
					$values .= "?";
					if ($x < count($fields)) {
						$values .= ', ';		
					}
					$x++;
				}
				

			} else {
				return false;
			}

		} 



		public function exists() {
			return (!empty($this->_data)) ? true : false;
		}

		public function data() {
		return $this->_data;

		}
	}

?>