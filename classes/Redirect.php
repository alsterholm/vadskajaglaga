<?php
	/**
		Klassen hanterar redirects på sidan

		@author Jimmy Lindström
	*/
	class Redirect {

		/**
			Functionen förenklar användandet av redirects.
			Tar emot en parameter som motsvarar vart men vill redirecta($location)
		*/
		public static function to($location = null) {
			if ($location) {
				if (is_numeric($location)) {
					switch ($location) {
						case 401:
							header('Location: 401.php');
							exit();
						break;
						case 403:
							header('Location: 403.php');
							exit();
						break;
						case 500:
							header('Location: 500.php');
							exit();
						break;
						default:
							header('Location: 404.php');
							exit();
					}
				}
				header('Location: ' . $location);
				exit();
			}
		}
	}
?>
