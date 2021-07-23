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
echo '<center><nav class="mt-3">
  <form class="form-inline ml-3" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="term">
    <button class="btn bg-gradient-primary" type="submit" name="submit">Search</button>
  </form>
</nav></center><br>';

if ($_SESSION['AUTH_MANAGER'] == 'admin') 
{
        $query = mysqli_query($link, "SELECT * FROM logs order by time desc");

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><div class="card-body">
<table class="table table-bordered table-hover table-striped" id="example3">
<div class="box box-solid box-default"><thead><tr> 
        <td> <font face="Arial"><center>{AAAA72}</center></font> </td>
        <td> <font face="Arial"><center>{AAAA73}</center></font> </td>
        <td> <font face="Arial"><center>{AAAA74}</center></font> </td>
          <td><font face="Arial"><center>{AAAA75}</center></font> </td>
      </tr></thead></div>';

       while($row = mysqli_fetch_array($query)){

            echo "<tr>";
            echo '<td><center><strong>' . $row['name'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['log'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['time'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['price'] . '</strong></center></td>';
            echo "</tr>";
        }
echo '</table>';
}
if ($_SESSION['AUTH_MANAGER'] != 'admin') 
{
switch ($_REQUEST['val']) {

case '':

        $query = mysqli_query($link, "SELECT * FROM logs where name = '" . $_SESSION['AUTH_MANAGER'] . "' order by time desc");

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><div class="card-body">
<table class="table table-bordered table-hover table-striped" id="example3">
<div class="box box-solid box-default"><thead><tr> 
        <td> <font face="Arial"><center>{AAAA72}</center></font> </td>
        <td> <font face="Arial"><center>{AAAA73}</center></font> </td>
        <td> <font face="Arial"><center>{AAAA74}</center></font> </td>
          <td><font face="Arial"><center>{AAAA75}</center></font> </td>
      </tr></thead></div>';

       while($row = mysqli_fetch_array($query)){

            echo "<tr>";
            echo '<td><center><strong>' . $row['name'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['log'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['time'] . '</strong></center></td>';
            echo '<td><center><strong>' . $row['price'] . '</strong></center></td>';
            echo "</tr>";
        }
echo '</table>';
}}
}
?>