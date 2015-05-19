<?php
// @author Andreas Indal

require_once 'core/init.php';
admin();

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

