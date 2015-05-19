<?php
	function escape($string){
		return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}

	function protect() {
		$user = new User();
		if (!$user->isLoggedIn()) {
			Redirect::to(401);
		}
	}

	function admin() {
		$user = new User();
		if ($user->isLoggedIn()) {
				if (!$user->isAdmin()) {
					Redirect::to(401);
				}
			} else {
				Redirect::to(401);
		}
	}
?>