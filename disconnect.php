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


$link = mysqli_connect('localhost',root,root123,radius);
mysqli_set_charset($link, "utf8");
	// initialize variables
	$update = true;

	if (isset($_REQUEST['name'])) {
		$name = $_REQUEST['name'];
$query = mysqli_query($link, "SELECT * from nas ");
       while($row = $query->fetch_array()){

$a = shell_exec("echo user-name=$name | radclient -x '" . $row['nasname'] . "':1700 disconnect '" . $row['secret'] . "'");
header("Location: index.php?cont=list_users&val=4");
}
}
}

?>