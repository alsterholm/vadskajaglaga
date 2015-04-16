<h1>Lägg till recept</h1>
<br>
<div class="row">
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<input type="text" name="name" class="form-control" placeholder="Receptets namn">
				<br>
				<textarea placeholder="Beskrivning" class="form-control"></textarea>
				<br>
				<textarea placeholder="Instruktioner" class="form-control" rows="14"></textarea>
				<br>
				<input type="text" id="ingr" name="ingr">
				<input type="text" id="amounts" name="amounts">
				<button class="btn btn-primary" type="submit">Lägg till</button>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<input type="text" name="ingredients" id="ingredients" class="form-control" placeholder="Ingredienser">
		<div id="ingr-add">
			<div class="row">
				<div class="col-md-6">
					<p>Potatis</p>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<input type="text" class="form-control" id="ingr-amount" placeholder="Mängd">
						<span class="input-group-btn">
							<button class="btn btn-primary" id="add-ingr" type="button">Lägg till</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div id="chosen-ingredients">

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

	var ingredients = [
		<?php
			foreach(Ingredient::all() as $ingredient) {
				echo '{ id: "' . $ingredient->id . '", value: "' . $ingredient->name . '", bgcolor: "' . $ingredient->bgcolor . '", fgcolor: "' . $ingredient->fgcolor . '" },';
			}
		?>
	]

	var registerClicked = false;

	$('#ingredients').autocomplete ({
	    lookup: ingredients,
	    onSelect: function (suggestion) {
	    	addIngr();
	    }
	});

	function addIngr() {
		var ingredient = $('#ingredients').val();
		var exists = false;

		for (var i = 0; i < ingredients.length; i++) {
			if (ingredients[i].value == ingredient) {
				exists = true;
				ingredient = ingredients[i];
				break;
			}
		}

		if (exists == true) {
			var str = $('#chosen-ingredients').html();
			if (str.indexOf(ingredient.value) < 0) {
				$('#ingr-add').slideDown(500);
				$('#ingredients').slideUp(500);
				$('#ingr-add p').html(ingredient.value);

				$('#add-ingr').on('click', function() {
					$('#ingr').val($('#ingr').val() + ingredient.id + ',');
					$('#amounts').val($('#amounts').val() + $('#ingr-amount').val() + ',');
				
					//Lägg till ingrediens i lista

					$('#ingr-add').slideUp(500);
					$('#ingredients').slideDown(500);
					$('#ingr-amount').val('');
				});

			} else {
				$("#chosen-ingredients:contains('" + ingredient.value + "')").effect('shake', {times: 2, distance: 5}, 200);
			}
		}

		$('#ingredients').val("");
		$('#ingredients').focus();
	}
</script>