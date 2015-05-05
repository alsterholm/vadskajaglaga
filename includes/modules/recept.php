 	<!-- Recipes -->
<?php

   require_once 'core/init.php';
   if (Input::exists('get')) {
      $recipe = new Recipe(Input::get('id'));

      if (!$recipe->exists()) {
         Redirect::to(404);
      }

      if (file_exists('img/recipe/' . $recipe->data()->id) . '.jpg') {
         $image = 'img/recipe/' . $recipe->data()->id . '.jpg';
      } else {
         $image = 'img/recipe/noimage.jpg';
      }
?>
 	<section class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="well well-lg main-section">
                     <div class="row">
								<div class="col-md-8 col-sm-9">
									<h1 class="recipe"><?php echo $recipe->data()->name; ?></h1>
                           <p class="recipe-description">
                              <?php echo $recipe->data()->description; ?>
                           </p>
								</div>
								<div class="col-md-4 col-sm-3">
									<img src="<?php echo $image; ?>" class="img-responsive recipe-pic">
								</div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-sm-5">
                           <div class="recipe-time">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span> Tid: Ca <?php echo $recipe->data()->time; ?> minuter
									</div>
                        </div>
                        <div class="col-sm -7">
									<div class="recipe-btns right">
                              <input type="hidden" id="recipe-id" value="<?php echo Input::get('id') ?>">
										<button type="button" id="favorite-btn" class="btn <?php if (Favorite::check($recipe->data()->id)) { echo 'btn-danger'; } else { echo 'btn-default'; } ?>" aria-label="left align"
                                 data-toggle="tooltip" data-placement="top" title="<?php if (Favorite::check($recipe->data()->id)) { echo 'Favoritmarkerat'; } else { echo 'Lägg till som favorit'; } ?>">
											<span class="glyphicon glyphicon-heart-empty"></span>
										</button>
										<button type="button" class="btn btn-default" aria-label="left align" data-toggle="tooltip" data-placement="top" title="Spara som PDF">
											<span class="fa fa-file-pdf-o"></span>
										</button>
										<button type="button" class="btn btn-default" aria-label="left align" data-toggle="tooltip" data-placement="top" title="Skriv ut">
											<span class="glyphicon glyphicon-print"></span>
										</button>
									</div>
                        </div>
                     </div>
                     <br>
							<div class="row">
								<div class="col-md-4 ingredients">
								<h2 class="recipe">Ingredienser</h2>
                        <table class="table table-striped ingredients">
                           <tbody>
                              <?php

                              foreach (Ingredient::in($recipe->data()->id) as $ingredient) {
                                 echo '
                                 <tr>
                                    <td>' . $ingredient->amount . ' ' . $ingredient->unit . '</td>
                                    <td>' . Ingredient::get($ingredient->ingredient) . '</td>
                                 </tr>
                                 ';
                              }

                              ?>
                           </tbody>
                        </table>
								</div>
								<div class="col-md-8">
   							   <h2 class="recipe">Tillagning</h2>
                           <ol class="recipe-directions">
                              <?php
                                 $instructions = explode('§', ltrim($recipe->data()->instructions, '§'));

                                 foreach($instructions as $instruction) {
                                    echo '<li>' . $instruction . '</li>';
                                 }
                              ?>
								  	</ol>
								</div>
							</div>
                     <hr>
                     <div class="row">
                        <div class="col-md-12">
                           <h2 class="recipe">Kommentarer</h2>
                           <?php
                              if (Comment::all($recipe->data()->id)) {
                                 foreach (Comment::all($recipe->data()->id) as $comment) {
                                    $author = new User($comment->user_id);
                                    $firstname = substr($author->data()->fullname, 0, strpos($author->data()->fullname, ' '));
                           ?>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <label><?php echo $firstname; ?> - <?php echo $comment->date; ?></label>
                                       <p><?php echo nl2br(strip_tags($comment->comment)); ?></p>
                                       <br><br>
                                    </div>
                                 </div>
                           <?php
                                 }
                              } else {
                                 echo 'Ingen har kommenterat det här receptet än!<br><br>';
                              }
                           ?>
                        </div>
                        <?php
                           if ($user->isLoggedIn()) {
                        ?>
                        <div class="col-md-12 comment">
                           <div id="comment-success" class="col-md-12 alert alert-success">
                              Din kommentar har postats!
                           </div>
                           <div id="comment-failure" class="col-md-12 alert alert-danger">
                              Det gick inte att skicka din kommentar...
                           </div>
                           <input type="hidden" id="recipe-id" value="<?php echo $recipe->data()->id ?>">
                           <input type="hidden" id="token" value="<?php echo $token; ?>">
                           <textarea class="form-control" id="comment-text" rows="6" placeholder="Skriv din kommentar här..."></textarea>
                           <br>
                           <p id="chars-text">Tecken: <span id="chars">0</span>/255</p>
                           <br><br>
                           <button id="addcomment" class="btn btn-default" disabled="">Skicka</button>
                        </div>
                        <?php
                           } else {
                        ?>
                        <div class="col-md-12">
                           <p>Du måste vara inloggad för att kommentera recept!</p>
                        </div>
                        <?php
                           }
                        ?>
                     </div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</header>
<?php
   }
?>