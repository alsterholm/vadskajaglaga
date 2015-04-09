		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
								<fieldset>
									<h1>Hitta recept</h1>
									<div class="col-md-12">
										<label for="ingredients">Ange dina ingredienser</label>
										<input type="text" class="form-control" id="ingredients" autocomplete="off">
									</div>
									<div class="col-md-12 choices">
										<div class="ing">
											<label>Valda ingredienser</label>
											<div id="chosen-ingredients"></div>
											
										</div>
										<div class="btn-search">
											<form action="sokresultat.php" method="post">
												<input type="hidden" name="ingr_ids" id="ingr_ids">
												<button class="btn btn-success btn-search-btn">Sök recept <span class="fa fa-search btn-search-icon"></span></button>
											</form>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>

		<script>
			var ingredients = [
				<?php
					foreach(Ingredient::all() as $ingredient) {
						echo '{ id: "' . $ingredient->id . '", value: "' . $ingredient->name . '", bgcolor: "' . $ingredient->bgcolor . '", fgcolor: "' . $ingredient->fgcolor . '" },';
					}
				?>
			]
		</script>