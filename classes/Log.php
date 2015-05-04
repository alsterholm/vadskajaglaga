<?php
  /**
  Klassen hanterar ip-loggningen i databasen.
  */

  class Log {

    public static function getAll() {
      $db = DB::getInstance();
      $db->getAll('ip_log');

      return $db->results();
    }

  }

?>
