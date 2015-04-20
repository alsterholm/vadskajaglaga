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

		public static function in($recipe) {
			if ($recipe) {
				$db = DB::getInstance();
				$db->get('recipe_ingredients', array('recipe', '=', $recipe));

				return $db->results();
			}
		}

		public static function addToRecipe($fields) {
			$db = DB::getInstance();
			if (!$db->insert('recipe_ingredients', $fields)) {
				throw new Exception('Problemz!');
			}
		}
	}

?>
