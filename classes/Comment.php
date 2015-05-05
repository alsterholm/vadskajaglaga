<?php

class Comment {

	public static function all($recipe) {
		if ($recipe) {
			$db = DB::getInstance();
			$db->query("SELECT * FROM comments WHERE recipe_id = ? ORDER BY id DESC", array($recipe));

			return $db->results();
		}
	}

	public static function post($comment = array()) {
		$db = DB::getInstance();
		if ($db->insert('comments', $comment)) {
			return true;
		}
		return false;
	}

}