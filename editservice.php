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

if ($_REQUEST['srvid'] == '') {
	$_REQUEST['srvid'] = '';
}

$srvid = $_REQUEST['srvid'];

        $query = mysqli_query($link, "SELECT * FROM rm_services where srvid = '$srvid' ");
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
		<center><label><center><a>{AAAA76}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="srvname" value="' . $row['srvname'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA89}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="pool" value="' . $row['poolname'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a">{AAAA90}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="price" value="' . $row['unitprice'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>{AAAA91}</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="discount" value="' . $row['unitpriceNM'] . '"></center>
	</div>
<div class="form-group col-md-12">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div></div></table></div></div></div></div></div>';
}
	if (isset($_POST['update'])) {
		$srvname = $_POST['srvname'];
		$pool = $_POST['pool'];
		$price = $_POST['price'];
		$discount = $_POST['discount'];


		$res= mysqli_query($link, "UPDATE rm_services SET srvname = '$srvname', poolname = '$pool', unitprice = '$price', unitpriceNM = '$discount' WHERE srvid = '$srvid' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تعديل اليوزر ($name) ' ,localtime())");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_services';</script>";
}}}
?>