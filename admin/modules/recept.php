<h1>Ändra recept</h1>
<br>
<?php
	if (Input::exists()) {
		$id = Input::get('id');
		$recipe = new Recipe($id);

		try {
			$recipe->update(array(
				'name' => Input::get('name'),
				'description' => Input::get('description'),
				'instructions' => Input::get('instructions'),
				'time' => Input::get('time')
			));
		} catch (Exception $e) {
			echo '<script>alert("Något gick fel...");</script>';
		}
	}

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
										<td class="center"><input type="text" id="amount' . $ingredient->id . '" name="amount" value="' . $ingredient->amount . '"></td>
										<td class="center"><input type="text" id="unit' . $ingredient->id . '" name="unit" value="' . $ingredient->unit . '"></td>
										<td class="center"><a id="' . $ingredient->id . '" class="btn btn-primary btn-xs update-ingr">Uppdatera</a></td>
										<td class="center"><a id="' . $ingredient->id . '" class="btn btn-danger btn-xs rem-ingr"><span class="glyphicon glyphicon-remove"></span></a></td>
									</tr>
								</form>
							';
						}
					?>
				</tbody>
			</table>
			<br>
			<label for="ingredients">Lägg till ny ingrediens</label>
			<input type="text" name="ingredients" id="ingredients" class="form-control" placeholder="Ingrediens">
			<div id="ingr-add">
				<input type="hidden" id="rec-id" name="rec-id" value="<?php echo $recipe->data()->id ?>">
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
			var str = $('#recipeIngredients').html();         //FIXA
			if (str.indexOf(ingredient.value) >= 0) {
				$('#recipeIngredients').parent().effect('shake', {times: 2, distance: 5}, 200);
			} else {
				$('#ingr-add p').html(ingredient.value);
				$('#ingr-id').val(ingredient.id);
				$('#ingr-add').slideDown(500);
			}
		}
	}

	$('.rem-ingr').on('click', function() {
		var entry_id = $(this).attr('id');
		var row = $(this).parent().parent();
		$.post('remove_ingr.php', { id: entry_id })
			.done(function(success) {
				if (success == 1) {
					row.remove();
				}
			});
	});

	$('.update-ingr').on('click', function() {
		var id = $(this).attr('id');
		var unit = $('#unit' + id).val();
		var amount = $('#amount' + id).val();
		var button = $(this);

		$.post('update-ingredient.php', { id: id, unit: unit, amount: amount }, function(data) {
			if (data == 1) {
				button.switchClass('btn-primary', 'btn-success', 500);
				button.delay(2000).switchClass('btn-success', 'btn-primary', 500);
			} else {
				alert("Något gick fel...");
			}
		});
	});

	$('#add-ingr').on('click', function() {
		var irecipe = $('#rec-id').val();
		var iingredient = $('#ingr-id').val();
		var iamount = $('#ingr-amount').val();
		var iunit = $('#ingr-unit').val();

		$.post('add_ingr.php', { recipe: irecipe, ingredient: iingredient, amount: iamount, unit: iunit })
			.done(function(data) {
				if (data == 1) {
					$.post('recipe_ingredients.php', { recipe_id: irecipe })
						.done(function(jsonData) {
							$('#recipeIngredients').html('');
							$.each(jsonData, function(key, value) {
								var ingrName = '';
								$.each(ingredients, function(i, j) {
									if (value['ingredient'] == j.id) {
										ingrName = j.value;
										return;
									}
								});
								$('#recipeIngredients').append('<tr><td>' + ingrName + '</td><td class="center"><input type="text" id="amount' + value['id'] + '" value"' + value['amount'] + '"></td><td class="center"><input type="text" id="unit' + value['id'] + '" value="' + value['unit'] + '"></td><td class="center"><button type="submit" id="' + value['id'] + '" class="btn btn-primary btn-xs update-ingr">Uppdatera</button></td><td class="center"><button class="btn btn-danger btn-xs rem-ingr" id="' + value['id'] + '"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');

								$('.rem-ingr').on('click', function() {
									var entry_id = $(this).attr('id');
									var row = $(this).parent().parent();
									$.post('remove_ingr.php', { id: entry_id })
										.done(function(success) {
											if (success == 1) {
												row.remove();
											}
										});
								});
							});
						});
				} else {
					alert("Fel");
				}
			});

		$('#ingr-amount').val('');
		$('#ingr-unit').val('');
		$('#ingr-add').slideUp(500);
	});
</script>
