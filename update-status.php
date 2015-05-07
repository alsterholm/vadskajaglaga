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
			$db->update('contact', Input::get('id'), array(
				'status' => Input::get('status')
			));

			echo 1;
		} catch (Exception $e) {
			echo 0;
		}
	}
