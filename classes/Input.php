<?php
	/**
	Klassen kontrollerar input på sidan

	*/
	class Input {

		/**
		Kontrollerar ifall input existerar och ifall det är input av typer post ellet get

		Tar emot en parameter med den typ($type) av input som skickas. post är valt som standard

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

		Tar emot en parameter med det element($item) som skall hämtas
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

?>
