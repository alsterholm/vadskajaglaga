<?php
	/**
		Klassen hanterar cookies

		@author Jimmy Lindström
	*/
	class Cookie {
		/**
			Funktionen kontrollerar ifall en cookie existerar

			@param $name Cookiens namn
		*/
		public static function exists($name) {
			return (isset($_COOKIE[$name])) ? true : false;
		}

		/**
			Funktionen häntar värdet i en cookie
			
			@param $name Cookiens namn
		*/
		public static function get($name) {
			return $_COOKIE[$name];
		}

		/**
			Funktionen skapar en ny cookie
		
			@param $name 	Cookiens namn
			@param $value 	Cookiens innehåll
			@param $expiry	Tid då cookien ska upphöra
		*/
		public static function put($name,$value, $expiry) {
			if (setcookie($name, $value, time() + $expiry, '/')) {
				return true;
			}
			return false;
		}

		/**
			Funktionen raderar en cookie

			@param $name Cookiens namn
		*/
		public static function delete($name) {
			self::put($name, '', time() - 1);
		}
	}
