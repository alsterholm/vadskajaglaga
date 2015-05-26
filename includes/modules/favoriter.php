		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<div class="well well-lg main-section">
								<h1>Mina favoritrecept</h1>

								<div class="row">
									<div class="col-md-12">
										<?php
											protect();

											if (Favorite::exists()) {
												foreach (Favorite::get() as $favorite) {
													$recipe = new Recipe($favorite->recipe_id);
													$img = (file_exists('img/recipe/' . $recipe->data()->id . '.jpg')) ? $recipe->data()->id : 'no-image';
													echo'
														<a href="recept.php?id=' . $recipe->data()->id . '">
															<div class="row favrecipe">
																<div class="col-md-2">
																	<img src="img/recipe/' . $img . '.jpg" class="img-responsive">
																</div>
																<div class="col-md-10">
																	<h2>' . $recipe->data()->name . '</h2>
																	<p>' . $recipe->data()->description . '</p>
																</div>
															</div>
														</a>
													';
												}
											} else {
												echo '<div class="center">Du har inte lagt till några favoritrecept!</div>';
											}
										?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- Vad ska jag laga -->
								<ins class="adsbygoogle"
								     style="display:block"
								     data-ad-client="ca-pub-2210940611345808"
								     data-ad-slot="2194676377"
								     data-ad-format="auto"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>
