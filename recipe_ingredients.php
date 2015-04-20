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
   
   header('Content-Type: application/json');

   if (Input::exists()) {
      $ingredients = Ingredient::in(Input::get('recipe_id'));
      $ingredients = json_encode($ingredients);

      echo $ingredients;
   }
?>
