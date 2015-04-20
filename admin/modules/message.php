<?php

if (Input::exists('get')) {
	$id = Input::get('id');

	$message = Message::get($id);
}

?>