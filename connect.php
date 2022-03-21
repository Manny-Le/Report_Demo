<?php

class connDB {
  private static $instance = NULL;
  public static function getInstance() {
    if (!isset(self::$instance)) {

      try {
        self::$instance = new PDO('mysql:host=localhost;dbname=cv_test', 'root', 'root');
        self::$instance -> exec("SET NAMES 'utf8'");
      } catch (PDOExeption $ex) {
        die ($ex -> getMessage());
      }
    }

    return self::$instance;
  }

  public static function closeInstance() {
    self::$instance = NULL;
  }

}

?>