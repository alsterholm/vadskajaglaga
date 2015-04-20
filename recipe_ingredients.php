<?php
   require_once 'core/init.php';
   header('Content-Type: application/json');

   if (Input::exists()) {
      $ingredients = Ingredient::in(Input::get('recipe_id'));
      $ingredients = json_encode($ingredients);

      echo $ingredients;
   }
?>
