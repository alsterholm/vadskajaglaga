<?php
	/**
	Klassen hanterar betygen på recepten

	*/

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
					$rating += (int) $entry->rating;
				}

				if ($db->count()) {
					return $rating / $db->count();
				} else {
					return false;
				}
			}
		}

		public static function rate($recipe, $rating) {
			$user = new User();
			$db = DB::getInstance();

			if ($user->isLoggedIn()) {
				$db->query("SELECT * FROM ratings WHERE recipe_id = ? AND user_id = ?", array($recipe, $user->data()->id));
				if (!$db->count()) {
					$db->insert('ratings', array(
						'recipe_id' => $recipe,
						'rating' => $rating,
						'user_id' => $user->data()->id
					));
					return true;
				}
			}
			return false;
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
