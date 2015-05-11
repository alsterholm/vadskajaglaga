

		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
									<h1>Skicka in recept</h1>

									<?php
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
														'required' => true,
														'numerical' => true
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
																<a class="btn btn-success" href="skicka-in.php">Tillbaka</a>
															</div>';
													} catch (Exception $e) {
														Redirect::to(500);
													}
												} else {
													//VALIDATION, FIXA
													Redirect::to(404);
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
					</div>
				</div>
			</section>
		</header>