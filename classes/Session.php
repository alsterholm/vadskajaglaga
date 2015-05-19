<?php

	/**
	Klassen hanterar sessions

	@author Jimmy Lindström
	*/

	class Session {

		/**
		Functionen kontrollerar ifall en session existerar

		Tar emot en parameter med sessionnamnet($name)

		*/
		public static function exists($name) {
			return (isset($_SESSION[$name])) ? true : false;
		}

		/**
		Functionen lägger till en ny session

		Tar emot två parametrar, en med sessionnamnet($name), samt en med värdet($value)

		*/
		public static function put($name, $value) {
			return $_SESSION[$name] = $value;
		}

		/**
		Functionen hämtar en session

		Tar emot en parameter med sessionnamnet($name)

		*/
		public static function get($name) {
			return $_SESSION[$name];
		}

		/**
		Functionen raderar en session

		Tar emot en parameter med sessionnamnet($name)

		*/
		public static function delete($name) {
			if (self::exists($name)) {
				unset($_SESSION[$name]);
			}
		}
	}
