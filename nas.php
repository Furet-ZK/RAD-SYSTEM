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
if ($_SESSION['AUTH_MANAGER'] == 'admin') 
{
	// initialize variables
	$update = true;

        $query = mysqli_query($link, "SELECT * FROM nas ");
    while ($row = $query->fetch_array()){
echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<form method="post" action="" >
<table class="table" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-12">
		<center><label><center><a>Nas Name</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value="' . $row['shortname'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Nas ip</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="ip" value="' . $row['nasname'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Secret</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="secret" value="' . $row['secret'] . '" ></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Api username</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="apiu" value="' . $row['apiusername'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Api password</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="apip" value="' . $row['apipassword'] . '"></center>
	</div>
<div class="form-group col-md-12">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div>';

	if (isset($_POST['update'])) {
		$ip = $_POST['ip'];
		$name = $_POST['name'];
		$secret = $_POST['secret'];
		$apiu = $_POST['apiu'];
		$apip = $_POST['apip'];

		$res= mysqli_query($link, "UPDATE nas SET nasname= '$ip', shortname= '$name', secret= '$secret', apiusername= '$apiu', apipassword= '$apip'");

                      $myfile = fopen("/usr/local/etc/raddb/clients.conf", "w") or die("Unable to open file!");
                      $txt = "";
                      fwrite($myfile, $txt);
                      $txt = "################################################################################
#
# This file is updated by Radius Manager, do not edit it!
#

client $ip {
	secret		= $secret
	shortname	= $name
}";
                      fwrite($myfile, $txt);
                      fclose($myfile);



echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";
}}}
echo '</table></div>';}
?>