<?php
	/**
		Klassen hanterar all GET- och POST-input.
		
		@author Jimmy Lindström
	*/
	class Input {

		/**
			Kontrollerar ifall input existerar
			
			@param $type 	Källan från vilken input-data ska kontrolleras
		*/
		public static function exists($type = 'post') {
			switch ($type) {
				case 'post':
					return (!empty($_POST)) ? true : false;
				break;
				case 'get':
					return (!empty($_GET)) ? true : false;
				break;
				default:
					return false;
				break;
			}
		}

		/**
			Returnerar angiven input

			@param $item 	Namnet på det element som ska hämtas
		*/
		public static function get($item) {
			if (isset($_POST[$item])) {
				return $_POST[$item];
			} else if(isset($_GET[$item])) {
				return $_GET[$item];
			}
			return '';
		}
	}