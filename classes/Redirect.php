<?php

	/**
	Klassen hanterar redirects på sidan


	*/
	class Redirect {

		/**
		Functionen förenklar användandet av redirects.

		Tar emot en parameter som motsvarar vart men vill redirecta($location)

		*/
		public static function to($location = null) {
			if ($location) {
				if (is_numeric($location)) {
					switch ($location){
						case 404:
							header('HTTP/1.0 404 Not Found');
							include 'includes/errors/404.php';
							exit();
						break;
						case 401:
							header('HTTP/1.0 401 Unauthorized');
							include 'includes/errors/401.php';
							exit();
						break;
						case 500:
							header('HTTP/1.0 500 Internal Server Error');
							include 'includes/errors/500.php';
							exit();

					}
				}
				header('location: ' . $location);
				exit();
			}
		}
	}

?>
