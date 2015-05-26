

		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<div class="well well-lg main-section">
									<h1>Skicka in recept</h1>

									<?php
										protect();
										
										if (Input::exists()) {
											if (Token::check(Input::get('token'))) {
												$validation = new Validate();

												$validation->check($_POST, array(
													'name' => array (
														'required' => true,
														'alphabetical' => true
													),
													'description' => array(
														'required' => true
													),
													'portions' => array(
														'required' => true
													),
													'instructions' => array(
														'required' => true
													),
													'ingr' => array(
														'required' => true
													)
												));

												if ($validation->passed()) {
													$user = new User();
													try {
														Recipe::suggestion(array(
															'status' => 0,
															'name' => Input::get('name'),
															'portions' => Input::get('portions'),
															'description' => Input::get('description'),
															'instructions' => Input::get('instructions'),
															'ingredients' => Input::get('ingr'),
															'user_id' => $user->data()->id
														));

														echo '
															<div class="center">
																Vi har nu mottagit ditt receptförslag. Tack!<br><br>
																<a class="btn btn-success" href="index.php">Tillbaka</a>
															</div>';
													} catch (Exception $e) {
														Redirect::to(500);
													}
												} else {
													echo '<script>alert("Du måste fylla i alla fält.");</script>';
												}
											} else {
												Redirect::to(404);
											}
										} else {
									?>
									<form action="" method="post" class="form-horizontal">
										<div class="row">										
											<div class="col-md-8">										
												<input type="text" name="name" id="name" class="form-control" placeholder="Receptets namn" required>
												<br>
												<textarea name="description" id="description" placeholder="Kort beskrivning av receptet" class="form-control" required></textarea>
												<br>
												<input type="text" name="portions" placeholder="Antalet portioner som receptet gäller för" id="ingrdts" class="form-control" required>
												<br>
												<textarea name="instructions" id="instructions" placeholder="Instruktioner för tillagning" class="form-control" rows="10" required></textarea>
											</div>
												<br>
											<div class="col-md-4">
												<textarea class="form-control" name="ingr" rows="19" placeholder="Skriv vilka ingredienser och respektive mängd som behövs för att laga receptet" required></textarea>
											</div>
										</div><br>
										<input type="hidden" name="token" value="<?php echo $token; ?>">
										<div class="center">
											<button type="submit" class="btn btn-success"><span class="fa fa-send"></span> Skicka in</button>
										</div>
									</form>
									<?php
										}
									?>
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
			</section>
		</header>