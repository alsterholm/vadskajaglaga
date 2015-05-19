// @author Andreas Indal

var ingrAmounts = new Array();

$('.ingr-portion-amount').each(function(index) {
	ingrAmounts.push($(this).html());
});

$('.ingr-portion-amount').each(function(index) {
	$(this).html(ingrAmounts[index] * 4);
});

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$('.slider').slider();
});

$('#favorite-btn').on('click', function() {
	var recipe = $('#recipe-id').val();
	$.post('manage-favorite.php', { recipe: recipe })
		.done(function(data) {
			if (data == 1) {
				if ($('#favorite-btn').hasClass('btn-default')) {
					$('#favorite-btn').switchClass('btn-default', 'btn-danger', 500);
				} else {
					$('#favorite-btn').switchClass('btn-danger', 'btn-default', 500);
				}
			} else {
				console.log(data);
			}
		});
});

$('#comment-text').keyup(function() {
	$('#chars').html($('#comment-text').val().length);
	if ($('#comment-text').val().length > 255 || $('#comment-text').val().length == 0) {
		$('#chars-text').addClass('text-danger');
		$('#chars-text').css('font-weight', 'bold');
		$('#addcomment').attr('disabled', '');
	} else {
		$('#chars-text').removeClass('text-danger');
		$('#chars-text').css('font-weight', 'normal');
		$('#addcomment').removeAttr('disabled');
	}
});

$('#addcomment').on('click', function() {
	var recipe_id = $('#recipe-id').val();
	var comment = $('#comment-text').val();
	var token = $('#token').val();

	$.post('comment.php', {recipe_id: recipe_id, comment: comment, token: token})
		.done(function(data) {
			if (data == 1) {
				$('#comment-success').slideDown('500', function() {
					$('#comment-text').val('');
					$('#comment-success').delay(2000).slideUp(500);
				});
			} else {
				$('#comment-failure').slideDown('500', function() {
					$('#comment-failure').delay(2000).slideUp(500);
				});
			}
		})
});

$('.not-logged-in').on('click', function() {
	if (!$('.recipe-login').is(':visible')) {
		$('.recipe-login').slideDown(500);
		$('.recipe-login').delay(2000).slideUp(500);
	}
});

$('#portions-slider').on('change', function() {
	$('#portions').html($('#portions-slider').val());

	$('.ingr-portion-amount').each(function(index) {
		$(this).html(ingrAmounts[index] * $('#portions-slider').val());
	});
});

$('.rating-star').hover(function() {
	$(this).addClass('rating-star-gold');
	$(this).prevAll().addClass('rating-star-gold');
	$(this).nextAll().addClass('rating-star-gray');
	$(this).nextAll().removeClass('rating-star-gold');
});

$('#rating-stars').mouseout(function() {
	$('.rating-star').removeClass('rating-star-gold');
	$('.rating-star').removeClass('rating-star-gray');

	var rating = Number($('#rec-rating').val());
	
	$('.rating-star').each(function(index) {
		if (index < rating) {
			$(this).addClass('rating-star-gold');
		} else {
			$(this).addClass('rating-star-gray');
		}
	})
});

$('.rate-not-logged-in').on('click', function() {
	if (!$('.rating-login').is(':visible')) {
		$('.rating-login').slideDown(500);
		$('.rating-login').delay(2000).slideUp(500);
	}
});

$('.rate-logged-in').on('click', function() {
	var recipe = $('#recipe-id').val();
	var rating = $(this).attr('id').substr(5,6);

	$.post('rate-recipe.php', {recipe: recipe, rating: rating})
		.done(function(data) {
			if (data == 1) {
				if (!$('.rating-success').is(':visible')) {
					$('.rating-success').slideDown(500);
					$('.rating-success').delay(2000).slideUp(500);
				}
			} else {
				if (!$('.rating-failure').is(':visible')) {
					$('.rating-failure').slideDown(500);
					$('.rating-failure').delay(2000).slideUp(500);
				}
			}
		});
});