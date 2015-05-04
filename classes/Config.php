<?php
	/**
	KLassen förenklar hämtning av värden ur $GLOBALS arrayen


	*/
	class Config {
		/**
		Funktionen tar emot en parameter ($path = tex. 'session/session_name') från vilken den sedan hämtar information från $GLOBALS arrayen.

		*/
		public static function get($path = null) {
			if ($path) {
				$config = $GLOBALS['config'];
				$path = explode('/' , $path);

				foreach ($path as $bit) {
					if (isset($config[$bit])) {
						$config = $config[$bit];
					}
				}
				return $config;
			}
			return false;
		}
	}

?>
