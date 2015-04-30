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
<br>
<div class="row">
	<div class="col-md-4">
		<form action="" method="post" class="form-horizontal">
			<input type="text" name="name" id="name" class="form-control" placeholder="Namn på ingrediens"><br>
			<hr>
			<br>
			<div class="row">
				<div class="col-md-6">
					<label>Textfärg:</label>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<label for="black"><input id="black" type="radio" name="fgcolor" value="#000000" checked> Svart</label>
						</div>
						<div class="col-md-6">
							<label for="white"><input id="white" type="radio" name="fgcolor" value="#ffffff"> Vit</label>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<label for="bgcolor">Bakgrundsfärg:</label>
				</div>
				<div class="col-md-6">
					<input class="form-control" type="color" value="#ffffff" id="bgcolor" name="bgcolor">
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Lägg till</button>
		</form>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-4">
		<b>Knapp-preview:</b><br><br>
		<button id="preview" class="btn btn-default btn-ingr" style="border: 1px solid #000"></button>
	</div>
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
