<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start(); 
	if ($_SESSION['AUTH_USER'] == '') {
header("Location: login_user.php");
    }
    else {
echo ' <div class="form-row">

        <div class="col-lg-3 col-xs-6">
          <a>
          <div class="small-box bg-gradient-indigo">
            <div class="inner">
			
             <center><h3>{AAAA42}</h3><br><br>
              <p><b>' . $_SESSION['AUTH_USER'] . '</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-users"></i></div>
<div class="icon2"> <i class="fas fa-users"></i></div>
          </div></a>
        </div>';

$query = mysqli_query($link, "select * from rm_users where username = '" . $_SESSION['AUTH_USER'] . "' ");
    while ($row = $query->fetch_array()){

if(strtotime("now") <= strtotime($row['expiration']) ){

echo '<div class="col-lg-3 col-xs-6">
          <a>
          <div class="small-box bg-gradient-success">
            <div class="inner">
			
             <center><h3>{AAAA43}</h3><br><br>
              <p><b>{AAAA64}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user"></i></div>
<div class="icon2"> <i class="fas fa-user"></i></div>
          </div></a>
        </div>';} else {

echo '<div class="col-lg-3 col-xs-6">
          <a>
          <div class="small-box bg-gradient-danger">
            <div class="inner">
			
             <center><h3>{AAAA43}</h3><br><br>
              <p><b>{AAAA65}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user"></i></div>
<div class="icon2"> <i class="fas fa-user"></i></div>
          </div></a>
        </div>';}}

$query = mysqli_query($link, "select * from rm_users left join rm_services on rm_users.srvid = rm_services.srvid where username = '" . $_SESSION['AUTH_USER'] . "' ");
    while ($row = $query->fetch_array()){
        
     echo '             <div class="col-lg-3 col-xs-6">
          <a>
          <div class="small-box bg-gradient-danger">
            <div class="inner">
			
             <center><h3>{AAAA45}</h3><br><br>
              <p><b>' . $row['firstname'] . '&nbsp;' . $row['lastname'] . '</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user"></i></div>
<div class="icon2"> <i class="fas fa-user"></i></div>
          </div></a>
        </div>

<div class="col-lg-3 col-xs-6">
          <a>
          <div class="small-box bg-gradient-info">
            <div class="inner">
			
             <center><h3>{AAAA47}</h3><br><br>
              <p><b>' . $row['expiration'] . '</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user-slash"></i></div>
<div class="icon2"> <i class="fas fa-user-slash"></i></div>
          </div></a>
        </div>

  <div class="col-lg-6 col-xs-6">
          <a>
          <div class="small-box bg-gradient-success">
            <div class="inner">
			
             <center><h3>{AAAA50}</h3><br><br>
              <p><b>' . $row['srvname'] . '</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-credit-card"></i></div>
<div class="icon2"> <i class="fas fa-credit-card"></i></div>
          </div></a>
        </div>';

$query = mysqli_query($link, "select * from radacct where username = '" . $_SESSION['AUTH_USER'] . "' and acctstoptime is null ");
    while ($row = $query->fetch_array()){

echo '  <div class="col-lg-6 col-xs-6">
          <a href="http://' . $row['framedipaddress'] . '">
          <div class="small-box bg-gradient-secondary">
            <div class="inner">
			
             <center><h3>{AAAA49}</h3><br><br>
              <p><b>' . $row['framedipaddress'] . '</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user-shield"></i></div>
<div class="icon2"> <i class="fas fa-user-shield"></i></div>
          </div></a>
        </div>'; }}

$query = mysqli_query($link, "select * from radacct left join rm_wlan on radacct.callingstationid = rm_wlan.maccpe where username = '" . $_SESSION['AUTH_USER'] . "' and acctstoptime is null ");
    while ($row = $query->fetch_array()){

echo'  <div class="col-lg-12 col-xs-6">
          <a>
          <div class="small-box bg-gradient-blue">
            <div class="inner">
			
             <center><h3>{AAAA52}</h3><br><br>
              <p><b>' . $row['callingstationid'] . '</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-users"></i></div>
<div class="icon2"> <i class="fas fa-users"></i></div>
          </div></a>
        </div>

 <div class="col-lg-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-navy">
              <span class="info-box-icon"><i class="fas fa-signal"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><b>{AAAA53}</b></span>
              <span class="info-box-number"><center><p>&nbsp;' . $row['signal'] . '</p></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

<div class="col-lg-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-teal">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><b>{AAAA54}</b></span>
              <span class="info-box-number"><center><p>&nbsp;' . $row['ccq'] . ' </p></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>';}

        $query2 = mysqli_query($link, "select TIMEDIFF(now() , acctstarttime) as num from radacct where username = '" . $_SESSION['AUTH_USER'] . "' and acctstoptime is null ");
    while ($row2 = $query2->fetch_array()){          
echo '<div class="col-lg-12">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-blue">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><b>{AAAA51}</b></span>
              <span class="info-box-number"><center><p>' . $row2['num'] . '</p></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>  ';}


echo '</div>'; }
?>