<?php
include "private.php";

function ipbrowser(){
  if(getenv("HTTP_CLIENT_IP"))$ipaddr=getenv("HTTP_CLIENT_IP");
  else if(getenv("HTTP_X_FORWARDED_FOR"))$ipaddr=getenv("HTTP_X_FORWARDED_FOR");
  else if(getenv("HTTP_X_FORWARDED"))$ipaddr=getenv("HTTP_X_FORWARDED");
  else if(getenv("HTTP_FORWARDED_FOR"))$ipaddr=getenv("HTTP_FORWARDED_FOR");
  else if(getenv("HTTP_FORWARDED"))$ipaddr=getenv("HTTP_FORWARDED");
  else if(getenv("REMOTE_ADDR"))$ipaddr=getenv("REMOTE_ADDR");
  else $ipaddr="0.0.0.0";
  return $ipaddr;
}

function maclogip($ip){
  $vv=shell_exec("tail -n 1000 /var/log/dhcpd/dhcpd.log | grep DHCPACK | grep $ip | tail -n 1");
  $xx=explode(" ",$vv);
  if(time()-$xx[0]>7200)return time()-$xx[0];
  else return $xx[9];
}

function celllogmac($mac){
  global $sqluser,$sqlpassword;
  if($mac=="ff:ff:ff:ff:ff:ff")return "";
  $mys=mysqli_connect("localhost",$sqluser,$sqlpassword,"wifi");
  $result=mysqli_query($mys,"SELECT cell FROM users WHERE valid=1 and mac='$mac'");
  $row=mysqli_fetch_row($result);
  $cell=$row[0];
  mysqli_free_result($result);
  mysqli_close($mys);
  return $cell;
}

?>
