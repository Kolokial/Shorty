<?php

class shorty{

  private $oDb;

  protected function start_database(){
    if(!is_object($this->oDb)){
      $this->oDb = $this->__start_database();
    }
    return $this->oDb;
  }

  protected  function __start_database(){
    $dsn = 'mysql:dbname=shorty;host=127.0.0.1';
    $username = 'root';
    $password = '';
    try {
      $oDb = new PDO($dsn,$username,$password);
    } catch (PDOException $e) {
      die('Connect Error ('.$e->getMessage().')');
    }
    return $oDb;
  }

  protected function insert(){
    //$oDb = $this
    $sSQL = "";
  }


}

?>