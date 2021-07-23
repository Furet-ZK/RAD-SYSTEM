<p><?php
$ip_address = '8.8.8.8'; // IP address you'd like to ping.
exec("ping -c 1 " . $ip_address . " | head -n 2 | tail -n 1 | awk '{print $7 $8}'", $ping);
$PING = explode("time=",$ping[0]);
echo $PING[1];
?></p>