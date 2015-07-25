<?php
require_once('shorty.class.php');

class linklistener extends shorty{
  function __construct(){
    if(isset($_GET['url']) && $_GET['url'] != ""){
      $oDb        = $this->start_database();
      $sLink      = $_GET['url'];
      $bLoopAgain = false;
      $sURICode   = "";

      do{
        $sURICode = "";
        $iLength   = strlen($sLink);

        for($i=1;$i<=5;$i++){
          $sChunk    = substr($sLink, (floor($iLength/$i)),1);
          if($sChunk != ''){
            print substr($sLink, (floor($iLength/$i)),1).'<br />';
            $sURICode .= $sChunk;
          } else {
            $i--;
          }
        }

        $sURICode = '_'.$sURICode.(ceil(time()/100000));
        print $sURICode;

        print strlen($sURICode);
        break;

        if(strlen($sURICode) < 5){
          $iLoopAgain = 1;
          continue;
        }

        $oStatement = $oDb->prepare("SELECT COUNT(url_short_name) as count FROM shorty_urls WHERE url_short_name = ?");
        $oStatement->execute(array($sURICode));
        $aCount     = $oStatement->fetchAll();

        print '----';
        //print_r();
        print '----';
        if($aCount[0]['count'] >= 1){
          $iLoopAgain = 1;
          continue;
        }
        
        

      }while($iLoopAgain < 1);

      
      unset($oStatement);

      $oStatement = $oDb->prepare("INSERT INTO shorty_urls (url_uri,url_short_name) VALUES(?,?)");
      print_r($oStatement->errorInfo());
      //$oStatement->bindParam('?',$sLink);.
      $oStatement->execute(array($sLink,$sURICode));
      print_r($oStatement->errorInfo());
        //print $sLink;
      print '{"message":"it worked!"}';
    }
    
  }
}

$oEar = new linklistener();

?>