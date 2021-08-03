<html>
<body>
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

        $query = mysqli_query($link, "select static_ip from rm_settings ");
    while ($row = $query->fetch_array()){

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<table class="table" border="15">
<td><center><form method="post" action="">
<div class="form-row">
<div class="form-group col-md-12">
<center><label><h3><center><a class="btn bg-gradient-green btn-block"><h3>Static ip</h3></a></center></h3></label></center>
<select style="text-align:center;" class="form-control" name="static">';
        $query = mysqli_query($link, "select CASE static_ip WHEN '0' THEN 'Disabled' WHEN '1' THEN 'Enabled' END AS staticip from rm_settings ");
    while ($row2 = $query->fetch_array()){
echo '<option value="' . $row['static_ip'] . '" hidden>' . $row2['staticip'] . '</option>';
 echo ' <option value="1">Enabled</option>';
 echo ' <option value="0">Disabled</option>';
}
echo '</select>
    </div>
<div class="form-group col-md-12">
		<button class="btn bg-gradient-red" type="submit" name="update"><h3 style="font-size: 24px;">update</h3></button>
	</div>
<div class="form-group col-md-12"><a class="btn bg-gradient-dark btn-block"><h3>IP Example (1.1.1.)</h3></a></div>
<div class="form-group col-md-6">
<center><label><center><a>الاشتراك</a></center></label></center>
<select style="text-align:center;" class="form-control" name="srvid">';
        $query = mysqli_query($link, "select * from rm_services where srvname != 'expire' ");
    while ($row1 = $query->fetch_array()){
 echo ' <option value="' . $row1['srvid'] . '">' . $row1['srvname'] . '</option>';
}
echo '</select>
    </div>
    <div class="form-group col-md-6">
<center><label><center><a>الايبي</a></center></label></center>
      <input style="text-align:center;" type="text" class="form-control" name="ip" placeholder="ادخل الايبي ويجب ان يكون من ثلاثة ارقام والرابع يتسلسل تلقائيا">
    </div>
<div class="form-group col-md-12">
		<button class="btn bg-gradient-warning" type="submit" name="insert"><h3 style="font-size: 24px;">ADD IP</h3></button>
	</div>';

	if (isset($_POST['update'])) {
		$static = $_POST['static'];
		$res = mysqli_query($link, "UPDATE rm_settings SET static_ip = '$static' ");
echo "<script>window.location = 'index.php?cont=list_users';</script>";}

	if (isset($_POST['insert'])) {
		$srvid = $_POST['srvid'];
		$ip = $_POST['ip'];

		$res = mysqli_query($link, "INSERT INTO `ip`(`srvid`, `staticip`) VALUES ('$srvid', '$ip')");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'اضافة الايبي ($ip) ' ,localtime())");}

echo '</table></div></div></div></div></div>';

       $query = mysqli_query($link, "SELECT * FROM ip LEFT JOIN rm_services ON ip.srvid = rm_services.srvid");

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<tr> 
        <td> <font face="Arial"><center><h3>الاشتراك</h3></center></font> </td>
        <td> <font face="Arial"><center><h3>الايبي</h3></center></font> </td>
      </tr></div>';
    while ($row = $query->fetch_array()){
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-success btn-lg btn-block" ><h3 style="font-size: 24px;"> ' . $row['srvname'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-danger btn-lg btn-block" ><h3 style="font-size: 24px;"> ' . $row['staticip'] . '</h3></a></h3></center></td>';
            echo "</tr>";}

echo '</table></div></div></div></div></div></div>';
}
}
?>




