<?php
// @author Andreas Indal

require_once 'core/init.php';
$user = new User();

admin();

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