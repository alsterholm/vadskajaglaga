<?php

	class Ingredient {
		public static function all() {
			$db = DB::getInstance();
			$db->getAll('ingredients');

			return $db->results();
		}
	}

?>