<?php

if (Input::exists('get')) {
	$id = Input::get('id');

	$message = new Message($id);
?>

	<h1>Meddelande</h1>
	<br>
	<div class="row">
		<div class="col-md-4 col-sm-6">
			<label>Från: </label> <?php echo $message->data()->fullname . ' (' . $message->data()->email . ')'?><br>
			<label>Mottaget:</label> <?php echo $message->data()->time ?><br><br>
			<?php echo nl2br($message->data()->message) ?>
			<br><br><hr><br>
			<label for="status">Status:</label>
			<div class="row">
				<div class="col-sm-8">
					<select class="form-control" id="status">
						<option value="0"><?php echo ($message->data()->status == 0) ? '&raquo; ' : ''; ?>Nytt</option>
						<option value="1"><?php echo ($message->data()->status == 1) ? '&raquo; ' : ''; ?>Påbörjat</option>
						<option value="2"><?php echo ($message->data()->status == 2) ? '&raquo; ' : ''; ?>Avslutat</option>
						<option value="3"><?php echo ($message->data()->status == 3) ? '&raquo; ' : ''; ?>Flaggad</option>
					</select>
				</div>
				<div class="col-sm-4 right">
					<button type="button" class="btn btn-primary">Uppdatera</button>
				</div>
			</div>
			<br><br><hr><br>
			<label for="response">Svara:</label>
			<textarea id="response" class="form-control" rows="8"></textarea><br>
			<button type="button" class="btn btn-primary">Skicka svar</button>
		</div>
	</div>

<?php
}
?>
