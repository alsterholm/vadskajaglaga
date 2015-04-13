		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
									<h1>Skicka in recept</h1>
									<div class="row">
										<div class="col-md-8">
											<form class="form-horizontal">
												<input type="text" name="name" id="name" class="form-control" placeholder="Receptets namn">
												<br>
												<textarea name="description" id="description" placeholder="Kort beskrivning av receptet" class="form-control"></textarea>
												<br>
												<input type="text" placeholder="Antalet portioner som receptet gäller för" id="ingrdts" class="form-control">
												<br>
												<textarea name="instructions" id="instructions" placeholder="Instruktioner för tillagning" class="form-control" rows="10"></textarea>
											</form>
										</div>
										<div class="col-md-4">
											<textarea class="form-control" rows="19" placeholder="Skriv vilka ingredienser och respektive mängd som behövs för att laga receptet.
																													Exempel:
Potatis: 2 st
Mjöl: 4 dl
Smör: 50g"></textarea>
										</div>
									</div><br>
									<input type="hidden" name="token" value="<?php echo $token; ?>">
									<div class="center">
										<a class="btn btn-success"><span class="fa fa-send"></span> Skicka in</a>
									</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>