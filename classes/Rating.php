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
	}

?>