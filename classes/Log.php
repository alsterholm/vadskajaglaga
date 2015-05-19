<?php
/**
	Klassen hanterar IP-loggningen i databasen.

	@author Andreas Indal
*/
class Log {
	/**
		Returnerar samtliga rader från IP-loggen
	*/
	public static function getAll() {
		$db = DB::getInstance();
		$db->getAll('ip_log');

		return $db->results();
	}
}
