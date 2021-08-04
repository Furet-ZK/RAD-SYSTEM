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

if ($user < 1 || $_REQUEST['name'] == ''){
header("Location: index.php?cont=list_users");
}

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><form method="post" action="" id="q">
<table class="table" border="15">
<td><center><h3><div class="md-form mt-0">
		<center><label><center><a>اسم المستخدم الحالي</a></center></label></center>
		<select style="text-align:center;" class="form-control" name="name">
		<option value="' . $_REQUEST['name'] . '" hidden>' . $_REQUEST['name'] . '</option>
		</select>
<div class="md-form mt-0">
		<center><label><center><a>اسم المستخدم الجديد</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="rename" value=""></center>
	</div>
<div class="md-form mt-0">
		<?php if ($update == true): ?>
		<br><center><button class="btn" type="submit" name="update" style="background: orange;" ><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div>';
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$rename = $_POST['rename'];

$res= mysqli_query($link, "SELECT count(*) as us from radcheck where username ='$rename' ");
while ($row2 = mysqli_fetch_array($res)){
if ($row2['us'] < 1) {
if ($rename != '') {
if ($_SESSION['AUTH_MANAGER'] == 'admin') {
		$res= mysqli_query($link, "UPDATE rm_users SET username= '$rename' WHERE username= '$name' ");
		$res= mysqli_query($link, "UPDATE radcheck SET username= '$rename' WHERE username= '$name' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تغير اسم المستخدم من ($name) الى ($rename) ' ,localtime())");
 $query1 = mysqli_query($link, "SELECT * FROM nas ");
       while($row1 = mysqli_fetch_array($query1)) {
		shell_exec("echo user-name=$name | radclient -x '" . $row1['nasname'] . "':1700 disconnect '" . $row1['secret'] . "' ");
if($res){
echo "تم تغير الاسم";
echo "<BR>";
 echo "<script>window.location = 'index.php?cont=list_users';</script>";
}
else {
echo "ERROR";
}
}
}
if ($_SESSION['AUTH_MANAGER'] != 'admin') {
		$res= mysqli_query($link, "UPDATE radcheck left join rm_users on rm_users.username = radcheck.username SET radcheck.username= '$rename' WHERE radcheck.username= '$name' and owner = '" . $_SESSION['AUTH_MANAGER'] . "' ");
		$res= mysqli_query($link, "UPDATE rm_users SET username= '$rename' WHERE username= '$name' and owner = '" . $_SESSION['AUTH_MANAGER'] . "' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تغير اسم المستخدم من ($name) الى ($rename) ' ,localtime())");
 $query1 = mysqli_query($link, "SELECT * FROM nas ");
       while($row1 = mysqli_fetch_array($query1)) {
		shell_exec("echo user-name=$name | radclient -x '" . $row1['nasname'] . "':1700 disconnect '" . $row1['secret'] . "' ");
if($res){
echo "تم تغير الاسم";
echo "<BR>";
 echo "<script>window.location = 'index.php?cont=list_users';</script>";
}
else {
echo "ERROR";
}
}
}
}}}
echo "<BR>";
echo '<a class="btn bg-gradient-danger btn-lg" href=""><h1 style="font-size: 24px;">اسم المستخدم الجديد غير متاح</h1></a>';}
echo '</table></div></div></div></div></div></div>';}
?>
<script>
$(function () {
  $('#q').validate({
    rules: {
      name: {
        required: true,
        minlength: 1
      },
      rename: {
        required: true,
        minlength: 1
      },
    },
    messages: {
      name: {
        required: "OLD Username Is Reqiured",
      },
      rename: {
        required: "New Username Is Reqiured",
        minlength: "Your username must be at least 1 characters long",
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