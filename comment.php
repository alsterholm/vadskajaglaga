<?php
// @author Andreas Indal

require_once 'core/init.php';
$user = new User();
protect();

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		$comment = Input::get('comment');
		$commentLength = strlen($comment);

		if ($commentLength < 256 && $commentLength > 0) {
			if (Comment::post(array(
				'recipe_id' => Input::get('recipe_id'),
				'comment' => $comment,
				'user_id' => $user->data()->id,
				'date' => date('Y-m-d', time()),
				'ip' => $_SERVER['REMOTE_ADDR']
			))) {
				echo 1;
				exit();
			}
		}
	}
}
echo 0;