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

	if ($_SESSION['AUTH_MANAGER'] == 'admin') {

switch ($_REQUEST['val']) {
case '':
        $query = mysqli_query($link, "SELECT * FROM rm_ap");
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped" id="example1"><thead><tr> 
        <td> <font face="Arial"><center><a>Name</a></center></font> </td> 
        <td> <font face="Arial"><center><a>IP</a></a></center></font> </td>
          <td><font face="Arial"><center><a>Community</a></center></font> </td>
      </tr></thead>';

    while ($row = mysqli_fetch_array($query)){
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-success btn-lg btn-block" href="index.php?cont=wifi_ap&val=1&ip=' . $row['ip'] . '"><h3 style="font-size: 24px;"> ' . $row['name'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-navy btn-lg btn-block" href="http://' . $row['ip'] . '/"><h3 style="font-size: 24px;"> ' . $row['ip'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-info btn-lg btn-block" ><h3 style="font-size: 24px;"> ' . $row['community'] . '</h3></a></h3></center></td>';
            echo "</tr>";
        }
            echo "</table>";
		break;
}
if ($_REQUEST['val'] == '1') {
if ($_REQUEST['ip'] == ''){
$_REQUEST['ip'];}
$ip = $_REQUEST['ip'];

       $query = mysqli_query($link, "SELECT * FROM rm_ap where ip = '$ip' ");
    while ($row = $query->fetch_array()){
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><form method="post" action="" >
<table class="table bg-primary" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-12">
		<center><label><h3><center><a style="color:white">Wifi Name</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value="' . $row['name'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a style="color:white">Wifi ip</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="ip2" value="' . $row['ip'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a style="color:white">Community</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="community" value="' . $row['community'] . '" ></center>
	</div>
<div class="form-group col-md-12">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div></div></table>';

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$ip2 = $_POST['ip2'];
		$community = $_POST['community'];

		$res= mysqli_query($link, "UPDATE rm_ap SET name= '$name', ip= '$ip2', community= '$community' where ip='$ip' ");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=wifi_ap';</script>";}}}

if ($_REQUEST['val'] == '2') {

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><form method="post" action="" >
<table class="table bg-primary" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-12">
		<center><label><h3><center><a style="color:white">Wifi Name</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value=""></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a style="color:white">Wifi ip</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="ip2" value=""></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a style="color:white">Community</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="community" value="" ></center>
	</div>
<div class="form-group col-md-12">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div></div></table>';

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$ip2 = $_POST['ip2'];
		$community = $_POST['community'];

		$res= mysqli_query($link, "INSERT INTO `rm_ap`(`name`, `enable`, `accessmode`, `ip`, `community`, `apiver`) VALUES ('$name','1','0','$ip2','$community','0')");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=wifi_ap';</script>";}
}} else {
echo "<BR>";
echo "<script>window.location = 'index.php?cont=';</script>";}}


?>