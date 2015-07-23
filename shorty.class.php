<?php

class shorty{

  private $oDb;

  protected function get_db(){
    if(!is_object($this->oDb)){
      $this->start_database();
    }
    return $this->oDb;
  }

  protected  function start_database(){
    $oDb = new mysqli();

    if ($oDb->connect_error) {
      die('Connect Error ('.$oDb->connect_errno.')'. $oDb->connect_error);
    }

    $this->oDb = $oDb;  
  }
}

?>