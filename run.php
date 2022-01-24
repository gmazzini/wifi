<?php
include "utility.php";
$cell=$_GET["cell"];
$sendto=$_GET["sendto"];
$randval=$_GET["randval"];
$ipaddr=$_GET["ipaddr"];
$mytime=$_GET["mytime"];

if($cell==""){echo "CELLULARE NON IDENTIFICATO, PUOI CHIUDERE LA PAGINA"; exit(); }

$mac=maclogip($ipaddr);
$authcell=celllogmac($mac);
if(strlen($authcell)>7){echo "UTENTE IDENTIFICATO, PUOI CHIUDERE LA PAGINA"; exit(); }

$actt=time();
$trem=1000-($actt-$mytime);
if($trem<0){echo "TEMPO SCADUTO IDENTIFICAZIONE NON AVVENUTA, PUOI CHIUDERE LA PAGINA"; exit(); }
echo "SECONDI RIMASTI PER IDENTIFICARSI $trem";

echo "http://44.134.207.253:8888/gmrecv.php?token=$mytoken&from=$cell";
$page=file("http://44.134.207.253:8888/gmrecv.php?token=$mytoken&from=$cell");
print_r($page);
$dd=explode("|",end($page));
if(substr($dd[0],0,6)==$randval && $sendto==trim($dd[1])){
  echo "hhhh";
  

  $mac=maclogip($ipaddr);
  $mys=mysqli_connect("localhost",$sqluser,$sqlpassword,"wifi");
  mysqli_query($mys,"INSERT INTO users (timestamp,cell,mac,valid) VALUES ($mytime,'$cell','$mac',1)");
  shell_exec("iptables -t nat -A POSTROUTING -o ens192 -j MASQUERADE -s $ipaddr");
  mysqli_query($mys,"insert into iptables (timestamp,mac,cell,ip) values ($actt,'$mac','$cell','$ipaddr')");
  mysqli_close($mys);
}

?>
