<?php
include "utility.php";
$ipaddr=ipbrowser();
$ii=explode(".",$ipaddr);
$mac=maclogip($ipaddr);
$cell=celllogmac($mac);
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
e sulla privacy qui riportata xxxx e la stai accettando<br>
<img src="logo.png" alt="logo" width="200" height="auto">  
</html>
