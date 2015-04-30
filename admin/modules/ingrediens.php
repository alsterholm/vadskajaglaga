<?php

	if (Input::exists()) {
		$validate = new Validate();

		$validation = $validate->check($_POST, array(
			'name' => array(
				'unique' => 'ingredients'
			)
		));
		// MÅSTE VARA: if validation NOT passed... annars uppdateras inget med samma namn!! Validering känns kanske overkill!!
		if (!$validation->passed()) {
			try {
				$db = DB::getInstance();
				$db->update('ingredients', Input::get('id'), array(
					'name' => Input::get('name'),
					'bgcolor' => Input::get('bgcolor'),
					'fgcolor' => Input::get('fgcolor')
				));
				echo '<div style="color: #408A33;margin-bottom:20px;margin-top:20px;">Ingrediensen ändrad!</div>';
			} catch (Exception $e) {
				echo 'Databasfel';
			}
		} else {
			echo '<div style="color: #A62323;margin-bottom:20px;margin-top:20px;">Namnet finns redan i databasen</div>';
		}
	}

	if (Input::exists('get')) {
		$id = Input::get('id');
		$ingredient = Ingredient::data($id);
	}
?>

<h1><?php echo $ingredient->name; ?></h1>
<br>
<div class="row">
	<div class="col-md-4">
		<form action="" method="post" class="form-horizontal">
			<input type="text" name="name" id="name" class="form-control" value="<?php echo $ingredient->name; ?>" placeholder="Namn på ingrediens"><br>
			<hr>
			<br>
			<div class="row">
				<div class="col-md-6">
					<label>Textfärg:</label>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<label for="black"><input id="black" type="radio" name="fgcolor" value="#000000" <?php if ($ingredient->fgcolor == '#000000') { echo 'checked'; } ?>> Svart</label>
						</div>
						<div class="col-md-6">
							<label for="white"><input id="white" type="radio" name="fgcolor" value="#ffffff" <?php if ($ingredient->fgcolor == '#ffffff') { echo 'checked'; } ?>> Vit</label>
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
					<input class="form-control" type="color" value="<?php echo $ingredient->bgcolor; ?>" id="bgcolor" name="bgcolor">
				</div>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Spara ändringar</button>
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

		$('#preview').html($('#name').val());
		$('#preview').css('color', $('input[name="fgcolor"]:checked').val());
		$('#preview').css('background-color', $('#bgcolor').val());
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
