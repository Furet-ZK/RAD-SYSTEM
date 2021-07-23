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
<div class="card-body"><form method="post" action="" ><div style="overflow-x:auto;">
<table class="table" border="15">

<td><center><h3><div class="md-form mt-0">
		<center><label><center><a>اسم المستخدم</a></center></label></center>
<select style="text-align:center;" class="form-control" name="name">
<option value="' . $_REQUEST['name'] . '" hidden>' . $_REQUEST['name'] . '</option>
</select>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>نوع الاشتراك الحالي</a></center></label></center>
<select style="text-align:center;" class="form-control" name="srvid">';
        $query = mysqli_query($link, "select * from rm_services left join rm_users on rm_services.srvid = rm_users.srvid where username = '" . $_REQUEST['name'] . "' ");
    while ($row1 = $query->fetch_array()){
 echo ' <option value="' . $row1['srvid'] . '" hidden>' . $row1['srvname'] . '</option>';
$a = $row1['srvid'];
}
echo '</select>
    </div>
<div class="form-group col-md-6">
		<center><label><center><a class"btn btn-block bg-danger">نوع الاشتراك الجديد</a></center></label></center>
<select style="text-align:center;" class="form-control" name="srvid1">';
        $query = mysqli_query($link, "select * from rm_services where srvid != $a and srvname != 'expire' ");
    while ($row = $query->fetch_array()){
 echo ' <option value="' . $row['srvid'] . '">' . $row['srvname'] . '</option>';
}
echo '</select>
    </div>
<div class="md-form mt-0">
		<?php if ($update == true): ?>
		<br><center><button class="btn" type="submit" name="update" style="background: orange;" ><h3 >Change</h3></button></center>
		<?php endif ?>
	</div><br><center><a class="btn btn-block btn-dark"><h4>عند تغير نوع الاشتراك سيتغير تاريخ انتهاء الاشتراك الى الوقت الحالي ويعني انتهاء المشترك</h4></a></center></table>';

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$srvid = $_POST['srvid'];
		$srvid1 = $_POST['srvid1'];

if ($srvid != srvid1) {
if ($_SESSION['AUTH_MANAGER'] == 'admin') {
		for($i=1;$i < 255;$i++){
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '8.8.1.$i' WHERE username= '$name' ");}
		$res= mysqli_query($link, "UPDATE rm_users SET srvid= '$srvid1' WHERE username= '$name' ");
		$res= mysqli_query($link, "UPDATE rm_users SET expiration = localtime() WHERE username= '$name' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', 'Change Profile ($srvid) to ($srvid1) user ($name)' ,localtime())");
 $query1 = mysqli_query($link, "SELECT * FROM nas ");
       while($row1 = $query1->fetch_array()) {
		shell_exec("echo user-name=$name | radclient -x '" . $row1['nasname'] . "':1700 disconnect '" . $row1['secret'] . "' ");
if($res){
echo "تم تغير نوع الاشتراك";
echo "<BR>";
 echo "<script>window.location = 'index.php?cont=list_users';</script>";
}
else {
echo "ERROR";
}}}
if ($_SESSION['AUTH_MANAGER'] != 'admin') {
		for($i=1;$i < 255;$i++){
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '8.8.1.$i' WHERE username= '$name' ");}
		$res= mysqli_query($link, "UPDATE rm_users SET srvid= '$srvid1' WHERE username= '$name' and owner = '" . $_SESSION['AUTH_MANAGER'] . "' ");
		$res= mysqli_query($link, "UPDATE rm_users SET expiration = localtime() WHERE username= '$name' and owner = '" . $_SESSION['AUTH_MANAGER'] . "' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', 'Change Profile ($srvid) to ($srvid1) user ($name) ' ,localtime())");
 $query1 = mysqli_query($link, "SELECT * FROM nas ");
       while($row1 = $query1->fetch_array()) {
		shell_exec("echo user-name=$name | radclient -x '" . $row1['nasname'] . "':1700 disconnect '" . $row1['secret'] . "' ");
if($res){
echo "تم تغير نوع الاشتراك";
echo "<BR>";
 echo "<script>window.location = 'index.php?cont=list_users';</script>";
}
else {
echo "ERROR";
}}}}
else {
echo "<BR>";
 echo "<script>window.location = 'index.php?cont=list_users';</script>";}
}
echo '</table></div>';}
?>