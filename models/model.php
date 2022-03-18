<?php
class DB {
  // (A) CONNECT TO DATABASE
  public $error = "";
  private $pdo = null;
  private $stmt = null;
  function __construct () {
    try {
      $this->pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
        DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // (B) CLOSE CONNECTION
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  // Lance une selection
  function select ($sql, $cond=null) {
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
      return $result;
    } catch (Exception $ex) { 
      $this->error = $ex->getMessage(); 
      return false;
    }
  }
  function create ($sql, $cond=null) {
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      foreach ($cond as $key => $value) {
          $this->stmt->bindValue($key, $value[0], $value[1]);
      }
      $result = $this->stmt->execute();

      return $result;
    } catch (Exception $ex) { 
      $this->error = $ex->getMessage(); 
      return false;
    }
  }

  function delete ($sql, $cond=null) {
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      foreach ($cond as $key => $value) {
          $this->stmt->bindValue($key, $value, PDO::PARAM_INT);
      }
      $result = $this->stmt->execute();

      return $result;
    } catch (Exception $ex) { 
      $this->error = $ex->getMessage(); 
      return false;
    }
  }

  function update ($sql, $cond=null) {
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      foreach ($cond as $key => $value) {
          $this->stmt->bindValue($key, $value[0], $value[1]);
      }
      $result = $this->stmt->execute();

      return $result;
    } catch (Exception $ex) { 
      $this->error = $ex->getMessage(); 
      return false;
    }
  }

}

// (D) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "db_projet");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
?>