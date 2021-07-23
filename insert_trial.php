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

	// initialize variables
	$update = true;

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<td><center><form method="post" action="" ><center><label><h3><center>{AAAA72}</center></label></center>
<select style="text-align:center;" class="form-control mr-sm-2" type="search" placeholder="managername" aria-label="Owner" name="managername">';
$query = mysqli_query($link, "select * from rm_managers where managername != 'admin' ");
     while($row1 = mysqli_fetch_array($query)){
 echo ' <option style="text-align:center;" value="' . $row1['managername'] . '" hidden>' . $row1['managername'] . '</option>';
 echo ' <option style="text-align:center;" value="' . $row1['managername'] . '">' . $row1['managername'] . '</option>';
}
echo '</select>
	</div><br>
<div class="md-form mt-0">
		<center><label><center>{Test_add1}</center></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value=""></center>
	</div>
<div class="md-form mt-0">
		<?php if ($update == true): ?>
		<br><center><button class="btn bg-danger" type="submit" name="update"><h3>ADD</h3></button></center>
		<?php endif ?>
	</div></table>';

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$managername = $_POST['managername'];

		$res = mysqli_query($link, "UPDATE `rm_managers` SET `testcurrent` = (testcurrent +'$name') WHERE `managername` = '$managername' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'اضافة تيستات ($name) الى ($managername)' ,localtime())");

if($res){
echo "<BR>";
echo "تم اضافة الرصيد التجريبي";
echo "<BR>";
echo "<script>window.location = 'index.php?cont=balance';</script>";
}

else {
echo "ERROR";
}
}
	break;

case '1':
$link = mysqli_connect('localhost',root,root123,radius);
mysqli_set_charset($link, "utf8");
	// initialize variables
	$update = true;

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<td><center><form method="post" action="" ><center><label><center>{AAAA72}</center></label></center>
<select style="text-align:center;" class="form-control mr-sm-2" type="search" placeholder="managername" aria-label="Owner" name="managername">';
$query = mysqli_query($link, "select * from rm_managers where managername != 'admin' ");
     while($row1 = mysqli_fetch_array($query)){
 echo ' <option value="' . $row1['managername'] . '" hidden>' . $row1['managername'] . '</option>';
 echo ' <option value="' . $row1['managername'] . '">' . $row1['managername'] . '</option>';
}
echo '</select>
	</div><br>
<div class="md-form mt-0">
		<center><label><center>{Test_add}</center></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value=""></center>
	</div>
<div class="md-form mt-0">
		<?php if ($update == true): ?>
		<br><center><button class="btn bg-dark" type="submit" name="update" ><h3>ADD</h3></button></center>
		<?php endif ?>
	</div>';

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$managername = $_POST['managername'];

		$res = mysqli_query($link, "UPDATE `rm_managers` SET `balance` = (balance +'$name') WHERE `managername` = '$managername' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'اضافة رصيد ($name) الى ($managername)' ,localtime())");
if($res){
echo "<BR>";
echo "تم اضافة الرصيد";
echo "<BR>";
echo "<script>window.location = 'index.php?cont=balance';</script>";
}

else {
echo "ERROR";
}
}
	break;
}
}
	if ($_SESSION['AUTH_MANAGER'] != 'admin') {
echo "<tr>";
echo '<br><br><br><br><br><br><br><br><br><br><br><br><center><td><a class="btn bg-gradient-primary btn-lg" href=""><h1>عذرا لايمكنك الدخول الى هذه الصفحة</h1></a></td>';
echo "</tr>";
}
}
?>
