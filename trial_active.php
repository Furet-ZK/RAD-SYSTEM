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

	// initialize variables
	$update = true;

if ($_REQUEST['name'] == '') {
	$_REQUEST['name'] = '';
}

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<td><center><h3><form method="post" action="" >';
$query1 = mysqli_query($link, "SELECT * FROM rm_managers WHERE managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row = mysqli_fetch_array($query1)){
            echo '<center><h3><a class="btn bg-gradient-dark btn-lg btn-block" ><h3 style="font-size: 24px;">{AAAA77} ' . $row['testcurrent'] . '</h3></a></h3></center><br>';}
echo '<div class="md-form mt-0">
		<center><label><center>{AAAA42}</center></label></center>
		<select style="text-align:center;" class="form-control" name="name">
		<option value="' . $_REQUEST['name'] . '" hidden>' . $_REQUEST['name'] . '</option>
		</select>
	</div>
<div class="md-form mt-0">
		<?php if ($update == true): ?>
		<br><center><button class="btn bg-gradient-dark" type="submit" name="update" style="background: black;" ><h3 style="font-size: 24px;">{AAAA64}</h3></button></center>
		<?php endif ?>
	</div>';
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
 $query = mysqli_query($link, "SELECT * FROM rm_users WHERE username = '$name' ");
       while($row1 = mysqli_fetch_array($query)){
$srvid = $row1['srvid'];
if (strtotime($row1['expiration']) > strtotime("now")) {
for($i=1;$i < 255;$i++){
       $query = mysqli_query($link, "SELECT * FROM ip where srvid = '$srvid' ");
       while($row = mysqli_fetch_array($query)) {
$ip = $row['staticip'].$i;
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '$ip' WHERE username= '$name' ");}}
 $query = mysqli_query($link, "SELECT * FROM rm_managers WHERE managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row = mysqli_fetch_array($query)){
			if (( 0 > $row['testcurrent'] || 0 < $row['testcurrent'] )) {
		$res = mysqli_query($link, "UPDATE `rm_managers` set `testcurrent` = (testcurrent -1) WHERE `managername` = '" . $_SESSION['AUTH_MANAGER'] . "' ");
		$res = mysqli_query($link, "UPDATE `rm_users` set `expiration` = date_add(expiration , interval 24*60*60 - 1 second) WHERE `username` = '$name' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`, `price`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تفعيل اليوزر تجريبي ($name) ' ,localtime(), '1 test')");}}}
else {
for($i=1;$i < 255;$i++){
       $query = mysqli_query($link, "SELECT * FROM ip where srvid = '$srvid' ");
       while($row = mysqli_fetch_array($query)) {
$ip = $row['staticip'].$i;
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '$ip' WHERE username= '$name' ");}}
 $query = mysqli_query($link, "SELECT * FROM rm_managers WHERE managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row = mysqli_fetch_array($query)){
			if (( 0 > $row['testcurrent'] || 0 < $row['testcurrent'] )) {
		$res = mysqli_query($link, "UPDATE `rm_managers` set `testcurrent` = (testcurrent -1) WHERE `managername` = '" . $_SESSION['AUTH_MANAGER'] . "' ");
		$res = mysqli_query($link, "UPDATE `rm_users` set `expiration` = date_add(localtime(), interval 24*60*60 - 1 second) WHERE `username` = '$name' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`, `price`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تفعيل اليوزر تجريبي ($name) ' ,localtime(), '1 test')");}}}
 $query1 = mysqli_query($link, "SELECT * FROM nas ");
       while($row1 = mysqli_fetch_array($query1)) {
		shell_exec("echo user-name=$name | radclient -x '" . $row1['nasname'] . "':1700 disconnect '" . $row1['secret'] . "'");}
if($res){
echo "<BR>";
echo "تم التفعيل";
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";
}
else {
echo "{AAAA84}";
}}}
$query = mysqli_query($link, "SELECT * FROM rm_managers where `managername` = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row = mysqli_fetch_array($query)){

            echo '<br><center><h3><a class="btn bg-gradient-green btn-lg btn-block" ><h3 style="font-size: 24px;">' . $row['testbalance'] . ' {AAAA23}</h3></a></h3></center>';
}
echo '</table></div>';}
?>