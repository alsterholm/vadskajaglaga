<?php
	require_once 'core/init.php';

	if (Input::exists()) {
		$ingredients = explode(',', Input::get('ingredients'));

		foreach(Recipe::all() as $recipe) {
			$valid = true;
			$req_ingr = explode(',', $recipe->ingredients);

			foreach($req_ingr as $ingr) {
				if (!in_array($ingr, $ingredients)) {
					$valid = false;
					break;
				}
			}
			if ($valid) {
				echo $recipe->name . '<br>';
			}
		}
	}

?>