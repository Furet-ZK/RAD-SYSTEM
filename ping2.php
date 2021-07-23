<p><?php
$ip_address = '52.94.25.78'; // IP address you'd like to ping.
exec("ping -c 1 " . $ip_address . " | head -n 2 | tail -n 1 | awk '{print $7 $8}'", $ping);
$PING2 = explode("time=",$ping[0]);
echo $PING2[1];
?></p>