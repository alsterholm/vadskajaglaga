<h1>Lägg till ingrediens</h1>

<?php
	if (Input::exists()) {
		$validation = new Validate();
		$validation->check($_POST, array(
			'name' => array(
				'unique' => 'ingredients'
			)
		));

		if ($validation->passed()) {
			try {
				Ingredient::add(array(
					'name' => Input::get('name'),
					'unit' => Input::get('unit'),
					'fgcolor' => Input::get('fgcolor'),
					'bgcolor' => Input::get('bgcolor')
				));

				echo '<div style="margin-bottom:50px;margin-left:20px;">Ingrediensen <strong>' . Input::get('name') . '</strong> har lagts till i databasen!</div>';
			} catch (Exception $e) {
				echo 'Fel';
			}
		} else {
			echo '<div style="color: #FF0000;margin-bottom:20px;margin-top:20px;">Ingrediensen finns redan i databasen</div>';
		}
	}

?>

<div style="margin-top: 20px; width: 200px; float:left;">
	<form action="" method="post">
		<input type="text" name="name" id="name" style="width: 200px; padding: 3px;" placeholder="Namn på ingrediens"><br>
		<div style="margin-top: 5px"></div>
		<input type="text" name="unit" style="width: 200px; padding: 3px;" placeholder="Enhet (g, dl, ml)"><br>
		<div style="margin-top: 25px"></div>
		Textfärg:
		<input style="margin-left: 40px" type="radio" name="fgcolor" value="#000000" checked> Svart <input style="margin-left: 20px" type="radio" name="fgcolor" value="#ffffff"> Vit
		<div style="margin-top: 5px"></div>
		Bakgrundsfärg: <input style="float:right;" type="color" value="#ffffff" id="bgcolor" name="bgcolor">
		<br><br><br>
		<button type="submit" class="btn btn-primary">Lägg till</button>
	</form>
</div>

<div style="float:left; margin-left: 120px; margin-top: 20px">
	<b>Knapp-preview:</b><br><br>
	<button id="preview" class="btn btn-default" style="border: 1px solid #000"></button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="js/jquery.autocomplete.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
		$('#i-add').addClass('active');
	});
	
	$('#name').keyup(function() {
		$('#preview').html($('#name').val());
	});

	$('input[name="fgcolor"]').change(function() {
		$('#preview').css('color', $(this).val());
	});

	$('#bgcolor').change(function() {
		$('#preview').css('background-color', $(this).val());
	});
</script>