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

$name = $_REQUEST['name'];

        $query = mysqli_query($link, "SELECT * FROM rm_managers where managername = '$name' ");
    while ($row = $query->fetch_array()){
if ($_SESSION['AUTH_MANAGER'] == 'admin') 
{
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><form method="post" action="" >
<!-----------<div style="overflow-x:auto;">/--------->
<table class="table" border="15"><td>
<center><h3><div class="form-row"><div class="form-group col-md-6">
		<center><label><center><a>{AAAA72}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="managername" value="' . $row['managername'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA85}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="password" value="' . $row['pp'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA60}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="firstname" value="' . $row['firstname'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA61}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="lastname" value="' . $row['lastname'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA17}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="balance" value="' . $row['balance'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA77}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="test" value="' . $row['testcurrent'] . '"></center>
	</div>
    <div class="form-group col-md-12">
      <label for="discount">{AAAA86}</label>
      <select style="text-align:center;" name="discount" class="form-control">';
  $query = mysqli_query($link, "SELECT CASE BNM WHEN '0' THEN N'{AAAA88}' WHEN '1' THEN N'{AAAA87}' END AS BNM from rm_managers where managername = '$name' ");
    while ($row = $query->fetch_array()){
echo '<option value="' . $row['BNM'] . '" hidden>' . $row['BNM'] . '</option>';
echo '<option value="0">{AAAA88}</option>';
echo '<option value="1">{AAAA87}</option>';}
echo      '</select>
    </div>
<div class="form-group col-md-6">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div>
<div class="md-form col-md-6">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-green" type="submit" name="delete" ><h3>Delete Manager</h3></button></center>
		<?php endif ?>
	</div></div></table></div></div></div></div></div>';
}
	if (isset($_POST['update'])) {
		$managername = $_POST['managername'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$balance = $_POST['balance'];
		$test = $_POST['test'];
		$discount = $_POST['discount'];


		$res= mysqli_query($link, "UPDATE rm_managers SET password = MD5('$password'), pp = '$password', firstname = N'$firstname', lastname = N'$lastname', Balance = '$balance', testcurrent = '$test', BNM = '$discount' WHERE managername = '$name' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تعديل المدير ($name) ' ,localtime())");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_managers';</script>";
}
	if (isset($_POST['delete'])) {
		$managername = $_POST['managername'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$balance = $_POST['balance'];
		$test = $_POST['test'];
		$discount = $_POST['discount'];

		$res= mysqli_query($link, "DELETE FROM `rm_managers` WHERE managername = '$name' ");
		$res= mysqli_query($link, "DELETE FROM `rm_allowedmanagers` WHERE managername = '$name' ");
		$res= mysqli_query($link, "DELETE FROM `rm_colsetlistusers` WHERE managername = '$name' ");
		$res= mysqli_query($link, "DELETE FROM `rm_colsetlistradius` WHERE managername = '$name' ");
		$res= mysqli_query($link, "DELETE FROM `rm_colsetlistdocsis` WHERE managername = '$name' ");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_managers';</script>";
}}}
?>