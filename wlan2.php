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

$res = mysqli_query($link, "DELETE FROM `rm_wlan` WHERE 1");

$n = mysqli_query($link, "SELECT ip from rm_ap ");
while ($row = $n->fetch_array()){
$ip = $row['ip'];
$mask_mac=false;        //Use to mask MAC adress (true / false );


$tx_bytes_snmp = snmpwalkoid("$ip", "public", ".1.3.6.1.4.1.14988.1.1.1.2.1.3");  
if (is_array($tx_bytes_snmp))

		foreach ($tx_bytes_snmp as $indexOID => $rssi)
		{
			$oidarray=explode(".",$indexOID);
			$end_num=count($oidarray);
			$mac="";
			
			for ($counter=2;$counter<8;$counter++)
			{
				$temp=sprintf('%02x', $oidarray[$end_num-$counter]);
						
				if (($counter <5) && $mask_mac)
					$mac=":xx$mac";
				else if ($counter==7)
				    	$mac="$temp$mac";
				else 
			    		$mac=":$temp$mac";
			}
			
			
			$mac_oiu = substr(str_replace(":","-",$mac),0,8);
			$mac=strtoupper($mac);
			
			$signal_oiu = substr(str_replace("INTEGER:"," ",$rssi),0,8);
			$signal=strtoupper($signal_oiu);

$res = mysqli_query($link, "INSERT INTO `rm_wlan` (`maccpe`, `signal`, `apip`) VALUES ('$mac', '$signal', '$ip') ");
}}}
?>
