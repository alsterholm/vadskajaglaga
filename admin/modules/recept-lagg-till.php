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
					<input type="text" id="ingr-id">
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
	<div class="col-md-4">
		<div id="recipeIngredients">

		</div>
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

	$('#add-recipe').on('click', function() {
		var rname = $('#rname').val();
		var rtime = $('#rtime').val();
		var rdesc = $('#rdesc').val();
		var rinst = $('#rinst').val();

		$.post('add_recipe.php', { name: rname, time: rtime, description: rdesc, instructions: rinst })
			.done(function(data) {
				if (data == 0) {
					alert("fail")
				} else {
					$('.add-recipe').fadeOut(500);
					$('.add-ingredients').delay(500).fadeIn(500);

					$('#rec-id').val(data);
				}
			})
	});

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
				alert("Finns redan");
			} else {
				$('#ingr-add p').html(ingredient.value);
				$('#ingr-id').val(ingredient.id);
				$('#ingr-add').slideDown(500);
			}
		}
	}

	$('#add-ingr').on('click', function() {
		var irecipe = $('#rec-id').val();
		var iingredient = $('#ingr-id').val();
		var iamount = $('#ingr-amount').val();
		var iunit = $('#ingr-unit').val();

		$.post('add_ingr.php', { recipe: irecipe, ingredient: iingredient, amount: iamount, unit: iunit })
			.done(function(data) {
				if (data == 1) {
					alert("Success");
				} else {
					alert("Fel");
				}
			});

		$('#ingr-amount').val('');
		$('#ingr-add').slideUp(500);

	});
</script>
