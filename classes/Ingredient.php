<?php

	class Ingredient {
		public static function all() {
			$db = DB::getInstance();
			$db->getAll('ingredients');

			return $db->results();
		}

		public static function add($fields) {
			$db = DB::getInstance();

			if (!$db->insert('ingredients', $fields)) {
				throw new Exception('Problemz!');
			}
		}
	}

?>