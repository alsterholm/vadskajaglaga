<?php
	/**
		Klassen hanterar favorit recept. Att lägga till och ta bort sina favoritrecept
		
		@author Andreas Indal
	*/
	class Favorite {

		/**
			Hämtar alla favoritmarkeringar för den inloggade användaren
		*/
		public static function get() {
			$user = new User();

			$db = DB::getInstance();
			$db->get('favorites', array('user_id', '=', $user->data()->id));

			return $db->results();
		}

		/**
			Kontrollerar huruvida den inloggade användaren har några favoritmarkeringar eller inte
		*/
		public static function exists() {
			$user = new User();

			$db = DB::getInstance();
			$db->get('favorites', array('user_id', '=', $user->data()->id));

			return $db->count();
		}

		/**
			Kontrollerar huruvida ett recept är favoritmarkerat av den inloggade användaren

			@param $id 	Receptets id
		*/
		public static function check($id) {
			$user = new User();

			if ($user->exists()) {
				$db = DB::getInstance();
				$db->query('SELECT * FROM favorites WHERE recipe_id = ? AND user_id = ?', array($id, $user->data()->id));

				return $db->count();
			}
			return false;
		}

		/**
			Lägger till en ny favorit för en användare

			@param $fields 	Data som ska läggas till i databastabellen
		*/
		public static function add($fields) {
			$db = DB::getInstance();
			if (!$db->insert('favorites', $fields)) {
				throw new Exception("Det gick inte att lägga till favoriten");
			}
		}
	}