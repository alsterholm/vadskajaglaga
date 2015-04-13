		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
								<h1>Mina favoritrecept</h1>
								
								<div class="row">
									<div class="col-md-12">
										<?php
											foreach (Favorite::get() as $favorite) {
												$recipe = new Recipe($favorite->recipe_id);
												echo'
													<a href="recipe.php?id=' . $recipe->data()->id . '">
														<div class="row favrecipe">
															<div class="col-md-2">
																<img src="img/recipe/' . $recipe->data->id . '" class="img-responsive">
															</div>
															<div class="col-md-10">
																<h2>' . $recipe->data()->name . '</h2>
																<p>' . $recipe->data()->description . '</p>
															</div>
														</div>
													</a>
												';
											}
										?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>