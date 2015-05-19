<?php

   require_once 'core/init.php';
   
   if (Input::exists('get')) {
      $recipe = new Recipe(Input::get('id'));
      $user = new User();

      if (!$recipe->exists()) {
         Redirect::to(404);
      }

      if (file_exists('img/recipe/' . $recipe->data()->id) . '.jpg') {
         $image = 'img/recipe/' . $recipe->data()->id . '.jpg';
      } else {
         $image = 'img/recipe/noimage.jpg';
      }

      $rating = '';
      $stars = 0;
      $loggedIn = ($user->isLoggedIn()) ? 'rate-logged-in' : 'rate-not-logged-in';
      if ($r = Rating::get($recipe->data()->id)) {
         $r = round($r);
         while ($stars < 5) {
            if ($r <= $stars) {
               $rating .= '<button href="#" class="rating-star ' . $loggedIn . ' rating-star-gray glyphicon glyphicon-star" id="star-' . ($stars + 1) . '"></button> ';
            } else {
               $rating .= '<button href="#" class="rating-star ' . $loggedIn . ' rating-star-gold glyphicon glyphicon-star" id="star-' . ($stars + 1) . '"></button> ';
            }
            $stars++;
         }
         $rating .= '<input type="hidden" id="rec-rating" value="' . $r . '">';
      } else {
         while ($stars < 5) {
            $rating .= '<button href="#" class="rating-star ' . $loggedIn . ' rating-star-gray glyphicon glyphicon-star" id="star-' . ($stars + 1) . '"></button> ';
            $stars++;
         }
      }
?>
 	<section class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="well well-lg main-section">
                  <?php if (Cookie::exists('search')) { ?>
                     <div class="row">
                        <div class="col-md-12 center back-to-search">
                           <a href="sokresultat.php">&laquo; Tillbaka till sökresultat</a>
                           <hr>
                        </div>
                     </div>
                  <?php } ?>
                     <div class="row">
								<div class="col-md-8 col-sm-9">
									<h1 class="recipe"><?php echo $recipe->data()->name; ?></h1>
                           <p class="recipe-description">
                              <?php echo $recipe->data()->description; ?>
                           </p>
								</div>
								<div class="col-md-4 col-sm-3">
									<img src="<?php echo $image; ?>" class="img-responsive recipe-pic thumbnail">
								</div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-12 center">
                              <div class="rating-success">Tack för ditt betyg!</div>
                              <div class="rating-failure">Du har redan betygsatt det här receptet!</div>
                              <div class="rating-login">Du måste vara inloggad för att betygsätta recept!</div>
                              <div class="recipe-login">Du måste vara inloggad för att spara favoritrecept!</div>
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-sm-5">
                           <div class="recipe-time">
                              Betyg: <span id="rating-stars"><?php echo $rating; ?></span>
                              <br>
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span> Tid: Ca <?php echo $recipe->data()->time; ?> minuter
									</div>
                        </div>
                        <div class="col-sm -7">
									<div class="recipe-btns right">
                              <input type="hidden" id="recipe-id" value="<?php echo Input::get('id') ?>">
   										<button type="button" id="favorite-btn" class="btn <?php if (Favorite::check($recipe->data()->id)) { echo 'btn-danger'; } else { echo 'btn-default'; } if (!$user->isLoggedIn()) { echo ' not-logged-in'; } ?>" aria-label="left align"
                                    data-toggle="tooltip" data-placement="top" title="<?php if (Favorite::check($recipe->data()->id)) { echo 'Favoritmarkerat'; } else { echo 'Lägg till som favorit'; } ?>">
   											<span class="glyphicon glyphicon-heart-empty"></span>
   										</button>
									</div>
                           <?php if ($user->isLoggedIn()) { ?>
                           <div class="recipe-btns-mobile center">
                              <input type="hidden" id="recipe-id" value="<?php echo Input::get('id') ?>">
                              <span class="mobile-favorite">
                                 <button type="button" id="favorite-btn" class="btn <?php if (Favorite::check($recipe->data()->id)) { echo 'btn-danger'; } else { echo 'btn-default'; } if (!$user->isLoggedIn()) { echo ' not-logged-in'; } ?>" aria-label="left align"
                                    data-toggle="tooltip" data-placement="top" title="<?php if (Favorite::check($recipe->data()->id)) { echo 'Favoritmarkerat'; } else { echo 'Lägg till som favorit'; } ?>">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                 </button>
                              </span>
                           </div>
                           <?php } ?>
                        </div>
                     </div>
                     <br>
							<div class="row">
								<div class="col-md-4 ingredients">
								<h2 class="recipe">Ingredienser</h2>
                        Antal portioner: <span id="portions">4</span><br>
                        <input type="range" id="portions-slider" value="4" min="1" max="10"><br>
                        <table class="table table-striped ingredients">
                           <tbody>
                              <?php

                              foreach (Ingredient::in($recipe->data()->id) as $ingredient) {
                                 echo '
                                 <tr>
                                    <td><span class="ingr-portion-amount">' . $ingredient->amount . '</span> ' . $ingredient->unit . '</td>
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