<?php
	/**
		Klassen förenklar hämtning av värden ur $GLOBALS arrayen

		@author Jimmy Lindström
	*/
	class Config {
		/**
			Funktionen tar emot en parameter från vilken den sedan hämtar information från $GLOBALS arrayen.

			@param $path Sökväg till värdet som skall hämtas
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
