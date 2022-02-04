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
$trem=300-($actt-$mytime);
if($trem<0){echo "TEMPO SCADUTO IDENTIFICAZIONE NON AVVENUTA, PUOI CHIUDERE LA PAGINA"; exit(); }
echo "SECONDI RIMASTI PER IDENTIFICARSI $trem";

$page=file("http://44.134.207.253:8888/gmrecv.php?token=$mytoken&from=$cell");
$dd=explode("|",end($page));
echo "..".substr($dd[0],0,6)."..";
echo "..".trim($dd[1])."..";
if(substr($dd[0],0,6)==$randval && $sendto==trim($dd[1])){
  $mac=maclogip($ipaddr);
  $mys=mysqli_connect("localhost",$sqluser,$sqlpassword,"wifi");
  mysqli_query($mys,"INSERT INTO users (timestamp,cell,mac,valid) VALUES ($mytime,'$cell','$mac',1)");
  shell_exec("sudo iptables -t nat -A POSTROUTING -o ens192 -j MASQUERADE -s $ipaddr");
  shell_exec("sudo iptables -t nat -I PREROUTING 1 -p udp -i ens224 --dport 53 -j ACCEPT -s $ipaddr");
  mysqli_query($mys,"insert into iptables (timestamp,mac,cell,ip) values ($actt,'$mac','$cell','$ipaddr')");
  mysqli_close($mys);
}

?>
