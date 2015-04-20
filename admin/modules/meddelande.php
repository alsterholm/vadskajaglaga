<?php

if (Input::exists('get')) {
	$id = Input::get('id');

	$message = new Message($id);
?>

	<h1>Meddelande</h1>
	<br>
	<div class="row">
		<div class="col-md-4">
			<label>Från: </label> <?php echo $message->data()->fullname . ' (' . $message->data()->email . ')'?><br>
			<label>Mottaget:</label> <?php echo $message->data()->time ?><br><br>
			<?php echo nl2br($message->data()->message) ?>
			<br><br><hr><br>
			<label for="status">Status:</label>
			<select class="form-control" id="status">
				<option value="0">Nytt</option>
				<option value="1">Påbörjat</option>
				<option value="2">Avslutat</option>
				<option value="3">Flaggad</option>
			</select>
		</div>
	</div>

<?php
}
?>
