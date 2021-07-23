<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();
	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {
if ($_SESSION['AUTH_MANAGER'] == "admin") {
$result = mysqli_query($link, "SELECT * FROM radacct LEFT JOIN rm_users ON rm_users.username = radacct.username AND AcctStopTime IS NULL LEFT JOIN rm_allowedmanagers ON rm_allowedmanagers.srvid = rm_users.srvid  WHERE  rm_allowedmanagers.managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
$num_rows = mysqli_num_rows($result);
$count1 = "$num_rows \n";

$result = mysqli_query($link, "SELECT * FROM rm_users  where expiration > localtime() ORDER BY username ");
$num_rows = mysqli_num_rows($result);
$count2 = "$num_rows \n";

$result = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_allowedmanagers ON rm_allowedmanagers.srvid = rm_users.srvid WHERE rm_allowedmanagers.managername = '" . $_SESSION['AUTH_MANAGER'] . "' ORDER BY username ");
$num_rows = mysqli_num_rows($result);
$count3 = "$num_rows \n";

        $query = mysqli_query($link, "SELECT * FROM rm_users WHERE date(expiration) < curdate() ");
$count4 = mysqli_num_rows($query);

        $query = mysqli_query($link, "SELECT * FROM rm_users WHERE date(expiration)=curdate() ");
$Expire = mysqli_num_rows($query);
        $query = mysqli_query($link, "SELECT * FROM rm_users WHERE date(expiration) = curdate() + INTERVAL 3 DAY ");
$Expire3 = mysqli_num_rows($query);}
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./Start Session ----------------------------------------------------------------------------------------------------------------------->';
if ($_SESSION['AUTH_MANAGER'] != "admin") {
$result = mysqli_query($link, "SELECT * FROM radacct LEFT JOIN rm_users ON rm_users.username = radacct.username AND AcctStopTime IS NULL LEFT JOIN rm_allowedmanagers ON rm_allowedmanagers.srvid = rm_users.srvid  WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and rm_allowedmanagers.managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
$num_rows = mysqli_num_rows($result);
$count1 = "$num_rows \n";

$result = mysqli_query($link, "SELECT * FROM rm_users  where expiration > localtime() and owner = '" . $_SESSION['AUTH_MANAGER'] . "' ORDER BY username ");
$num_rows = mysqli_num_rows($result);
$count2 = "$num_rows \n";

$result = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_allowedmanagers ON rm_allowedmanagers.srvid = rm_users.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and rm_allowedmanagers.managername = '" . $_SESSION['AUTH_MANAGER'] . "' ORDER BY username ");
$num_rows = mysqli_num_rows($result);
$count3 = "$num_rows \n";

        $query = mysqli_query($link, "SELECT * FROM rm_users WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration)<curdate() ");
$count4 = mysqli_num_rows($query);

        $query = mysqli_query($link, "SELECT * FROM rm_users WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration)=curdate() ");
$Expire = mysqli_num_rows($query);
        $query = mysqli_query($link, "SELECT * FROM rm_users WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration) = curdate() + INTERVAL 3 DAY ");
$Expire3 = mysqli_num_rows($query);}

        $n = mysqli_query($link, "SELECT * FROM rm_managers where managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
    while ($row = $n->fetch_array()){
$ba = $row['balance'];
$te = $row['testcurrent'];}

        $n1 = mysqli_query($link, "SELECT * FROM rm_settings ");
    while ($row = $n1->fetch_array())
$cu = $row['currency'];

        $n = mysqli_query($link, "SELECT * FROM rm_managers where managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
    while ($row = $n->fetch_array()){
$ba = $row['balance'];
$te = $row['testcurrent'];}
}
?>