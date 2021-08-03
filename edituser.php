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

if ($_REQUEST['name'] == '') {
	$_REQUEST['name'] = '';
}

$name = $_REQUEST['name'];

        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid where username = '$name' ");
    while ($row = $query->fetch_array()){
if ($_SESSION['AUTH_MANAGER'] == 'admin') 
{
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><form align="center" method="post" action="" >
<!-----------<div style="overflow-x:auto;">/--------->
<table class="table" border="15"><td>
<center><div class="form-row"><div class="form-group col-md-6">
		<center><label><center><a>{AAAA42}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value="' . $row['username'] . '"></center>
	</div>';
$query = mysqli_query($link, "SELECT * FROM radcheck where username = '$name' and attribute= 'Cleartext-Password' ");
     while ($row1 = $query->fetch_array()){
echo '<div class="form-group col-md-6">
		<center><label><center><a>{AAAA85}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="password" value="' . $row1['value'] . '"></center>
	</div>';
}
echo ' <div class="form-group col-md-6">
		<center><label><center><a>{AAAA60}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="firstname" value="' . $row['firstname'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA61}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="lastname" value="' . $row['lastname'] . '"></center>
	</div>
<div class="form-group col-md-6">
<center><label><center><a>{AAAA100}</a></center></label></center>
<select style="text-align:center;" class="form-control" name="enableuser">';
        $query1 = mysqli_query($link, " SELECT  CASE enableuser WHEN '0' THEN N'{AAAA93}' WHEN '1' THEN N'{AAAA92}' END AS enableuser from rm_users where username = '$name' ");
    while ($row2 = $query1->fetch_array()){
echo '<option value="' . $row['enableuser'] . '" hidden>' . $row2['enableuser'] . '</option>';
echo '<option value="1">{AAAA92}</option>';
echo '<option value="0">{AAAA93}</option>';
}
echo '</select>
</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA76}</a></center></h3></label></center>
<select style="text-align:center;" class="form-control" name="srvid">';
        $query = mysqli_query($link, "select * from rm_services where srvname != 'expire' ");
    while ($row1 = $query->fetch_array()){
 echo ' <option value="' . $row['srvid'] . '" hidden>' . $row['srvname'] . '</option>';
 echo ' <option value="' . $row1['srvid'] . '">' . $row1['srvname'] . '</option>';
}
echo '</select>
    </div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA94}</a></center></label></center>
		<select style="text-align:center;" class="form-control" name="ipmod" >';
        $query2 = mysqli_query($link, " SELECT  CASE ipmodecpe WHEN '0' THEN N'{AAAA96}' WHEN '2' THEN N'{AAAA95}' END AS ipmodecpe from rm_users where username = '$name' ");
    while ($row3 = $query2->fetch_array()){
echo '<option value="' . $row['ipmodecpe'] . '" hidden>' . $row3['ipmodecpe'] . '</option>';
echo '<option value="0">{AAAA96}</option>';
echo '<option value="2">{AAAA95}</option>';
}
echo '</select>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA49}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="ip" value="' . $row['staticipcpe'] . '"></center>
	</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA47}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="expiration" value="' . $row['expiration'] . '" ></center>
	</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA97}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="address" value="' . $row['address'] . '"></center>
	</div>
<div class="form-group col-md-4">
<center><label><center><a>{AAAA72}</a></center></label></center>
<select style="text-align:center;" class="form-control" name="owner">';
        $query = mysqli_query($link, "select * from rm_managers ");
    while ($row1 = $query->fetch_array()){
 echo ' <option value="' . $row['owner'] . '" hidden>' . $row['owner'] . '</option>';
 echo ' <option value="' . $row1['managername'] . '">' . $row1['managername'] . '</option>';
}
echo '</select>
</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA98}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="phone" value="' . $row['phone'] . '"></center>
	</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA52}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="mac" value="' . $row['mac'] . '"></center>
	</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA99}</a></center></label></center>
		<select style="text-align:center;" class="form-control" name="usermac" >';
        $query2 = mysqli_query($link, " SELECT  CASE usemacauth WHEN '0' THEN N'{AAAA96}' WHEN '1' THEN N'{AAAA95}' END AS usemacauth from rm_users where username = '$name' ");
    while ($row3 = $query2->fetch_array()){
echo '<option value="' . $row['usemacauth'] . '" hidden>' . $row3['usemacauth'] . '</option>';
echo '<option value="0">{AAAA96}</option>';
echo '<option value="1">{AAAA95}</option>';
}
echo '</select>
</div>
<div class="form-group col-md-6">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div>
<div class="form-group col-md-6">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-success" type="submit" name="delete"><h3 style="font-size: 24px;">Delete User</h3></button></center>
		<?php endif ?>
	</div></table></div></div></div></div></div>';
}



if ($_SESSION['AUTH_MANAGER'] != 'admin') 
{
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><form method="post" action="" >
<!----------<div style="overflow-x:auto;">/-------->
<table class="table" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-6">
		<center><label><center><a>{AAAA42}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value="' . $row['username'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA85}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="password" value="' . $row['password'] . '"></center>
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
<center><label><center><a>{AAAA100}</a></center></label></center>
<center><select style="text-align:center;" class="form-control" name="enableuser">';
        $query1 = mysqli_query($link, " SELECT  CASE enableuser WHEN '0' THEN N'{AAAA93}' WHEN '1' THEN N'{AAAA92}' END AS enableuser from rm_users where username = '$name' ");
    while ($row2 = $query1->fetch_array()){
echo '<option value="' . $row['enableuser'] . '" hidden>' . $row2['enableuser'] . '</option>';
echo '<option value="1">{AAAA92}</option>';
echo '<option value="0">{AAAA93}</option>';
}
echo '</select></center>
</div>
   <div class="form-group col-md-6">
		<center><label><center><a>{AAAA76}</a></center></label></center>
      <select style="text-align:center;" name="srvid" class="form-control" >
  <option value="' . $row['srvid'] . '" hidden>' . $row['srvname'] . '</option>
      </select>
    </div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA94}</a></center></label></center>
		<center><select style="text-align:center;" class="form-control" name="ipmod" >';
        $query2 = mysqli_query($link, " SELECT  CASE ipmodecpe WHEN '0' THEN N'{AAAA96}' WHEN '2' THEN N'{AAAA95}' END AS ipmodecpe from rm_users where username = '$name' ");
    while ($row3 = $query2->fetch_array()){
echo '<option value="' . $row['ipmodecpe'] . '" hidden>' . $row3['ipmodecpe'] . '</option>';
echo '<option value="0">{AAAA96}</option>';
echo '<option value="2">{AAAA95}</option>';
}
echo '</select></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA49}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="ip" value="' . $row['staticipcpe'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA47}</a></center></label></center>
		<center><select style="text-align:center;" class="form-control" name="expiration" >
<option value="' . $row['expiration'] . '" hidden>' . $row['expiration'] . '</option>
      </select></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA97}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="address" value="' . $row['address'] . '"></center>
	</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA98}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="phone" value="' . $row['phone'] . '"></center>
	</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA52}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="mac" value="' . $row['mac'] . '"></center>
	</div>
<div class="form-group col-md-4">
		<center><label><center><a>{AAAA99}</a></center></label></center>
		<center><select style="text-align:center;" class="form-control" name="usermac" >';
        $query2 = mysqli_query($link, " SELECT  CASE usemacauth WHEN '0' THEN N'{AAAA96}' WHEN '1' THEN N'{AAAA95}' END AS usemacauth from rm_users where username = '$name' ");
    while ($row3 = $query2->fetch_array()){
echo '<option value="' . $row['usemacauth'] . '" hidden>' . $row3['usemacauth'] . '</option>';
echo '<option value="0">{AAAA96}</option>';
echo '<option value="1">{AAAA95}</option>';
}
echo '</select>
</div>
<div class="form-group col-md-3" hidden>
<center><label><center><a>{AAAA72}</a></center></label></center>
<select style="text-align:center;" class="form-control" name="owner">
<option value="' . $row['owner'] . '" hidden>' . $row['owner'] . '</option>
</select>
</div>
<div class="md-form col-md-6">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-orange" type="submit" name="update"><h3>Change</h3></button></center>
		<?php endif ?>
	</div>
<div class="md-form col-md-6">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-green" type="submit" name="delete" ><h3>Delete User</h3></button></center>
		<?php endif ?>
	</div></table></div></div></div></div></div>';
}
}
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$ip = $_POST['ip'];
		$ipmod = $_POST['ipmod'];
		$srvid = $_POST['srvid'];
		$expiration = $_POST['expiration'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$owner = $_POST['owner'];
		$enableuser = $_POST['enableuser'];
		$mac = $_POST['mac'];
		$usermac = $_POST['usermac'];

		$res= mysqli_query($link, "UPDATE rm_users SET password= '$password', firstname= N'$firstname', lastname= N'$lastname', ipmodecpe= '$ipmod', address= '$address', phone= '$phone', srvid= '$srvid', expiration= '$expiration', owner= '$owner', enableuser = '$enableuser', mac = '$mac', usemacauth = '$usermac' WHERE username= '$name' ");
		$res= mysqli_query($link, "UPDATE radcheck SET value= '$password' WHERE username= '$name' and attribute= 'Cleartext-Password' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تعديل اليوزر ($name) ' ,localtime())");
$query = mysqli_query($link, "SELECT * from nas ");
    while ($row = $query->fetch_array()){
		shell_exec("echo user-name=$name | radclient -x '" . $row['nasname'] . "':1700 disconnect '" . $row['secret'] . "'");}
$res= mysqli_query($link, "select expiration,staticipcpe from rm_users where username = '$name' ");
    while ($row3 = $res->fetch_array()){
if ($row3['staticipcpe'] == $ip) {
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '$ip' WHERE username= '$name' ");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";
}
if ($ip == '') {
for($i=1;$i < 255;$i++){
       $query = mysqli_query($link, "SELECT * FROM ip where srvid = '$srvid' ");
    while ($row = $query->fetch_array()){
$ip = $row['staticip'].$i;
if(strtotime("now") <= strtotime($row3['expiration']) ){
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '$ip' WHERE username= '$name' ");}}
if(strtotime("now") > strtotime($row3['expiration']) ){
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '8.8.1.$i' WHERE username= '$name' ");}}
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";}
else {
$res= mysqli_query($link, "select count(*) as us from rm_users where staticipcpe = '$ip' ");
    while ($row2 = $res->fetch_array()){
if ($row2['us'] < 1) {
		$res= mysqli_query($link, "UPDATE rm_users SET staticipcpe= '$ip' WHERE username= '$name' ");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";
}
else {
echo '<a class="btn bg-gradient-danger btn-lg" href=""><h1 style="font-size: 24px;">الايبي مستخدم مسبقا</h1></a>';
}
}}}}
	if (isset($_POST['delete'])) {
		$name = $_POST['name'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$ip = $_POST['ip'];
		$ipmod = $_POST['ipmod'];
		$srvid = $_POST['srvid'];
		$expiration = $_POST['expiration'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];

$query = mysqli_query($link, "SELECT * from rm_users where username ='$name' ");
    while ($row = $query->fetch_array()){
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '<a class="btn bg-gradient-danger btn-lg" href=""><h1 style="font-size: 24px;">لا يمكن حذف المشترك لان المشترك فعال</h1></a>';}
else {
$query = mysqli_query($link, "SELECT * from nas ");
    while ($row = $query->fetch_array()){
		$res= mysqli_query($link, "DELETE FROM `rm_users` WHERE username = '$name' ");
		$res= mysqli_query($link, "DELETE FROM `radcheck` WHERE username = '$name' ");
		shell_exec("echo user-name=$name | radclient -x '" . $row['nasname'] . "':1700 disconnect '" . $row['secret'] . "'");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'حذف اليوزر ($name) ' ,localtime())");
if($res){
echo "Successful";
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";
}

else {
echo "ERROR";
}}}}}

echo '</table>';}
?>