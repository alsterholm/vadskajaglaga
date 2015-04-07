			$(document).ready(function() {
				$('#ingredients').focus();
			});

			var registerClicked = false;
			var ingredients = [
			   { value: "Potatis" },
			   { value: "Rödlök" },
			   { value: "Gul paprika" },
			   { value: "Röd paprika" },
			   { value: "Kyckling" },
			   { value: "Nötfärs" },
			   { value: "Falukorv" }
			];

			$('#ingredients').autocomplete ({
			    lookup: ingredients,
			    onSelect: function (suggestion) {
			    	addIngr();
			    }
			});
			
			/*
			$('#ingredients').keyup(function (e) {
				if (e.keyCode == 13) {
					addIngr();
				}
			});
			*/

			$('#register').on('click', function() {
				registerClicked = true;
				$('#login-modal').modal('hide');
			});

			$('#login-modal').on('hidden.bs.modal', function() {
				if (registerClicked) {
					$('#register-modal').modal('show');
					registerClicked = false;
				}
			})

			$('#add-ingredient').on('click', function() {
				addIngr();
			});


			function addIngr () {
				var ingredient = $('#ingredients').val();
				var exists = false;

				for (var i = 0; i < ingredients.length; i++) {
					if (ingredients[i].value == ingredient) {
						exists = true;
						break;
					} 
				}

				if (exists == true) {
					var str = $('#chosen-ingredients').html();
					if (str.indexOf(ingredient) < 0) {
						$('#chosen-ingredients').append(document.createTextNode(ingredient + " "));
					} else {
						$("#chosen-ingredients:contains('" + ingredient + "')").effect('shake', {times: 2, distance: 5}, 200);
					}
				}

				if ($('.choices').css('display') == 'none') {
					$('.choices').slideToggle(500);
				}

				$('#ingredients').val("");
				$('#ingredients').focus();
			}