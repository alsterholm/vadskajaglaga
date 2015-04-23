<?php

	require_once 'core/init.php';

	$user = new User();
	if ($user->isLoggedIn()) {
      if (!$user->isAdmin()) {
         Redirect::to(401);
      }
   } else {
      Redirect::to(401);
   }

	if (Input::exists()) {
		try {
			$db = DB::getInstance();
			$db->update('recipe_ingredients', Input::get('id'), array(
				'unit' => Input::get('unit'),
				'amount' => Input::get('amount')
			));

			echo 1;
		} catch (Exception $e) {
			echo 0;
		}
	}

