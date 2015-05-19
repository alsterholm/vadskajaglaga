<?php
/**
	Klass för att hantera recept

	@author Jimmy Lindström
*/

class Recipe {
	private 	$_db,
				$_data;

	/**
		Skapar ett nytt recipe-objekt
	*/
	public function __construct($id = null) {
		if ($id) {
			$this->_db = DB::getInstance();
			$this->_db->get('recipes', array('id', '=', $id));

			$this->_data = $this->_db->first();
		} else {
			return false;
		}
	}

	/**
		Returnerar recipe-objektets data
	*/
	public function data() {
		return $this->_data;
	}

	/**
		Returnerar huruvida receptet finns i databasen eller inte
	*/
	public function exists() {
		return ($this->_data) ? true : false;
	}

	/**
		Uppdaterar receptets data
	*/
	public function update($fields = array(), $id = null) {
		if (!$id) {
			$id = $this->data()->id;
		}

		if (!$this->_db->update('recipes', $id, $fields)) {
			throw new Exception('Uppdateringsfel!');
		}
	}

	/**
		Returnerar samtliga recept
	*/
	public static function all() {
		$db = DB::getInstance();
		$db->getAll('recipes');

		return $db->results();
	}

	/**
		Skapar ett nytt recept i databasen
	*/
	public static function create($fields = array()) {
		$db = DB::getInstance();

		if (!$db->insert('recipes', $fields)) {
			throw new Exception('Receptfel!');
		}
	}

	/**
		Skapar ett nytt receptförslag i databasen
	*/
	public static function suggestion($fields = array()) {
		$db = DB::getInstance();

		if (!$db->insert('recipe_sugs', $fields)) {
			throw new Exception('Gick ej lägga till förslag');
		}
	}

	/**
		Hämtar samtliga receptförslag från databasen
	*/
	public static function getSuggestions() {
		$db = DB::getInstance();
		$db->getAll('recipe_sugs');

		return $db->results();
	}
}

