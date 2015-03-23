<?php
	/**
	Klassen hanterar cookies

	*/
	class Cookie {
		/**
		Funktionen kontrollerar ifall en cookie existerar

		*/
		public static function exists($name) {
			return (isset($_COOKIE[$name])) ? true : false;
		}

		/**
		Funktionen häntar värdet i en cookie

		*/
		public static function get($name) {
			return $_COOKIE[$name];
		}

		/**
		Funktionen skapar en ny cookie

		*/
		public static function put($name,$value, $expiry) {
			if (setcookie($name, $value, time() + $expiry, '/')) {
				return true;
			}
			return false;	
		}

		/**
		Funktionen raderar en cookie
		
		*/
		public static function delete($name) {
			self::put($name, '', time() - 1);
		}
	}

?>