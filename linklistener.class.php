<?php
require_once('shorty.class.php');

class linklistener extends shorty{
  function __construct(){
    if(isset($_GET['url']) && $_GET['url'] != ""){
      $this->get_db();
      print '{"message":"it worked!"}';  
    }
    
  }
}

$oEar = new linklistener();

?>