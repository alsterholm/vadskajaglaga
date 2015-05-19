// @author Andreas Indal

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
							$('.ingr-list').fadeIn(500);
							$('#recipeIngredients').append('<tr><td>' + ingrName + '</td><td class="center">' + value['amount'] + '</td><td class="center">' + value['unit'] + '</td><td class="center"><button class="btn btn-danger btn-xs rem-ingr" id="' + value['id'] + '"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');

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