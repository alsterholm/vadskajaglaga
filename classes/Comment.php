<?php
/**
	Klassen hanterar kommentarer för recepten.
	@author Andreas Indal
*/
class Comment {

	/**
		Hämtar samtliga kommentarer tillhörande angivet recept.

		@param $recipe Recept-id tillhörande receptet vars kommentarer ska hämtas
	*/
	public static function all($recipe) {
		if ($recipe) {
			$db = DB::getInstance();
			$db->query("SELECT * FROM comments WHERE recipe_id = ? ORDER BY id DESC", array($recipe));

			return $db->results();
		}
	}

	/**
		Postar en ny kommentar till ett recept.

		@param $recipe Array innehållande:
							Receptets id
							Kommentarens innehåll
							Användarens, som postar kommentaren, id
							Datum då kommentaren postas
							IP-adress från vilken kommentaren postas från

	*/
	public static function post($comment = array()) {
		$db = DB::getInstance();
		if ($db->insert('comments', $comment)) {
			return true;
		}
		return false;
	}

}