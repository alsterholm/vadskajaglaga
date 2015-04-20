<?php

	class Rating {

		/**
			Returnerar ett recepts betyg. [OTESTAD]
		*/
		public static function get($recipe_id = null) {
			if($recipe_id) {
				$db = DB::getInstance();
				$db->get('ratings', array('recipe_id', '=', $recipe_id));
				$rating = 0;

				foreach ($db->results() as $entry) {
					$rating += $entry;
				}

				return $rating / $db->count();
			}
		}

		public static function ratings($fields = array()) {
			$db = DB::getInstance();

			if (!$db->insert('ratings', $fields)) {
				throw new Exception('Gick ej lägga till rating');
			}
		}

		public static function getRatings() {
			$db = DB::getInstance();
			$db->getAll('ratings');

			return $db->results();
		}
	}

?>
