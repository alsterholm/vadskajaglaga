<?php
/**
	Klassen hanterar meddelanden som skickas invia "kontakta oss" funktionen
	
	@author Jimmy Lindström & Andreas Indal
*/

class Message {
	private 	$_db,
				$_data;

	/**
		Skapar ett nytt message-objekt

		@param $id 	Meddelandets id
	*/
	public function __construct($id = null) {
		if ($id) {
			$this->_db = DB::getInstance();
			$this->_db->get('contact', array('id', '=', $id));

			$this->_data = $this->_db->first();
		} else {
			return false;
		}
	}

	/**
		Returnerar message-objektets data
	*/
	public function data() {
		return $this->_data;
	}

	/**
		Uppdaterar ett meddelande
	*/
	public function update($fields = array(), $id = null) {
		if (!$id) {
			if (!$this->_db->update('contact', $id, $fields)) {
				throw new Exception('Kunde inte uppdatera meddelandet');
			}
		}
	}

	/**
		Returnerar alla meddelanden som finns i databasen
	*/
	public static function all() {
		$db = DB::getInstance();
		$db->getAll('contact');

		return $db->results();
	}

	/**
		Skapar ett nytt meddelande
	*/
	public static function create($fields = array()) {
		$db = DB::getInstance();

		if (!$db->insert('contact', $fields)) {
			throw new Exception('Det gick inte att skapa ett nytt meddelande');
		}
	}

	/**
		Returnerar ett meddelandes status i text, utifrån statusens kod
	*/
	public static function status($code = null) {
		if ($code !== null) {
			switch ($code) {
				case '0': return 'Nytt';
				break;

				case '1': return 'Påbörjat';
				break;

				case '2': return 'Avslutat';
				break;

				case '3': return 'Flaggad';
				break;
			}
		}
	}
}