<h1>Lägg till recept</h1>
<br>
<div class="row">
	<div class="col-md-4 add-recipe">
		<div class="row">
			<div class="col-md-12">
				<input type="text" name="name" id="rname" class="form-control" placeholder="Receptets namn" required>
				<br>
				<input type="text" name="time" id="rtime" class="form-control" placeholder="Tid för tillagning (i minuter)" required>
				<br>
				<textarea placeholder="Beskrivning" id="rdesc" name="description" class="form-control" required></textarea>
				<br>
				<textarea placeholder="Instruktioner" id="rinst" name="instructions" class="form-control" rows="14" required></textarea>
				<br>
				<a href="#" class="btn btn-primary" id="add-recipe">Lägg till</a>
			</div>
		</div>
	</div>
	<div class="col-md-4 add-ingredients">
		<input type="text" name="ingredients" id="ingredients" class="form-control" placeholder="Ingredienser">
		<div id="ingr-add">
			<input type="hidden" id="rec-id" name="rec-id" value="">
			<div class="row">
				<div class="col-md-12">
					<p></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" id="ingr-id">
					<input type="text" class="form-control" id="ingr-amount" placeholder="Mängd">
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" id="ingr-unit" placeholder="Enhet">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<br>
					<a class="btn btn-primary" id="add-ingr" type="button">Lägg till</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 ingr-list">
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Ingrediens</td>
					<td class="center">Mängd</td>
					<td class="center">Enhet</td>
					<td class="center">Ta bort</td>
				</tr>
			</thead>
			<tbody id="recipeIngredients">
			</tbody>
		</table>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="js/jquery.autocomplete.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#r-add').addClass('active');
	});

	var ingredient;

	var ingredients = [
		<?php
			foreach(Ingredient::all() as $ingredient) {
				echo '{ id: "' . $ingredient->id . '", value: "' . $ingredient->name . '", bgcolor: "' . $ingredient->bgcolor . '", fgcolor: "' . $ingredient->fgcolor . '" },';
			}
		?>
	];
</script>
<script src="admin/js/recipe.js"></script>
