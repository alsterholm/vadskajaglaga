<?php

	require_once 'core/init.php';
	if (Input::exists()) {
		$db = DB::getInstance();
		$user = new User();

		if (Favorite::check(Input::get('recipe'))) {
			$db->query('DELETE FROM favorites WHERE user_id = ? AND recipe_id = ?', array($user->data()->id, Input::get('recipe')));
			echo 1;	
		} else {
			Favorite::add(array(
				'user_id' => $user->data()->id,
				'recipe_id' => Input::get('recipe')
			));

			echo 1;
		}
	} else {
		echo 0;
	}