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

// initialize variables
$update = true;

$query = mysqli_query($link, "SELECT * FROM rm_managers ");

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped" id="example1">
<div class="box box-solid box-default"><thead><tr> 
        <td> <font face="Arial"><center>{AAAA72}</center></font> </td>
          <td><font face="Arial"><center>{AAAA45}</center></font> </td>
          <td><font face="Arial"><center>{AAAA31}</center></font> </td>
          <td><font face="Arial"><center>{AAAA77}</center></font> </td>

      </tr></thead></div>';

       while($row = mysqli_fetch_array($query)){
            echo "<tr>";
            echo '<td><center><strong>' . $row['managername'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['balance'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['testcurrent'] . '</strong></center></td>';
            echo '</tr>';
}
}
	if ($_SESSION['AUTH_MANAGER'] != 'admin') {
echo "<tr>";
echo '<center><td><a class="btn bg-gradient-primary btn-lg" href=""><h1>عذرا لايمكنك الدخول الى هذه الصفحة</h1></a></td>';
echo "</tr>";
}
}
?>
</body>
</html>