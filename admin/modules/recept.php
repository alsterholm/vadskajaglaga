<h1>Ändra recept</h1>
<br>
<?php
	if (Input::exists('get')) {
   	$id = Input::get('id');
   	$recipe = new Recipe($id);

   	$ingredients = Ingredient::in($id);
	}
?>
<div class="row">
	<form class="form-horizontal" action="" method="post">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<input type="hidden" value="<?php echo $id; ?>">
					<input type="text" name="name" class="form-control" value="<?php echo $recipe->data()->name; ?>" required>
					<br>
					<input type="text" name="time" class="form-control" value="<?php echo $recipe->data()->time; ?>" required>
					<br>
					<textarea name="description" class="form-control" required><?php echo $recipe->data()->description; ?></textarea>
					<br>
					<textarea name="instructions" class="form-control" rows="14" required><?php echo $recipe->data()->instructions; ?></textarea>
					<br>
					<input type="hidden" id="ingr" name="ingr">
					<input type="hidden" id="amounts" name="amounts">
					<button class="btn btn-primary" type="submit">Spara ändringar</button>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div id="recipeIngredients">
				<table class="table table-striped">
					<thead>
						<tr>
							<td>Ingrediens</td>
							<td class="center">Mängd</td>
							<td class="center">Enhet</td>
							<td class="center">Uppdatera</td>
							<td class="center">Ta bort</td>
						</tr>
					</thead>
					<tbody id="recipeIngredients" class="update-ingredients">
						<?php
							foreach($ingredients as $ingredient) {
								echo '
									<tr>
										<td>' . Ingredient::get($ingredient->ingredient) . '</td>
										<td class="center"><input type="text" value="' . $ingredient->unit . '"></td>
										<td class="center"><input type="text" value="' . $ingredient->amount . '"></td>
										<td class="center"><button class="btn btn-primary btn-xs">Uppdatera</button></td>
										<td class="center"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
									</tr>
								';
							}
						?>
					</tbody>
				</table>
				<br>
				<label for="ingredients">Lägg till ny ingrediens</label>
				<input type="text" name="ingredients" id="ingredients" class="form-control" placeholder="Ingrediens">
				<div id="ingr-add">
					<div class="row">
						<div class="col-md-5">
							<p></p>
						</div>
						<div class="col-md-7">
							<div class="input-group">
								<input type="text" class="form-control" id="ingr-amount" placeholder="Mängd">
								<span class="input-group-btn">
									<a class="btn btn-primary" id="add-ingr" type="button">Lägg till</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="js/jquery.autocomplete.js"></script>
<script src="js/bootstrap.min.js"></script>



<script>
	$(document).ready(function() {
		$('#r-list').addClass('active');
	});

	var ingredient;

	var ingredients = [
		<?php
			foreach(Ingredient::all() as $ingredient) {
				echo '{ id: "' . $ingredient->id . '", value: "' . $ingredient->name . '", bgcolor: "' . $ingredient->bgcolor . '", fgcolor: "' . $ingredient->fgcolor . '" },';
			}
		?>
	];

	$('#ingredients').autocomplete ({
	    lookup: ingredients,
	    onSelect: function (suggestion) {
	    	addIngr();
	    }
	});

	function addIngr() {
		ingredient = $('#ingredients').val();
		var exists = false;

		for (var i = 0; i < ingredients.length; i++) {
			if (ingredients[i].value == ingredient) {
				ingredient = ingredients[i];
				exists = true;
			}
		}

		$('#ingredients').val('');

		if (exists) {
			var str = $('#recipeIngredients').html();
			if (str.indexOf(ingredient.value) >= 0) {
				$("#recipeIngredients:contains('" + ingredient.value + "')").effect('shake', {times: 2, distance: 5}, 200);
			} else {
				$('#ingr-add p').html(ingredient.value);
				$('#ingr-add').slideDown(500);
			}
		}
	}

	$('#add-ingr').on('click', function() {
		$('#amounts').val($('#amounts').val() + $('#ingr-amount').val() + ',');
		$('#ingr').val($('#ingr').val() + ingredient.id + ',');
		$('#recipeIngredients').append('<p>' + ingredient.value + ': ' + $('#ingr-amount').val() + '</p>');
		$('#ingr-amount').val('');

		$('#ingr-add').slideUp(500);

	});
</script>
