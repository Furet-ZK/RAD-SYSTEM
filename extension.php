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

$query1 = mysqli_query($link, "SELECT * FROM rm_managers WHERE managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row = $query1 ->fetch_array()){
            echo "<br><br><br><br>";
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-danger btn-lg btn-block" ><h3>' . $row['balance'] . ' الرصيد المتوفر</h3></a></h3></center></td>';
            echo "</tr>";
}
echo '<div style="overflow-x:auto;">
<table class="table bg-primary" border="15">
<td><center><h3><form method="post" action="" >
<div class="md-form mt-0">
		<center><label><h3><center>اسماء المشتركين</center></h3></label></center>
<select class="form-control" name="users[]">';
$query1 = mysqli_query($link, "SELECT * FROM rm_users order by username asc ");
       while($row = $query1 ->fetch_array()){
echo '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';}
echo '</select>
</div>
<div class="md-form mt-0">
		<center><label><h3><center>مدة تمديد </center></h3></label></center>
		<center>      <input type="text" class="form-control" name="extension" placeholder="ادخل ايام التمديد"></center>
	</div>
		<?php if ($update == true): ?>
		<br><center><button class="btn bg-gradient-dark" type="submit" name="update" ><h3>تفعيل</h3></button></center>
		<?php endif ?>
	</form>';
	if (isset($_POST['update'])) {
        		$name = $_POST['users'];
		$extension = $_POST['extension'];

		$res = mysqli_query($link, "UPDATE `rm_users` set `expiration` = date_add(expiration , interval $extension*24*60*60 - 1 second) WHERE `username` = '$name' ");
		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`, `price`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', N'تمديد اليوزريه ($name) ' ,localtime(), '$price')");
if($res){
echo "<script>window.location = 'users.php';</script>";
}
else {
echo "<br>";
echo "رصيدك غير كافي";}}
echo '</table></div>';}
?>