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

if ($_SESSION['AUTH_MANAGER'] == 'admin') 
{
echo '<nav class="mt-3">
  <form class="form-inline col-md-3" method="post">
    <select class="form-control mr-sm-2" type="select" placeholder="owner" aria-label="Owner" name="term1">';

$query = mysqli_query($link, "select * from rm_managers ");
    while ($row1 = $query->fetch_assoc()){
 echo ' <option value="" hidden>{AAAA25}</option>';
 echo ' <option value="" hidden>' . $row['owner'] . '</option>';
 echo ' <option value="' . $row1['managername'] . '">' . $row1['managername'] . '</option>';
}
    echo '</select> <button class="btn bg-gradient-primary" type="submit">Search</button>
  </form>
</nav><br>';
}

$term1 = mysqli_real_escape_string($link, $_REQUEST['term1']);  
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./Start Session ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./Start Session ----------------------------------------------------------------------------------------------------------------------->';
if ($_SESSION['AUTH_MANAGER'] == 'admin') 
{
switch ($_REQUEST['val']) {

case '':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid where $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid where owner LIKE '%".$term1."%' ");}

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<form method="post" action="">
<button class="btn bg-gradient-dark" type="submit" name="update">{AAAA68}</button></form>
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr>
        <th><font face="Arial"><center><a>#</a></center></font></th>
        <th><font face="Arial"><center><a>{AAAA42}</a></center></font></th>';
	if (isset($_POST['update'])) {
            echo '<th><font face="Arial"><center><a>{AAAA67}</a></center></font></th>';}
          echo '<th><font face="Arial"><center><a>{AAAA45}</a></center></font></th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font></th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font></th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font></th>
      </tr></thead>';

$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a title="Edit Username" href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong> ' . $row['username'] . '</strong> </a></center></th>';
	if (isset($_POST['update'])) {
            echo '<th><center><a><strong>' . $row['password'] . '</strong></a></center></th>';}
            echo '<th><font face="Arial"><center><a><strong> ' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong> </a></center></th>';
            echo '<th><center><a><strong> ' . $row['expiration'] . '</strong> </a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong> ' . $row['staticipcpe'] . '</strong> <br></a></center></th>';
            echo '<th><center><a><strong> ' . $row['srvname'] . '</strong> </a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" title="Active Users" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-primary" title="Trial Active" href=index.php?cont=trial_user&name=' . $row['username'] . '><i class="fas fa-credit-card"></i>{AAAA57}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" title="Update Username" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" title="Update Profile" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';

echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid where $term2 LIKE N'%".$term."%' and owner LIKE '%".$term1."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid where owner LIKE '%".$term1."%' ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><h3 style="font-size: 24px;">' . $num_rows . ' All Users </a></center></th>';
            echo "</tr>";
echo '</table></div></div>';
		break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./0 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./0----------------------------------------------------------------------------------------------------------------------->';

case '0':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration > LOCALTIME() and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration > LOCALTIME() and owner LIKE '%".$term1."%' ");
}

echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr>
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><ahref=admin.php?cont=show_change_service&username=' . $row['username'] . '><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration > LOCALTIME() and $term2 LIKE N'%".$term."%'  ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration > LOCALTIME() and owner LIKE '%".$term1."%' ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users Active</strong></a></center></th>';
            echo "</tr>";
echo '</table>';

		break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./0 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./0----------------------------------------------------------------------------------------------------------------------->';

case '1':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration < LOCALTIME() and $term2 LIKE N'%".$term."%' order by expiration desc ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration < LOCALTIME() and owner LIKE '%".$term1."%' order by expiration desc ");
}

echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><ahref=admin.php?cont=show_change_service&username=' . $row['username'] . '><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-primary" href=index.php?cont=trial_user&name=' . $row['username'] . '><i class="fas fa-credit-card"></i>{AAAA57}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration < LOCALTIME() and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE expiration < LOCALTIME() and owner LIKE '%".$term1."%' ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users Expires</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
		break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./1 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./1 ----------------------------------------------------------------------------------------------------------------------->';

case '3':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration) = curdate() + INTERVAL 3 DAY and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration) = curdate() + INTERVAL 3 DAY and owner LIKE '%".$term1."%' ");
}

echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr>
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>

      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><ahref=admin.php?cont=show_change_service&username=' . $row['username'] . '><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration) = curdate() + INTERVAL 3 DAY and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration) = curdate() + INTERVAL 3 DAY and owner LIKE '%".$term1."%' ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users will be expiration </strong></a></center></th>';
            echo "</tr>";
echo '</table>';
		break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./2 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./2 ----------------------------------------------------------------------------------------------------------------------->';

case '2':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration) = curdate() and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration) = curdate() and owner LIKE '%".$term1."%'  ");
}

echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><ahref=admin.php?cont=show_change_service&username=' . $row['username'] . '><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-primary" href=index.php?cont=trial_user&name=' . $row['username'] . '><i class="fas fa-credit-card"></i>{AAAA57}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration)=curdate() and $term2 LIKE '%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE date(expiration)=curdate() and owner LIKE '%".$term1."%' ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users will be expiration</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
			break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./3 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./3 ----------------------------------------------------------------------------------------------------------------------->';

case '4':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid left join rm_wlan on rm_wlan.maccpe = radacct.callingstationid WHERE acctstoptime is NULL and $term2 LIKE N'%".$term."%' order by rm_users.username ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid left join rm_wlan on rm_wlan.maccpe = radacct.callingstationid WHERE acctstoptime is NULL and owner LIKE '%".$term1."%' order by rm_users.username ");
}

echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA48}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA51}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA56}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA52}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA53}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA54}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA55}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
$query1 = mysqli_query($link, "select * from rm_ap left join rm_wlan on rm_ap.ip = rm_wlan.apip right join radacct on rm_wlan.maccpe = radacct.callingstationid where username='" . $row[username] . "' and acctstoptime is null");
    while ($row1 = $query1->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<form method="post" action="disconnect.php" ><th><center><input class="form-control" type="hidden" name="name" value="' . $row['username'] . '">
<button type="submit" name="update"><strong>{AAAA48}</strong></center></th></form>';
        $query2 = mysqli_query($link, "select TIMEDIFF(now() , acctstarttime) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null ");
    while ($row2 = $query2->fetch_assoc()){            
echo '<th><center><a><strong>' . $row2['num'] . '</strong><br></a></center></th>';}
            echo '<th><center><a><strong>' . $row['calledstationid'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['callingstationid'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['framedipaddress'] . '"><strong>' . $row['framedipaddress'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['signal'] . '</strong><br></a></center></th>';
            echo '<th><center><a><strong>' . $row['ccq'] . '</strong><br></a></center></th>';
            echo '<th><center><a href="http://' . $row1['apip'] . '" ><strong>' . $row1['apip'] . '</strong><br></a></center></th>';
            echo "</tr>";
$i++;
}
}
echo '</table>';
echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2']; 
       $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid WHERE acctstoptime is NULL and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2']; 
       $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid WHERE acctstoptime is NULL and owner LIKE '%".$term1."%' ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users Online</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
		break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./4 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./4----------------------------------------------------------------------------------------------------------------------->';
}
        }
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./END Session ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./END Session ----------------------------------------------------------------------------------------------------------------------->';

 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./Start Session 2 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./Start Session 2 ----------------------------------------------------------------------------------------------------------------------->';
if ($_SESSION['AUTH_MANAGER'] != 'admin') 
{

switch ($_REQUEST['val']) {

case '';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' ");
}
echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<form method="post" action="">
<button class="btn bg-gradient-dark" type="submit" name="update">{AAAA68}</button></form>
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th><font face="Arial"><center><a>#</a></center></font></th>
        <th><font face="Arial"><center><a>{AAAA42}</a></center></font></th>';
	if (isset($_POST['update'])) {
            echo '<th><font face="Arial"><center><a>{AAAA67}</a></center></font></th>';}
          echo '<th><font face="Arial"><center><a>{AAAA45}</a></center></font></th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font></th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font></th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font></th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
	if (isset($_POST['update'])) {
            echo '<th><center><a><strong>' . $row['password'] . '</strong></a></center></th>';}
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><a><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-primary" href=index.php?cont=trial_user&name=' . $row['username'] . '><i class="fas fa-credit-card"></i>{AAAA57}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2']; 
       $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2']; 
       $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' All Users</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
		break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./all ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./all ----------------------------------------------------------------------------------------------------------------------->';

case '0':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2']; 
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration > LOCALTIME() and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2']; 
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration > LOCALTIME()  ");
}
echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr>
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><a><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
      $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration > LOCALTIME() and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
      $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration > LOCALTIME() ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users Active</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
break;

 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./0 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./0 ----------------------------------------------------------------------------------------------------------------------->';

case '1':
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration < LOCALTIME() and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration < LOCALTIME() ");
}
echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '<strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><a><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-primary" href=index.php?cont=trial_user&name=' . $row['username'] . '><i class="fas fa-credit-card"></i>{AAAA57}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration < LOCALTIME() and $term2 LIKE N'%".$term."%' ");
}
	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration < LOCALTIME() ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users Expires</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
break;

 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./1 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./1 ----------------------------------------------------------------------------------------------------------------------->';

case '3':    
 	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
   $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration) = curdate() + INTERVAL 3 DAY and $term2 LIKE N'%".$term."%' ");
}
 	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
   $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration) = curdate() + INTERVAL 3 DAY ");
}
echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '<strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><a><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
            echo "</tr>";
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
 	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration = LOCALTIME() + INTERVAL 3 DAY and $term2 LIKE N'%".$term."%' ");
}
 	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and expiration = LOCALTIME() + INTERVAL 3 DAY ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users will be expiration</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
break;

 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./2 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./2 ----------------------------------------------------------------------------------------------------------------------->';


case '2':
 	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration)=curdate() and $term2 LIKE N'%".$term."%' ");
}
 	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration)=curdate() ");
}
echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA45}</a></center></font> </th>
          <th><font face="Arial" ><center><a>{AAAA47}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA46}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['expiration'] . '<strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['staticipcpe'] . '"><strong>' . $row['staticipcpe'] . '</strong><br></a></center></th>';
            echo '<th><center><a><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center>
<a class="btn btn-app bg-gradient-info" href=index.php?cont=active_user&name=' . $row['username'] . '><i class="fas fa-edit"></i>{AAAA46}</a>
&nbsp;<a class="btn btn-app bg-gradient-primary" href=index.php?cont=trial_user&name=' . $row['username'] . '><i class="fas fa-credit-card"></i>{AAAA57}</a>
&nbsp;<a class="btn btn-app bg-gradient-warning" href="index.php?cont=update_user&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA44}</a>
&nbsp;<a class="btn btn-app bg-gradient-gray" href="index.php?cont=update_profile&name=' . $row['username'] . '"><i class="fas fa-users"></i>{AAAA66}</a>';
$n = mysqli_query($link, "select count(*) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null");
    while ($row3 = $n->fetch_assoc()){
if ($row3['num'] > 0){
            echo '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>{AAAA58}</a>';}
else {
            echo '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>{AAAA59}</a>';}}
if(strtotime("now") <= strtotime($row['expiration']) ){
echo '&nbsp;<a class="btn btn-app bg-gradient-success"><i class="fas fa-user-shield"></i>{AAAA64}</a>';}
else {
echo '&nbsp;<a class="btn btn-app bg-gradient-danger"><i class="fas fa-user-slash"></i>{AAAA65}</a>';}
echo '</center></th>';
$i++;
        }
echo '</table>';
echo '<table class="table" border="15">';
 	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration)=curdate() and $term2 LIKE N'%".$term."%' ");
}
 	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM rm_users LEFT JOIN rm_services ON rm_users.srvid = rm_services.srvid WHERE owner = '" . $_SESSION['AUTH_MANAGER'] . "' and date(expiration)=curdate() ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users will be expiration</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
break;

 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./3 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./3 ----------------------------------------------------------------------------------------------------------------------->';
case '4':
 	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid left join rm_wlan on rm_wlan.maccpe = radacct.callingstationid WHERE acctstoptime is NULL and owner = '" . $_SESSION['AUTH_MANAGER'] . "' and $term2 LIKE N'%".$term."%' order by rm_users.username ");
}
 	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];   
        $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid left join rm_wlan on rm_wlan.maccpe = radacct.callingstationid WHERE acctstoptime is NULL and owner = '" . $_SESSION['AUTH_MANAGER'] . "' order by rm_users.username  ");
}
echo '<div class"card">

<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<table class="table table-bordered table-hover table-striped nowrap" id="example1"><thead><tr> 
        <th> <font face="Arial"><center><a>#</a></center></font> </th> 
        <th> <font face="Arial"><center><a>{AAAA42}</a></a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA48}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA51}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA52}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA49}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA50}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA53}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA54}</a></center></font> </th>
          <th><font face="Arial"><center><a>{AAAA55}</a></center></font> </th>
      </tr></thead></div>';
$i=1;
    while ($row = $query->fetch_assoc()){
$query1 = mysqli_query($link, "select * from rm_ap left join rm_wlan on rm_ap.ip = rm_wlan.apip right join radacct on rm_wlan.maccpe = radacct.callingstationid where username='" . $row[username] . "' and acctstoptime is null");
    while ($row1 = $query1->fetch_assoc()){
            echo "<tr>";
            echo '<th><center><a> ' . $i . '</a></center></th>';
            echo '<th><center><a href="index.php?cont=edit_user&name=' . $row['username'] . '" ><strong>' . $row['username'] . '</strong></a></center></th>';
            echo '<form method="post" action="disconnect.php" ><th><center><input class="form-control" type="hidden" name="name" value="' . $row['username'] . '">
<button type="submit" name="update"><strong>{AAAA48}</strong></center></th></form>';
        $query2 = mysqli_query($link, "select TIMEDIFF(now() , acctstarttime) as num from radacct where username = '" . $row['username'] . "' and acctstoptime is null ");
    while ($row2 = $query2->fetch_assoc()){
            echo '<th><center><a><strong>' . $row2['num'] . '</strong><br></a></center></th>';}
            echo '<th><center><a><strong>' . $row['callingstationid'] . '</strong></a></center></th>';
            echo '<th><center><a href="http://' . $row['framedipaddress'] . '"><strong>' . $row['framedipaddress'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['srvname'] . '</strong></a></center></th>';
            echo '<th><center><a><strong>' . $row['signal'] . '</strong><br></a></center></th>';
            echo '<th><center><a><strong>' . $row['ccq'] . '</strong><br></a></center></th>';
            echo '<th><center><a href="http://' . $row1['apip'] . '" ><strong>' . $row1['apip'] . '</strong><br></a></center></th>';
            echo "</tr>";
$i++;
        }
}
echo '</table>';
echo '<table class="table" border="15">';
 	if (isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];    
       $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid WHERE acctstoptime is NULL and owner = '" . $_SESSION['AUTH_MANAGER'] . "' and $term2 LIKE N'%".$term."%'  ");
}
 	if (!isset($_POST['submit'])) {
		$term = $_POST['term'];
		$term2 = $_POST['term2'];    
       $query = mysqli_query($link, "SELECT * FROM radacct left join rm_users on radacct.username = rm_users.username inner join rm_services on rm_services.srvid = rm_users.srvid WHERE acctstoptime is NULL and owner = '" . $_SESSION['AUTH_MANAGER'] . "'  ");
}
$num_rows = mysqli_num_rows($query);
           echo "<tr>";
            echo '<th><center><a><strong>' . $num_rows . ' Users Online</strong></a></center></th>';
            echo "</tr>";
echo '</table>';
break;
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./4 ----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./4 ----------------------------------------------------------------------------------------------------------------------->';
}
}
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./END Session 2----------------------------------------------------------------------------------------------------------------------->';
 echo '<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ./END Session 2----------------------------------------------------------------------------------------------------------------------->';
}
?>