<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Band Link</title>
<link rel="icon" href="dist/img/AdminLTELogo.png" type="image/icon type">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<script src="plugins/jquery/jquery.min.js"></script>
<script src="count/count.js"></script>
  <link rel="stylesheet" href="dist/css/icon.css"
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition layout-fixed layout-footer-fixed sidebar-mini">

<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();

$_SESSION['_acptimeout'] = time();

	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: login.php");
    }
    else {

if ($_REQUEST['cont'] == 'change_lang') {
	setcookie('_lang', $_REQUEST['lang'], time() + 60 * 60 * 24 * 365);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} 

if ($_REQUEST['cont'] == 'logout') {
session_start();
if (isset($_SESSION['AUTH_MANAGER'])) {
   unset($_SESSION['AUTH_MANAGER']);
}
session_destroy();
header('Location: login.php');}

$admin = $_SESSION['AUTH_MANAGER'];

$link = mysqli_connect('127.0.0.1',root,root123,radius);
mysqli_set_charset($link, "utf8");
$conn = mysqli_connect('localhost',root,root123,conntrack);
mysqli_set_charset($conn, "utf8");

include("table.php");
$a = '<div class="row" id="ping"></div>';
$a1 = '<div class="row" id="ping2"></div>';

if ($_COOKIE['_lang'] == ''){
$filename = 'lang/English/texts.txt';}
if ($_COOKIE['_lang'] == 'Arabic'){
$filename = 'lang/Arabic/texts.txt';}
if ($_COOKIE['_lang'] == 'English'){
$filename = 'lang/English/texts.txt';}
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    list($placeholder, $replacement) = explode(']', $line);
    $trans[$placeholder] = $replacement;
}

ob_start();
include("Main.php");
$str_sidebar2 = ob_get_clean();
ob_start();
include_once("home.php");
$str_sidebar = ob_get_clean();

switch ($_REQUEST['cont']) {
case '':

$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'list_users':
ob_start();
include("users.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'new_user':
ob_start();
include("new.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'new_manager':
ob_start();
include("new_manager.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;

case 'new_services':
ob_start();
include("new_services.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
case 'ip_setting':
ob_start();
include("ip.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'log':
ob_start();
include("log.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'list_services':
ob_start();
include("services.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'active_user':
ob_start();
include("activeuser.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'edit_user':
ob_start();
include("edituser.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'balance':
ob_start();
include("test_balance.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
case 'wifi_ap':
ob_start();
include("wifi_ap.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
case 'insert_trial':
ob_start();
include("insert_trial.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'trial_user':
ob_start();
include("trial_active.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
case 'update_user':
ob_start();
include("update_user.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;

case 'update_profile':
ob_start();
include("update_profile.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;

case 'extension':
ob_start();
include("extension.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;

case 'system_restart':
ob_start();
include("system.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
case 'nas':
ob_start();
include("nas.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
case 'search_con':
ob_start();
include("search_cts.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
case 'search_con_cts':
ob_start();
include("cts.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;

case 'list_managers':
ob_start();
include("managers.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;

case 'edit_service':
ob_start();
include("editservice.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;

case 'edit_manager':
ob_start();
include("editmanager.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
case 'options':
ob_start();
include("options.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;

case 'system_settings':
ob_start();
include("system_settings.php");
$str_sidebar = ob_get_clean();
$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);
		break;
}

$page = str_replace('{BALANCE}', $ba, $page);
$page = str_replace('{CURRENCY}', $cu, $page);
$page = str_replace('{Test_Balance}', $te, $page);
$page = str_replace('{COUNT}', $count1, $page);
$page = str_replace('{COUNT2}', $count2, $page);
$page = str_replace('{COUNT3}', $count3, $page);
$page = str_replace('{COUNT4}', $count4, $page);
$page = str_replace('{PING}', $a, $page);
$page = str_replace('{PING2}', $a1, $page);
$page = str_replace('{RADSTATUS}', "OK", $page);
$page = str_replace('{DHCPDSTATUS}', "OK", $page);
$page = str_replace('{ACTMANAGER}', $admin, $page);
$page = str_replace('{VER}', "1.0", $page);
$page = str_replace('{Expire_Today}', $Expire, $page);
$page = str_replace('{Expire_3Days}', $Expire3, $page);
$page = str_replace('{Time}', $time, $page);
$cd = strtr($page, $trans);
echo $cd;
}
?>
</form>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": false,
      "processing": true,
      "paging": true,
      "lengthChange": false,
       "pageLength": 10,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis", "pageLength"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    $("#example1").DataTable({
      "responsive": false,
      "paging": true,
      "lengthChange": false,
       "pageLength": 10,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis", "pageLength"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": false,
      "paging": true,
      "lengthChange": false,
       "pageLength": 10,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis", "pageLength"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
});
</script>

<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
</body>
</html>