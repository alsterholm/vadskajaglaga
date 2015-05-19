<?php
	/**
		Klassen hanterar hashar
	
		@author Jimmy Lindström
	*/
	class Hash {
		/**
			Skapar en ny hash utifrån en sträng

			@param $string 	Strängen som ska hashas
			@param $salt 	Valfri salt som konkateneras med strängen
		*/
		public static function make($string, $salt = '') {
			return hash('sha256', $string . $salt);
		}

		/**
			Genererar en ny salt

			@param $length 	Längden på salten som returneras
		*/
		public static function salt($length) {
			return mcrypt_create_iv($length);
		}

		/**
			Skapar en ny hash random hash
		*/
		public static function unique() {
			return self::make(uniqid());
		}
	}
