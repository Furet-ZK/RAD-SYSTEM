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

	if ($_SESSION['AUTH_MANAGER'] == 'admin') {

switch ($_REQUEST['val']) {
case '':
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<center><table class="table table-bordered table-hover table-striped" id="w0"><thead><tr> 
        <td> <font face="Arial"><center><a>Name</a></center></font> </td> 
        <td> <font face="Arial"><center><a>IP</a></a></center></font> </td>
          <td><font face="Arial"><center><a>Community</a></center></font> </td>
      </tr></thead>';
            echo "</table></center></div></div></div></div></div></div>";
		break;
}
if ($_REQUEST['val'] == '1') {
if ($_REQUEST['ip'] == ''){
header("Location: index.php?cont=wifi_ap");}
$ip = $_REQUEST['ip'];

       $query = mysqli_query($link, "SELECT * FROM rm_ap where ip = '$ip' ");
    while ($row = $query->fetch_array()){
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><form method="post" action="" id="q">
<center><table class="table" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-12">
		<center><label><h3><center><a>Wifi Name</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value="' . $row['name'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a>Wifi ip</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="ip2" value="' . $row['ip'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a>Community</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="community" value="' . $row['community'] . '" ></center>
	</div>
<div class="form-group col-md-12">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div></table></center></div></div></div></div></div></div>';

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$ip2 = $_POST['ip2'];
		$community = $_POST['community'];

		$res= mysqli_query($link, "UPDATE rm_ap SET name= '$name', ip= '$ip2', community= '$community' where ip='$ip' ");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=wifi_ap';</script>";}}}

if ($_REQUEST['val'] == '2') {

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><form method="post" action="" id="q">
<center><table class="table" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-12">
		<center><label><h3><center><a>Wifi Name</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="name" value=""></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a>Wifi ip</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="ip2" value=""></center>
	</div>
<div class="form-group col-md-6">
		<center><label><h3><center><a>Community</a></center></h3></label></center>
		<center><input style="text-align:center;" class="form-control" name="community" value="" ></center>
	</div>
<div class="form-group col-md-12">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div></div></table></center></div></div></div></div></div></div>';

	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$ip2 = $_POST['ip2'];
		$community = $_POST['community'];

		$res= mysqli_query($link, "INSERT INTO `rm_ap`(`name`, `enable`, `accessmode`, `ip`, `community`, `apiver`) VALUES ('$name','1','0','$ip2','$community','0')");
echo "<BR>";
echo "<script>window.location = 'index.php?cont=wifi_ap';</script>";}
}} else {
echo "<BR>";
echo "<script>window.location = 'index.php?cont=';</script>";}}


?>

<script>
$(document).ready(function() {
    $('#w0').DataTable( {
        "processing": true,
        "serverSide": true,
    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        $('td:eq(0)', nRow).html( '<a class="btn bg-gradient-success btn-lg btn-block" href="index.php?cont=wifi_ap&val=1&ip='+ aData[1] +'"><center><h3 style="font-size: 24px;">'+ aData[0] +'</h3></center>' );
        $('td:eq(1)', nRow).html( '<a class="btn bg-gradient-navy btn-lg btn-block" href="http://'+ aData[1] +'"><center><h3 style="font-size: 24px;">'+ aData[1] +'</h3></center></a>' );
        $('td:eq(2)', nRow).html( '<a class="btn bg-gradient-info btn-lg btn-block"><center><h3 style="font-size: 24px;">'+ aData[2] +'</h3></center></a>' );

    },
        "ajax": "classes/wifi_ap.php"
    } );
} );
</script>
<script>
$(function () {
  $('#q').validate({
    rules: {
      name: {
        required: true,
        minlength: 1
      },
      ip2: {
        required: true,
        minlength: 8
      },
      community: {
        required: true,
        minlength: 1
      },
    },
    messages: {
      name: {
        required: "Please ADD a Wifi Name",
      },
      ip2: {
        required: "Please ADD IP Address",
        minlength: "Your ip must be at least 8 characters long"
      },
      community: {
        required: "Please ADD a community",
        minlength: "Your pool must be at least 1 characters long"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>