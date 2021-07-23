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

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><form method="post" action="index.php?cont=search_con_cts" >
<table class="table" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-12">
		<center><label><center><a>Username</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value=""></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Src.Address</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="srcip" value=""></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Dst.Address</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="dstip" value="" ></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Time</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="time" value="" ></center>
	</div>
               <div class="form-group col-md-6">
		<center><label><center><a>Date</a></center></label></center>
<select class="form-control" name="da">';
$res= mysqli_query($conn, "SELECT * FROM `tabidx` order by date desc");
    while ($row = $res->fetch_array()){
echo '<option value="' . $row['date'] . '">' . $row['date'] . '</option>';}
echo '</select></div>
<div class="form-group col-md-12">
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
	</div></table></div>';
}
?>
