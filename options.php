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


echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<td><center><form method="post" action="" ><div class="form-row">
<div class="form-group col-md-6">
		<button class="btn bg-gradient-danger btn-block" type="submit" name="dau"><h3>Delete all users</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-danger btn-block" type="submit" name="dal"><h3>Delete all Logs</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-info btn-block" type="submit" name="dar"><h3>Delete all Rad activity</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-info btn-block" type="submit" name="das"><h3>Delete all services</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-success btn-block" type="submit" name="dasip"><h3>Delete all Static Ip</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-success btn-block" type="submit" name="daru" ><h3>Disconnect all Rad users</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-primary btn-block" type="submit" name="eax" ><h3>Remove all Static IP for Expire users</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-primary btn-block" type="submit" name="delip" ><h3>Remove all Static IP and Reorder for All users</h3></button>
	</div></table>';

	if (isset($_POST['dau'])) {
		$res = mysqli_query($link, "Delete from `rm_users` ");
		$res = mysqli_query($link, "Delete from `radcheck` ");
echo "<script>window.location = 'index.php?cont=';</script>";}
	if (isset($_POST['dal'])) {
		$res = mysqli_query($link, "Delete from `logs` ");
echo "<script>window.location = 'index.php?cont=';</script>";}
	if (isset($_POST['dar'])) {
		$res = mysqli_query($link, "Delete from `radacct` ");
echo "<script>window.location = 'index.php?cont=';</script>";}
	if (isset($_POST['das'])) {
		$res = mysqli_query($link, "Delete from `rm_services` ");
echo "<script>window.location = 'index.php?cont=';</script>";}
	if (isset($_POST['dasip'])) {
		$res = mysqli_query($link, "Delete from `ip` ");
echo "<script>window.location = 'index.php?cont=';</script>";}

	if (isset($_POST['daru'])) {
$query = mysqli_query($link, "SELECT * from nas ");
       while($row = $query->fetch_array()){
		$res1 = mysqli_query($link, "select * from `rm_users` left join radacct on rm_users.username = radacct.username where acctstoptime is null ");
while($row1 = mysqli_fetch_array($res1)) {
$a = shell_exec("echo user-name='" . $row1['username'] . "'| radclient -x '" . $row['nasname'] . "':1700 disconnect '" . $row['secret'] . "'");
		$res = mysqli_query($link, "Delete from `radacct` where acctstoptime is null ");
echo "<script>window.location = 'index.php?cont=';</script>";}}}

	if (isset($_POST['eax'])) {

       $query = mysqli_query($link, "SELECT * FROM rm_users ");
    while ($row = $query->fetch_array()){
for($i=1;$i < 255;$i++){
if(strtotime("now") > strtotime($row['expiration']) ){
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '8.8.1.$i' WHERE username= '" . $row['username'] . "' ");}}
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";}}

	if (isset($_POST['delip'])) {
       $query1 = mysqli_query($link, "SELECT * FROM rm_users  ");
    while ($row1 = $query1->fetch_array()){
for($i=1;$i < 255;$i++){
       $query = mysqli_query($link, "SELECT * FROM ip where srvid = '" . $row1['srvid'] . "' ");
    while ($row = $query->fetch_array()){
$ip = $row['staticip'].$i;
if(strtotime("now") <= strtotime($row1['expiration']) ){
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '$ip' WHERE username= '" . $row1['username'] . "' ");}}
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";}}}

}
?>