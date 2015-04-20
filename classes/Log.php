<?php
  class Log {

    public static function getAll() {
      $db = DB::getInstance();
      $db->getAll('ip_log');

      return $db->results();
    }

  }

?>
