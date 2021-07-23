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
echo '    <!-- Small boxes (Stat box) -->
      <div class="form-row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
		<!-- small box -->
          <div class="small-box bg-gradient-blue">
            <div class="inner">
			
              <h3 style="font-size: 24px;">{AAAA2}</h3>

              <p>{AAAA2}</p>
            </div>
            <div class="icon">
	       <i class="fas fa-users"></i>
            </div>
            <a href="index.php?cont=list_users" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

 <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-success">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA16}</h3>
              <p>{AAAA16}</p>
            </div>
            <div class="icon">
            <i class="fas fa-user-shield"></i>
            </div>
            <a href="index.php?cont=list_users&val=0" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-danger">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA6}</h3>

              <p>{AAAA6}</p>
            </div>
            <div class="icon">
            <i class="fas fa-user-slash"></i>
            </div>
            <a href="index.php?cont=list_users&val=1" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-dark">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA15}</h3>

              <p>{AAAA15}</p>
            </div>
            <div class="icon">
	       <i class="fas fa-signal"></i>

            </div>
            <a href="index.php?cont=list_users&val=4" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      <!-- /.row --> 

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-indigo">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA24}</h3>
              <p>{AAAA24}</p>
            </div>
            <div class="icon">
            <i class="fas fa-plus"></i>
            </div>
            <a href="index.php?cont=new_user" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-fuchsia">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA4}</h3>

              <p>{AAAA4}</p>
            </div>
            <div class="icon">
            <i class="fas fa-user"></i>
            </div>
            <a href="index.php?cont=list_services" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
<div class="small-box bg-gradient-info">
  <div class="inner">
              <h3 style="font-size: 24px;">{BALANCE} {CURRENCY}</h3>
              <p>{AAAA17}</p>
  </div>
  <div class="icon">
    <i class="fas fa-shopping-cart"></i>
  </div>
  <a href="#" class="small-box-footer">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>
</div>

        <div class="col-lg-3 col-xs-6">
		<!-- small box -->
          <div class="small-box bg-gradient-blue">
            <div class="inner">
			
              <h3 style="font-size: 24px;">{Test_Balance}</h3>

              <p>{Test_Balance1}</p>
            </div>
            <div class="icon">
	       <i class="fas fa-credit-card"></i>
            </div>
            <a href="users.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-lightblue">
            <div class="inner">
              <h3 style="font-size: 24px;">{Expire_3Days}</h3>

              <p>{AAAA62}</p>
            </div>
            <div class="icon">
            <i class="fas fa-users"></i>
            </div>
            <a href="index.php?cont=list_users&val=3" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
<!-- /.col -->

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-navy">
            <div class="inner">
              <h3 style="font-size: 24px;">{Expire_Today}</h3>

              <p>{AAAA63}</p>
            </div>
            <div class="icon">
            <i class="fas fa-user"></i>
            </div>
            <a href="index.php?cont=list_users&val=2" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>';
if ($_SESSION['AUTH_MANAGER'] == 'admin'){
echo '<!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-indigo">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA7}</h3>

              <p>{AAAA7}</p>
            </div>
            <div class="icon">
            <i class="fas fa-chart-line"></i>
            </div>
            <a href="index.php?cont=search_con" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

<!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-maroon">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA9}</h3>

              <p>{AAAA9}</p>
            </div>
            <div class="icon">
            <i class="fas fa-wifi"></i>
            </div>
            <a href="index.php?cont=wifi_ap&val=2" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-red">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA10}</h3>

              <p>{AAAA10}</p>
            </div>
            <div class="icon">
            <i class="fas fa-signal"></i>
            </div>
            <a href="index.php?cont=wifi_ap" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-success">
            <div class="inner">
              <h3 style="font-size: 24px;">{AAAA11}</h3>

              <p>{AAAA11}</p>
            </div>
            <div class="icon">
            <i class="fas fa-edit"></i>
            </div>
            <a href="index.php?cont=nas" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gradient-blue">
            <div class="inner">
              <h3 style="font-size: 24px;">{Test_add}</h3>

              <p>{Test_add}</p>
            </div>
            <div class="icon">
            <i class="fas fa-cube"></i>
            </div>
            <a href="index.php?cont=insert_trial&val=1" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          
		<!-- small box -->
          <div class="small-box bg-gradient-indigo">
            <div class="inner">
			
              <h3 style="font-size: 24px;">{Test_add1}</h3>

              <p>{Test_add1}</p>
            </div>
            <div class="icon">
	       <i class="fas fa-credit-card"></i>
            </div>
            <a href="index.php?cont=insert_trial&val=" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>';}

echo '<div class="col-md-12">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-navy">
            <div class="info-box-content">
              <span class="info-box-text"><center><h2><div id="clock_iq"></div></h2></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
<div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-primary">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
        
            <div class="info-box-content">
              <span class="info-box-text">{AAAA25}</span>
              <span class="info-box-number">{ACTMANAGER}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-danger">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{AAAA26}</span>
              <span class="info-box-number"> {VER} </span></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

          <div class="col-md-6">
            <!-- Info Boxes Style 3 -->
            <div class="info-box mb-3 bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{AAAA17}</span>
                <span class="info-box-number"><p style="font-size:30px">{BALANCE} {CURRENCY}</p></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
	</div>

          <div class="col-md-6">
            <!-- Info Boxes Style 3 -->
            <div class="info-box mb-3 bg-gradient-maroon">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{AAAA14}</span>
                <span class="info-box-number"><p style="font-size:30px">{COUNT3}</p></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
	</div>

          <div class="col-md-6">
            <!-- Info Boxes Style 3 -->
            <div class="info-box mb-3 bg-gradient-indigo">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{AAAA16}</span>
                <span class="info-box-number"><p style="font-size:30px">{COUNT2}</p></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
	</div>

          <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-lightblue">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{AAAA15}</span>
                <span class="info-box-number"><p style="font-size:30px">{COUNT}</p></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
	</div>

          <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-gray-dark">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{AAAA27}</span>
                <span class="info-box-number">{DHCPDSTATUS}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
	</div>

          <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-info">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{AAAA28}</span>
                <span class="info-box-number">{RADSTATUS}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
         <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-navy">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{AAAA12}</span>
              <span class="info-box-number"><center><p style="font-size:30px">{PING}</p></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>     
        
        <div class="col-md-6">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-gradient-pink">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{AAAA13}</span>
              <span class="info-box-number"><center><p style="font-size:30px">{PING2}</p></center></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></div>'; }
?>