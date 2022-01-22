<?php
include "utility.php";
$ipaddr=ipbrowser();
$ii=explode(".",$ipaddr);
$mac=maclogip($ipaddr);
if($mac!="ff:ff:ff:ff:ff:ff"){
  $mys=mysqli_connect("localhost",$sqluser,$sqlpassword,"wifi");
  $result=mysqli_query($mys,"SELECT cell FROM users WHERE valid=1 and mac='$mac'");
  $row=mysqli_fetch_row($result);
  $cell=$row[0];
  mysqli_free_result($result);
  mysqli_close($mys);
}
?>

<html>
Sistema di identificazione una tantum<br>
Sperimentazione di LepidaScpA in accordo con il MISE<br>
<?php
  if($ii[0]!=10 && $ii[0]!=44){
    echo "Accesso non consentito da $ipaddr";
    exit(); 
  }
  if(strlen($cell)>7){
    echo "Bentornato, sei registrato con numero $cell buona navigazione";
    exit();
  }
?>
Inserisci qui il tuo numero di cellulare<br>
(se non italiano in formato internazionale completo +xxxyyyyy)<br>
<form method="POST" action="identify.php">
<pre><input name="cell" type="input"><input type="submit"></pre>
Nota che il cellulare ti identifica e deve necessariamente<br>
essere tuo personale<br>
Se prosegui stai anche prendendo atto della informativa sul servizio<br>
e sulla privacy qui riportata xxxx e la stai accettando
</html>
