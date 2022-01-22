<?php
$cell=$_POST["cell"];
if($cell[0]=="+")$cell=substr($cell,1);
else if(strlen($cell)<9)$cell="";
else if(strlen($cell)<=10)$cell="39".$cell;
$ff=file("/var/www/html/numbers.txt");
$sendto=trim($ff[rand(0,count($ff)-1)]);
$randval=mt_rand(100000,999999);
$ipaddr="";
if(getenv("HTTP_CLIENT_IP"))$ipaddr=getenv("HTTP_CLIENT_IP");
else if(getenv("HTTP_X_FORWARDED_FOR"))$ipaddr=getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("HTTP_X_FORWARDED"))$ipaddr=getenv("HTTP_X_FORWARDED");
else if(getenv("HTTP_FORWARDED_FOR"))$ipaddr=getenv("HTTP_FORWARDED_FOR");
else if(getenv("HTTP_FORWARDED"))$ipaddr=getenv("HTTP_FORWARDED");
else if(getenv("REMOTE_ADDR"))$ipaddr=getenv("REMOTE_ADDR");
else $ipaddr="UNKNOWN";
?>

<html>
<script>
var now = new Date().getTime();
var mytime = Math.floor(now/1000);

var x = setInterval(function() {
  var xhttp2 = new XMLHttpRequest();
  xhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("myreload").innerHTML = this.responseText;
    };
  };
  xhttp2.open("GET", "run.php?"+"<?php echo 'cell='.$cell.'&randval='.$randval.'&sendto='.$sendto.'&ipaddr='.$ipaddr.'&mytime=' ?>"+mytime, true);
  xhttp2.send();
}, 3000);
</script>

Dal tuo cellulare +<?php echo $cell; ?> devi mandare un SMS<br>
a questo numero +<?php echo $sendto; ?> contenente solo questo valore
<?php echo $randval; ?><br>

Il sistema partendo da ora e per 5 minuti verifica la ricezione<br>
del tuo SMS per registrare l'identità fornendo qui il responso<br>

<div style="display:inline" id="myreload"></div>

</html>
