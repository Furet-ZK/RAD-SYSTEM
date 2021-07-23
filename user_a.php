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
echo '

<div class="wrapper">

    <!-- Header Navbar: style can be found in header.less -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">

    <ul class="navbar-nav ">

      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="user.php?cont=change_lang&lang=English" class="nav-link">English</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="user.php?cont=change_lang&lang=Arabic" class="nav-link">Arabic</a>
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
          <a href="#" class="d-block"><b>' . $_SESSION['AUTH_USER'] . '</b></a>
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
            <a href="user.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {AAAA36}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
<li class="nav-item">  
            <a href="user.php?cont=logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                {AAAA35}
              </p>
            </a></li>

          <li class="nav-header">Language</li>
          <li class="nav-item">
            <a href="user.php?cont=change_lang&lang=English" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text"><strong>&nbsp;English</strong></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="user.php?cont=change_lang&lang=Arabic" class="nav-link">
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
    <strong>Copyright &copy; 2021 <a href="http://192.168.183.129">Band Link</a>.</strong> All rights
    reserved.
  </footer>
</div>';
}
?>