<?php

include "utility.php";
$ii=explode(".",$ipaddr);
?>

<html>
<?php if($ii[0]!=10 && $ii[0]!=44){echo "Accesso non consentito da $ipaddr"; exit(); } ?>
Sistema di identificazione una tantum<br>
Sperimentazione di LepidaScpA in accordo con il MISE<br>
Inserisci qui il tuo numero di cellulare<br>
(se non italiano in formato internazionale completo +xxxyyyyy)<br>
<form method="POST" action="ff2.php">
<pre><input name="cell" type="input"><input type="submit"></pre>
Nota che il cellulare ti identifica e deve necessariamente<br>
essere tuo personale<br>
Se prosegui stai anche prendendo atto della informativa sul servizio<br>
e sulla privacy qui riportata xxxx e la stai accettando
</html>
