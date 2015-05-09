$(document).ready(function() {
	$('#user-table').filterTable({
		inputSelector: '#input-filter'
	});

	$('#u-ip-bans').addClass('active');
});

$('#new-ban-btn').on('click', function() {
	$(this).slideUp(300);
	$('#new-ban').delay(300).slideDown(500);
});

$('.show-reason').on('click', function() {
	var id = $(this).attr('id').substr(7,8);
	$.post('ban-reason.php', {id: id}, function(data) {
		$('#reason-text').text(data);
	});
});

$('.remove-ban').on('click', function() {
	var id = $(this).attr('id').substr(7,8);
	var row = $(this).parent().parent();
	$.post('remove-ban.php', {id: id}, function(data) {
		if (data == 1) {
			row.hide();
			$('#remove-success').slideDown(500);
			$('#remove-success').delay(2000).slideUp(500);
		} else {
			alert('Något gick fel...');
		}
	});
});

$('#add-ban-btn').on('click', function() {
	var ip = $('#ip').val();
	var reason = $('#reason').val();

	$.post('add-ban.php', {ip: ip, reason: reason}, function(data) {
		if (data == 1) {
			$('#new-ip').html(ip);
			$('#new-ban-success').slideDown(500);
			$('#new-ban-success').delay(2000).slideDown(500);
			$('#new-ban').delay(2000).slideUp(1000);
			$('#new-ban-btn').delay(2500).slideDown(500, function() {
				$('#new-ban-success').hide();
			});
		} else {
			alert('Något gick fel...');
		}
	});
});