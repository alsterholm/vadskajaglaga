$(document).ready(function() {
	$('#ingredients').focus();
});

var registerClicked = false;

$('#ingredients').autocomplete ({
    lookup: ingredients,
    onSelect: function (suggestion) {
    	addIngr();
    }
}).setOptions({
	triggerSelectOnValidInput: false
});

$('#add-ingredient').on('click', function() {
	addIngr();
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
			$('#ingr_ids').val($('#ingr_ids').val() + ingredient.id + ",");
			$('#chosen-ingredients').append('<button href="#" class="btn btn-default btn-ingr" id="' + ingredient.id + '" style="color: ' + ingredient.fgcolor + '; background-color: ' + ingredient.bgcolor + ';margin-right:5px; margin-bottom: 10px">' + ingredient.value + '</button>');

			$('#' + ingredient.id).on('click', function() {
				$(this).remove();
				var oldVal = $('#ingr_ids').val();
				var newVal = oldVal.replace(ingredient.id + ',', '');
				$('#ingr_ids').val(newVal);
			});
		} else {
			$("#chosen-ingredients:contains('" + ingredient.value + "')").effect('shake', {times: 2, distance: 5}, 200);
		}
	}

	if ($('.choices').css('display') == 'none') {
		$('.choices').slideToggle(500);
	}

	$('#ingredients').val("");
	$('#ingredients').focus();
}