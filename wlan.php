<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

echo '<form method="post" action="">';
echo '<button class="btn bg-gradient-dark" type="submit" name="update"><h3 style="font-size: 24px;"></h3></button></form>';
	if (isset($_POST['update'])) {

$link = mysqli_connect('localhost',root,root123,radius);
mysqli_set_charset($link, "utf8");

$n = mysqli_query($link, "SELECT ip from rm_ap ");
while ($row = $n->fetch_array()){
$ip = $row['ip'];
$mask_mac=false;        //Use to mask MAC adress (true / false );

$tx_bytes_snmp = snmpwalkoid("$ip", "public", ".1.3.6.1.4.1.41112.1.4.7.1.1.1");  
if (is_array($tx_bytes_snmp))

		foreach ($tx_bytes_snmp as $rssi)
		{

			$mac_oiu = substr(str_replace("Hex-STRING:"," ",$rssi),2,17);
			$mac= str_replace(" ",":",$mac_oiu);

$tx_bytes_snmp = snmpwalkoid("$ip", "public", ".1.3.6.1.4.1.41112.1.4.7.1.3.1");  
if (is_array($tx_bytes_snmp))

		foreach ($tx_bytes_snmp as $rssi)
		{

			$signal= substr(str_replace("INTEGER:"," ",$rssi),2,8);

$tx_bytes_snmp = snmpwalkoid("$ip", "public", ".1.3.6.1.4.1.41112.1.4.7.1.6.1");  
if (is_array($tx_bytes_snmp))

		foreach ($tx_bytes_snmp as $rssi)
		{

			$ccq= substr(str_replace("INTEGER:"," ",$rssi),2,8);
$res = mysqli_query($link, "INSERT INTO `rm_wlan` (`maccpe`, `signal`, `ccq`, `apip`) VALUES ('$mac', '$signal', '$ccq', '$ip') ");
}}}}}
?>
