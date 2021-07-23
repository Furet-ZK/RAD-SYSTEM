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
      <label for="username">{AAAA25}</label>
      <input style="text-align:center;" type="text" class="form-control" name="username" placeholder="{AAAA25}">
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
      <label for="phone">{AAAA98}</label>
      <input style="text-align:center;" type="text" class="form-control" name="phone" placeholder="{AAAA98}">
    </div>
  <div class="form-group col-md-6">
    <label for="address">{AAAA97}</label>
    <input style="text-align:center;" type="text" class="form-control" name="address" placeholder="{AAAA97}">
  </div>
    <div class="form-group col-md-12">
      <label for="discount">{AAAA86}</label>
      <select style="text-align:center;" name="discount" class="form-control">
<option value="0">{AAAA88}</option>
<option value="1">{AAAA87}</option>
</select>
    </div>
<div class="md-form col-md-12">
		<?php if ($update == true): ?>
		<br><button class="btn bg-gradient-dark" type="submit" name="update" ><h3 style="font-size: 24px;">{AAAA105}</h3></button></center>
		<?php endif ?>
	</div>';
	if (isset($_POST['update'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$discount = $_POST['discount'];
-
	$test = mysqli_query($link, " SELECT COUNT(*) AS num FROM rm_managers WHERE managername = '$username' ");
       while($row = mysqli_fetch_array($test)){
    if($row['num'] > 0)
    {
echo '<br>';
        print "المدير موجود مسبقا\n";
    } else {
		$res = mysqli_query($link, "INSERT INTO `rm_managers`(`managername`, `password`, `firstname`, `lastname`, `phone`, `address`, `BNM`, `perm_listusers`, `perm_createusers`, `perm_editusers`, `perm_edituserspriv` , `perm_deleteusers`, `perm_listmanagers`, `perm_createmanagers`, `perm_editmanagers`, `perm_deletemanagers`, `perm_listservices`, `perm_createservices`, `perm_editservices`, `perm_deleteservices`, `perm_listonlineusers`, `perm_listinvoices`, `perm_trafficreport`, `perm_addcredits`, `perm_negbalance`, `perm_listallinvoices`, `perm_showinvtotals`, `perm_logout`, `perm_cardsys`, `perm_editinvoice`, `perm_allusers`, `perm_allowdiscount`, `perm_enwriteoff`, `perm_accessap`, `perm_cts`, `perm_email`, `perm_sms`, `enablemanager`, `lang`, `pp`) VALUES ('$username', md5('$password'), N'$firstname', N'$lastname', '$phone', N'$address', '$discount', '1', '1', '1', '0', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1', '1', '0', '1', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '0', '0', '1', 'Arabic', '$password') ");
		$res = mysqli_query($link, "INSERT INTO `rm_allowedmanagers`(`managername`, `srvid`) VALUES ('$username', '1')");
		$res = mysqli_query($link, "INSERT INTO `rm_allowedmanagers`(`managername`, `srvid`) VALUES ('$username', '2')");
		$res = mysqli_query($link, "INSERT INTO `rm_allowedmanagers`(`managername`, `srvid`) VALUES ('$username', '3')");
		$res = mysqli_query($link, "INSERT INTO `rm_allowedmanagers`(`managername`, `srvid`) VALUES ('$username', '5')");
		$res = mysqli_query($link, "INSERT INTO `rm_allowedmanagers`(`managername`, `srvid`) VALUES ('$username', '6')");
		$res = mysqli_query($link, "INSERT INTO `rm_allowedmanagers`(`managername`, `srvid`) VALUES ('$username', '7')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'username')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'srvname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'expiry')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'availdl')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'availul')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'availtotal')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'availtime')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'cpeip')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'cmip')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'cmmac')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'firstname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'lastname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'company')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'address')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'city')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'zip')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'country')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'state')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'email')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'registered')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'lastlogoff')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistusers`(`managername`, `colname`) VALUES ('$username', 'comment')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'username')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'starttime')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'onlinetime')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'download')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'upload')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'ip')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'mac')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'apname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'signal')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'snr')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'ccq')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'nas')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'group')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'firstname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'lastname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'company')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'address')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'city')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'zip')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'country')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'state')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'email')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistradius`(`managername`, `colname`) VALUES ('$username', 'comment')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'comment')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'email')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'state')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'country')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'zip')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'city')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'address')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'company')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'lastname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'firstname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'groupname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'upstreamname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'cmtsname')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'pingtime')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'rxpwr')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'txpwr')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'snrus')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'snrds')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'username')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'cmmac')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'cmip')");
		$res = mysqli_query($link, "INSERT INTO `rm_colsetlistdocsis`(`managername`, `colname`) VALUES ('$username', 'cpeip')");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'اضافة الوكيل ($username) ' ,localtime())");

echo "{AAAA106}";
echo "<BR>";
echo "<script>window.location = 'index.php';</script>";
}}}}
echo '</table></div>';}
?>