<?php

	class Favorite {

		public static function get() {
			$user = new User();

			$db = DB::getInstance();
			$db->get('favorites', array('user_id', '=', $user->data()->id));

			return $db->results();
		}

		public static function exists() {
			$user = new User();

			$db = DB::getInstance();
			$db->get('favorites', array('user_id', '=', $user->data()->id));

			return $db->count();
		}

		public static function check($id) {
			$user = new User();

			$db = DB::getInstance();
			$db->query('SELECT * FROM favorites WHERE recipe_id = ? AND user_id = ?', array($id, $user->data()->id));

			return $db->count();
		}

		public static function add($fields) {
			$db = DB::getInstance();
			if (!$db->insert('favorites', $fields)) {
				throw new Exception("Problemz");
			}
		}
	}

?>
