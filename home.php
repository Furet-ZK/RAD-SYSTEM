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
echo ' <div class="form-row">

        <div class="col-lg-3 col-xs-6">
          <a href="index.php?cont=list_users">
          <div class="small-box bg-gradient-blue">
            <div class="inner">
			
             <center><h3>{COUNT3}</h3><br><br>
              <p><b>{AAAA14}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-users"></i></div>
<div class="icon2"> <i class="fas fa-users"></i></div>
          </div></a>
        </div>

        <div class="col-lg-3 col-xs-6">
         <a href="index.php?cont=list_users&val=0">
          <div class="small-box bg-gradient-success">
            <div class="inner">
              <center><h3>{COUNT2}</h3><br><br>
              <p><b>{AAAA16}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user-shield"></i></div>
            <div class="icon2"><i class="fas fa-user-shield"></i></div>
          </div></a>
        </div>

        <div class="col-lg-3 col-xs-6">
<a href="index.php?cont=list_users&val=1">
          <div class="small-box bg-gradient-danger">
            <div class="inner">
              <center><h3>{COUNT4}</h3><br><br>
              <p><b>{AAAA81}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user-slash"></i></div>
            <div class="icon2"><i class="fas fa-user-slash"></i></div>
          </div></a>
        </div>

        <div class="col-lg-3 col-xs-6">
<a href="index.php?cont=list_users&val=4">
          <div class="small-box bg-gradient-dark">
            <div class="inner">
              <center><h3>{COUNT}</h3><br><br>
              <p><b>{AAAA15}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-signal"></i></div>
            <div class="icon2"><i class="fas fa-signal"></i></div>
          </div></a>
        </div>

        <div class="col-lg-3 col-xs-6">
<div class="small-box bg-gradient-info">
  <div class="inner">
              <center><h3>{BALANCE} {CURRENCY}</h3><br><br>
              <p><b>{AAAA17}</b></p></center>
  </div>
            <div class="icon3"><i class="fas fa-shopping-cart"></i></div>
            <div class="icon2"><i class="fas fa-shopping-cart"></i></div>
</div>
</div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-gradient-blue">
            <div class="inner">
			
              <center><h3>{Test_Balance}</h3><br><br>
              <p><b>{Test_Balance1}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-credit-card"></i></div>
            <div class="icon2"><i class="fas fa-credit-card"></i></div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
         <a href="index.php?cont=list_users&val=3">
          <div class="small-box bg-gradient-lightblue">
            <div class="inner">
              <center><h3>{Expire_3Days}</h3><br><br>
              <p><b>{AAAA62}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-users"></i></div>
            <div class="icon2"><i class="fas fa-users"></i></div>
          </div></a>
        </div>

        <div class="col-lg-3 col-xs-6">
          <a href="index.php?cont=list_users&val=2">
          <div class="small-box bg-gradient-navy">
            <div class="inner">
             <center> <h3>{Expire_Today}</h3><br><br>
              <p><b>{AAAA63}</b></p></center>
            </div>
            <div class="icon3"><i class="fas fa-user"></i></div>
            <div class="icon2"><i class="fas fa-user"></i></div>
          </div></a>
        </div>';

echo '        
         <div class="col-lg-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-navy">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><b>{AAAA12}</b></span>
              <span class="info-box-number"><center><p style="font-size:30px">{PING}</p></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>     
        
        <div class="col-lg-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-pink">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><b>{AAAA13}</b></span>
              <span class="info-box-number"><center><p style="font-size:30px">{PING2}</p></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></div>'; }
?>