<?php
   require_once 'core/init.php';
   $user = new User();

   admin();

   if (Input::exists()) {
		try {
   		Ingredient::addToRecipe(array(
   			'recipe' => Input::get('recipe'),
   			'ingredient' => Input::get('ingredient'),
   			'amount' => Input::get('amount'),
   			'unit' => Input::get('unit')
   		));
         $db = DB::getInstance();
         echo 1;
		} catch (Exception $e) {
			echo 0;
		}
	}
?>
