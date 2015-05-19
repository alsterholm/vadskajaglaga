<?php
// @author Andreas Indal

require_once 'core/init.php';
$user = new User();

admin();

header('Content-Type: application/json');

if (Input::exists()) {
	$ingredients = Ingredient::in(Input::get('recipe_id'));
	$ingredients = json_encode($ingredients);

	echo $ingredients;
}
