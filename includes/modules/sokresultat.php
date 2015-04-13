	<!-- Search results -->
	<header>
		<section class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="list-group">
							<div class="well well-lg main-section">
								<h1>Sökresultat</h1>
									<?php
										if (Input::exists()) {
											$ingredients = explode(',', Input::get('ingr_ids'));
											$results = 0;

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
													$results = 1;

													echo '
														<div class="list-group-item">
															<div class="row">
																<div class="col-md-3">
																<a href="recept.php?id=' . $recipe->id . '" class="thumbnail">
																	<img class="img-responsive" src="img/recipes/' . $recipe->id . '.jpg" title="' . $recipe->name . '">
																</a>
															</div>
															<div class="col-md-9">
																<a href="recept.php?id=' . $recipe->id . '">
																	<h4 class="list-group-item-heading">'. $recipe->name . '</h4>
																</a>
																<p class="list-group-item-text">' . $recipe->description . '</p>
																<h6><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Tid: Ca ' . $recipe->time . ' minuter <span class="right"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> ' . Rating::get($recipe->id) . '/5</span></h6>
															</div>
														</div>
													';
												}							
											}
										} else {
											Redirect::to('index.php');
										}

										if (!$results) {
											echo '<div class="center">Tyvärr gav din sökning inga resultat! <a href="index.php">Försök gärna igen!</a></div>';
										}
									?>
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</section>
	</header>