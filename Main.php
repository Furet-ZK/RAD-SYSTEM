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
echo '  
  <!--div class="preloader flex-column justify-content-center align-items-center dark-mode"
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div-->


<div class="wrapper">

    <!-- Header Navbar: style can be found in header.less -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">

    <ul class="navbar-nav ">

      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?cont=change_lang&lang=English" class="nav-link">English</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?cont=change_lang&lang=Arabic" class="nav-link">Arabic</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
</ul>
    </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

   <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>&nbsp;Band Link</b></span>
    </a>

     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b>' . $_SESSION['AUTH_MANAGER'] . '</b></a>
        </div>
      </div>

     <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

       <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {AAAA36}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?cont=list_users" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {AAAA29}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?cont=list_users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA2}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?cont=list_users&val=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA16}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?cont=list_users&val=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA37}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?cont=list_users&val=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA19}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?cont=list_users&val=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA18}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?cont=list_users&val=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA15}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {AAAA30}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?cont=new_user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA38}</p>
                </a>
              </li>';
if ($_SESSION['AUTH_MANAGER'] == 'admin'){
             echo '<li class="nav-item">
                <a href="index.php?cont=new_manager" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA39}</p>
                </a>
              </li>
<li class="nav-item">
                <a href="index.php?cont=new_services" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA131}</p>
                </a>
              </li>';}
echo '</ul></li>';
if ($_SESSION['AUTH_MANAGER'] == 'admin'){
         echo '<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {AAAA69}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?cont=wifi_ap" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA70}</p>
                </a>
              </li>
<li class="nav-item">
                <a href="index.php?cont=wifi_ap&val=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA71}</p>
                </a>
              </li>
</ul></li>';}
if ($_SESSION['AUTH_MANAGER'] == 'admin'){
         echo ' <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {AAAA31}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?cont=balance" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA40}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?cont=insert_trial&val=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA41}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?cont=insert_trial&val=" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{AAAA23}</p>
                </a>
              </li>
</ul>
</li>
	              <li class="nav-item">  
            <a href="index.php?cont=ip_setting" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA32}
              </p>
            </a></li>';}
	             echo '<li class="nav-item">  
            <a href="index.php?cont=list_services" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA33}
              </p>
            </a></li>

	              <li class="nav-item">  
            <a href="index.php?cont=log" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA34}
              </p>
            </a></li>';
if ($_SESSION['AUTH_MANAGER'] == 'admin'){
	              echo '
<li class="nav-item">  
            <a href="index.php?cont=list_managers" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA82}
              </p>
            </a></li>

<li class="nav-item">  
            <a href="index.php?cont=nas" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA78}
              </p>
            </a></li>
<li class="nav-item">  
            <a href="index.php?cont=system_restart" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA79}
              </p>
            </a></li>

<li class="nav-item">  
            <a href="index.php?cont=system_settings" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA135}
              </p>
            </a></li>

<li class="nav-item">  
            <a href="index.php?cont=search_con" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA80}
              </p>
            </a></li>

<li class="nav-item">  
            <a href="index.php?cont=options" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA134}
              </p>
            </a></li>';}
	              echo '<li class="nav-item">  
            <a href="index.php?cont=logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA35}
              </p>
            </a></li>

          <li class="nav-header">Language</li>
          <li class="nav-item">
            <a href="index.php?cont=change_lang&lang=English" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text"><strong>&nbsp;English</strong></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?cont=change_lang&lang=Arabic" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text"><strong>&nbsp;Arabic</strong></p>
            </a>
          </li>
        </ul>
      </nav>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="content">
<div class="card-body">
{CONTENT}</div>
</div></div></div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
    <b>{AAAA25}</b> {ACTMANAGER} | <b>{AAAA26}</b> {VER} | <b>{AAAA27}</b> {RADSTATUS} | <b>{AAAA28}</b> {DHCPDSTATUS}
    </div>
    <strong>Copyright &copy; 2021 <a href="http://192.168.183.129">Band Link</a>.</strong> All rights
    reserved.
  </footer>
</div>';
}
?>