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
        $query = mysqli_query($link, "SELECT * FROM rm_services left join rm_allowedmanagers on rm_allowedmanagers.srvid = rm_services.srvid where managername = '" . $_SESSION['AUTH_MANAGER'] . "' and srvname != 'expire' order by unitprice ");

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<div class="box box-solid box-default"><tr> 
        <td> <font face="Arial"><center><h3>{AAAA76}</h3></center></font> </td>
        <td> <font face="Arial"><center><h3>{AAAA75}</h3></center></font> </td>
      </tr></div>';

       while($row = mysqli_fetch_array($query)){
$query1 = mysqli_query($link, "SELECT * FROM rm_managers where managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row1 = mysqli_fetch_array($query1)){
if ($row1['BNM'] == '1') {
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-success btn-lg btn-block" href="index.php?cont=edit_service&srvid=' . $row['srvid'] . '" ><h3 style="font-size: 24px;"> ' . $row['srvname'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-dark btn-lg btn-block" ><h3 style="font-size: 24px;"> ' . $row['unitpriceNM'] . '</h3></a></h3></center></td>';
            echo "</tr>";
        } else {
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-success btn-lg btn-block" href="index.php?cont=edit_service&srvid=' . $row['srvid'] . '" ><h3 style="font-size: 24px;"> ' . $row['srvname'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-dark btn-lg btn-block" ><h3 style="font-size: 24px;"> ' . $row['unitprice'] . '</h3></a></h3></center></td>';
            echo "</tr>";}}}
echo '</table></div>';
}
else {
        $query = mysqli_query($link, "SELECT * FROM rm_services left join rm_allowedmanagers on rm_allowedmanagers.srvid = rm_services.srvid where managername = '" . $_SESSION['AUTH_MANAGER'] . "' and srvname != 'expire' order by unitprice ");

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<div class="box box-solid box-default"><tr> 
        <td> <font face="Arial"><center><h3>{AAAA76}</h3></center></font> </td>
        <td> <font face="Arial"><center><h3>{AAAA75}</h3></center></font> </td>
      </tr></div>';

       while($row = mysqli_fetch_array($query)){
$query1 = mysqli_query($link, "SELECT * FROM rm_managers where managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row1 = mysqli_fetch_array($query1)){
if ($row1['BNM'] == '1') {
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-success btn-lg btn-block"><h3 style="font-size: 24px;"> ' . $row['srvname'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-dark btn-lg btn-block" ><h3 style="font-size: 24px;"> ' . $row['unitpriceNM'] . '</h3></a></h3></center></td>';
            echo "</tr>";
        } else {
            echo "<tr>";
            echo '<td><center><h3><a class="btn bg-gradient-success btn-lg btn-block"><h3 style="font-size: 24px;"> ' . $row['srvname'] . '</h3></a></h3></center></td>';
            echo '<td><center><h3><a class="btn bg-gradient-dark btn-lg btn-block" ><h3 style="font-size: 24px;"> ' . $row['unitprice'] . '</h3></a></h3></center></td>';
            echo "</tr>";}}}
echo '</table></div>';
}}
?>
</body>
</html>