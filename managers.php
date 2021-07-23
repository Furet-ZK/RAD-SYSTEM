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
        $query = mysqli_query($link, "SELECT * FROM rm_managers where managername != 'admin' ");

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table" border="15" id="example1">
<thead><tr> 
        <td> <font face="Arial"><center><h3>{AAAA82}</h3></center></font> </td>
        <td> <font face="Arial"><center><h3>{AAAA60}</h3></center></font> </td>
        <td> <font face="Arial"><center><h3>{AAAA61}</h3></center></font> </td>
      </tr></thead>';

       while($row = mysqli_fetch_array($query)){
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-success btn-lg btn-block" href="index.php?cont=edit_manager&name=' . $row['managername'] . '" ><h3 style="font-size: 24px;"> ' . $row['managername'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-dark btn-lg btn-block" ><h3 style="font-size: 24px;">&nbsp;' . $row['firstname'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-dark btn-lg btn-block" ><h3 style="font-size: 24px;">&nbsp;' . $row['lastname'] . '</h3></a></h3></center></td>';
            echo "</tr>";
        }}}
?>
</body>
</html>