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

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<!-----------<div style="overflow-x:auto;">/--------->
<table class="table" border="15"><td>
<center><form method="post" action="">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">{AAAA42}</label>
      <input style="text-align:center;" type="text" class="form-control" name="username" placeholder="{AAAA42}">
    </div>
    <div class="form-group col-md-6">
      <label for="password">{AAAA85}</label>
      <input style="text-align:center;" type="password" class="form-control" name="password" placeholder="{AAAA85}">
    </div>
  <div class="form-group col-md-6">
    <label for="firstname">{AAAA60}</label>
    <input style="text-align:center;" type="text" class="form-control" name="firstname" placeholder="{AAAA60}">
  </div>
  <div class="form-group col-md-6">
    <label for="lastname">{AAAA61}</label>
    <input style="text-align:center;" type="text" class="form-control" name="lastname" placeholder="{AAAA61}">
  </div>
    <div class="form-group col-md-6">
      <label for="ipmod">{AAAA94}</label>';
$query = mysqli_query($link, "select static_ip from rm_settings");
    while ($row = $query->fetch_array()){
if ($row['static_ip'] == '1'){
echo'      <select style="text-align:center;" name="ipmod" class="form-control">
  <option value="0">{AAAA96}</option>
  <option value="2" selected>{AAAA95}</option>';} else {
echo'</select>
<select style="text-align:center;" name="ipmod" class="form-control">
  <option value="0" selected>{AAAA96}</option>
  <option value="2">{AAAA95}</option>';}}
     echo ' </select>
</div>
    <div class="form-group col-md-6">
      <label for="srvid">{AAAA76}</label>
      <select style="text-align:center;" name="srvid" class="form-control">
  <option value="1">Light</option>
  <option value="2">Economy</option>
  <option value="3">Standard</option>
  <option value="5">Active_Plus</option>
  <option value="6">Turbo</option>
  <option value="7">Business</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="phone">{AAAA98}</label>
      <input style="text-align:center;" type="text" class="form-control" name="phone">
    </div>
    <div class="form-group col-md-6">
      <label for="ipaddress">{AAAA49}</label>
      <input style="text-align:center;" type="text" class="form-control" name="ipaddress" placeholder="{AAAA101}">
    </div>
  <div class="form-group col-md-12">
    <label for="address">{AAAA97}</label>
    <input style="text-align:center;" type="text" class="form-control" name="address" placeholder="{AAAA97}">
  </div>
<div class="md-form col-md-12">
		<?php if ($update == true): ?>
		<br><button class="btn bg-gradient-dark" type="submit" name="update" ><h3 style="font-size: 24px;">{AAAA102}</h3></button></center>
		<?php endif ?>
	</div>';

	if (isset($_POST['update'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$ipmod = $_POST['ipmod'];
		$ipaddress = $_POST['ipaddress'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$srvid = $_POST['srvid'];
if ($username == '') {
echo '<br>';
echo '<center><a class="btn bg-gradient-danger btn-lg" href=""><h1 style="font-size: 24px;">{AAAA103}</h1></a></center>';
    } else {
	$test = mysqli_query($link, "SELECT COUNT(*) AS num FROM rm_users WHERE username = '$username'");
    while ($row = $test->fetch_array()){
    if($row['num'] > 0)
    {
echo '<br>';
echo '<center><a class="btn bg-gradient-danger btn-lg" href=""><h1 style="font-size: 24px;">{AAAA103}</h1></a></center>';
    } else {
       $query = mysqli_query($link, "SELECT * FROM ip where srvid = '$srvid' ");
    while ($row = $query->fetch_array()){
for($i=254;$i > 0;$i--){
$ip = $row['staticip'].$i;
		$res = mysqli_query($link, "INSERT INTO `rm_users`(`username`, `password`, `firstname`, `lastname`, `phone`, `address`, `staticipcpe`, `ipmodecpe`, `enableuser`, `groupid` , `srvid`, `createdby`, `owner`, `expiration`, `createdon`) VALUES ('$username', '$password', N'$firstname', N'$lastname', '$phone', N'$address', '$ip', '$ipmod', '1', '1', '$srvid', '" . $_SESSION['AUTH_MANAGER'] . "', '" . $_SESSION['AUTH_MANAGER'] . "',localtime(),localtime()) ");
}}
		$res = mysqli_query($link, "INSERT INTO `radcheck`(`username`, `attribute`, `op`, `value`) VALUES ('$username', 'Cleartext-Password', ':=', '$password')");
		$res = mysqli_query($link, "INSERT INTO `radcheck`(`username`, `attribute`, `op`, `value`) VALUES ('$username', 'Simultaneous-Use', ':=', '1')");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'اضافة اليوزر ($username) ' ,localtime())");

echo "{AAAA104}";
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";
}}}}
echo'</table></div>';}
?>