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
	$('.recipe-login').fadeIn(500);
	$('.recipe-login').delay(2000).fadeOut(500);
});

$('#portions-slider').on('change', function() {
	$('#portions').html($('#portions-slider').val());

	$('.ingr-portion-amount').each(function(index) {
		$(this).html(ingrAmounts[index] * $('#portions-slider').val());
	});
});	

