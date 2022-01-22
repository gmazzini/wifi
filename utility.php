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
  return $xx[10];
}

?>
