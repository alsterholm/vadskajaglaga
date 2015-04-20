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
   		Recipe::create(array(
   			'name' => Input::get('name'),
   			'description' => Input::get('description'),
   			'instructions' => Input::get('instructions'),
   			'time' => Input::get('time')
   		));
         $db = DB::getInstance();
         echo $db->lastInsertId();
		} catch (Exception $e) {
			echo 0;
		}
	}
?>
