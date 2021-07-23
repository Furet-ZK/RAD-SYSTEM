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

if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$srcip = $_POST['srcip'];
		$dstip = $_POST['dstip'];
		$time = $_POST['time'];
		$da = $_POST['da'];
if ($name == ''){
		$res= mysqli_query($conn, "SELECT * FROM `$da` where `dstip` LIKE '%$dstip%' and `srcip` LIKE '%$srcip%' and `time` LIKE '%$time%' ");

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped" id="example2"><thead><tr>
        <td><font face="Arial"><center><a>Time</a></center></font></td>
        <td><font face="Arial"><center><a>Username</a></center></font></td>';
          echo '<td><font face="Arial"><center><a>Src.Ip</a></center></font></td>
          <td><font face="Arial" ><center><a>Dst.ip</a></center></font></td>
      </tr></thead>';


    while ($row = $res->fetch_array()){
            echo "<tr>";
            echo '<td><center><a><strong> ' . $row['time'] . '</strong> </a></center></td>';
            echo '<td><font face="Arial"><center><a><strong>' . $row['username'] . '</strong> </a></center></td>';
            echo '<td><center><a><strong> ' . $row['srcip'] . '</strong> </a></center></td>';
            echo '<td><center><a><strong> ' . $row['dstip'] . '</strong> <br></a></center></td>';

		}}
else {
		$res= mysqli_query($conn, "SELECT * FROM `$da` where username= '$name' and `dstip` LIKE '%$dstip%' and `srcip` LIKE '%$srcip%' and `time` LIKE '%$time%' ");

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped" id="example2"><thead><tr>
        <td><font face="Arial"><center><a>Time</a></center></font></td>
        <td><font face="Arial"><center><a>Username</a></center></font></td>';
          echo '<td><font face="Arial"><center><a>Src.Ip</a></center></font></td>
          <td><font face="Arial" ><center><a>Dst.ip</a></center></font></td>
      </tr></thead>';


    while ($row = $res->fetch_array()){
            echo "<tr>";
            echo '<td><center><a><strong> ' . $row['time'] . '</strong> </a></center></td>';
            echo '<td><font face="Arial"><center><a><strong>' . $row['username'] . '</strong> </a></center></td>';
            echo '<td><center><a><strong> ' . $row['srcip'] . '</strong> </a></center></td>';
            echo '<td><center><a><strong> ' . $row['dstip'] . '</strong> <br></a></center></td>';

		}}}}
?>