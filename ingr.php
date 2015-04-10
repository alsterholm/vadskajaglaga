<html lang="sv">
<head>
	<?php
		require_once 'includes/data/css-links.php';
	?>
</head>
<?php

	require_once 'core/init.php';

?>

<div style="margin-left: 20px; width: 200px; float:left;">
	<input type="text" name="name" id="name" style="width: 200px; padding: 3px;" placeholder="Namn på ingrediens"><br>
	<div style="margin-top: 5px"></div>
	<input type="text" name="unit" style="width: 200px; padding: 3px;" placeholder="Enhet (g, dl, ml)"><br>
	<div style="margin-top: 25px"></div>
	Textfärg: <input style="float:right" type="color" id="fgcolor" name="fgcolor"><br>
	<div style="margin-top: 5px"></div>
	Bakgrundsfärg: <input style="float:right;" type="color" id="bgcolor" name="bgcolor">
	<br><br><br>
	<button type="submit" class="btn btn-primary">Lägg till</button>
<br><br><br>
</div>
<div style="float:left; margin-left: 120px;">
	<b>Knapp-preview:</b><br><br>
	<button id="preview" class="btn btn-default"></button>
</div>


<?php
	require_once 'includes/data/js-links.php';
?>


<script>
	$('#name').keyup(function() {
		$('#preview').html($('#name').val());
	});

	$('#fgcolor').change(function() {
		$('#preview').css('color', $(this).val());
	});

	$('#bgcolor').change(function() {
		$('#preview').css('background-color', $(this).val());
	});
</script>