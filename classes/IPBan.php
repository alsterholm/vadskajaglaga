<?php

class IPBan {
	public static function add($ip, $reason) {
		$db = DB::getInstance();
		$user = new User();

		if ($db->insert('ip_bans', array(
			'ip' => $ip,
			'time' => date('Y-m-d H:i:s', time()),
			'admin' => $user->data()->id,
			'reason' => $reason,
			'active' => 1
		))) {
			return true;
		} else {
			Redirect::to(500);
		}
	}

	public static function remove($id) {
		$db = DB::getInstance();

		if ($db->update('ip_bans', $id, array('active' => 0))) {
			return true;
		} else {
			Redirect::to(500);
		}
	}

	public static function check($ip) {
		$db = DB::getInstance();
		$db->query('SELECT * FROM ip_bans WHERE ip = ? AND active = ?', array($ip, 1));
	
		if ($db->count()) {
			return true;
		}
		return false;
	}

	public static function all() {
		$db = DB::getInstance();
		$db->query('SELECT * FROM ip_bans WHERE active = ? ORDER BY time DESC', array(1));
		return $db->results();
	}
}