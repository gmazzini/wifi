<?php
include "utility.php";
$cell=$_GET["cell"];
$sendto=$_GET["sendto"];
$randval=$_GET["randval"];
$ipaddr=$_GET["ipaddr"];
$mytime=$_GET["mytime"];

$trem=300-(time()-$mytime);
if($cell==""){echo "CELLULARE NON IDENTIFICATO"; exit(); }
if(file_exists("/wifi/$ipaddr")){echo "UTENTE IDENTIFICATO"; exit(); }
if($trem<0){echo "TEMPO SCADUTO IDENTIFICAZIONE NON AVVENUTA"; exit(); }
echo "SECONDI RIMASTI PER IDENTIFICARSI $trem";

$page=file("http://44.134.207.253:8888/gmrecv.php?token=$mytoken&from=$cell");
$dd=explode("|",end($page));
if(substr($dd[0],0,6)==$randval && $sendto==trim($dd[1])){
  $mac=maclogip($ipaddr);
  $mys=mysqli_connect("localhost",$sqluser,$sqlpassword,"wifi");
  mysqli_query($mys,"INSERT INTO users (timestamp,cell,mac,valid) VALUES ($mytime,'$cell','$mac',1)");
  mysqli_close($mys);
  touch("/wifi/$ipaddr");
}

?>
