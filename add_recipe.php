<?php
   require_once 'core/init.php';

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
