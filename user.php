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
  <link rel="stylesheet" href="dist/css/icon2.css"
</head>
<body class="hold-transition layout-fixed layout-footer-fixed">

<?php 
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();

$_SESSION['_acptimeout'] = time();

	if ($_SESSION['AUTH_USER'] == '') {
header("Location: login_user.php");
    }
    else {

if ($_REQUEST['cont'] == 'change_lang') {
	setcookie('_lang', $_REQUEST['lang'], time() + 60 * 60 * 24 * 365);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} 

if ($_REQUEST['cont'] == 'logout') {
session_start();
if (isset($_SESSION['AUTH_USER'])) {
   unset($_SESSION['AUTH_USER']);
}
session_destroy();
header('Location: login_user.php');}

$admin = $_SESSION['AUTH_USER'];

$link = mysqli_connect('localhost',root,root123,radius);
mysqli_set_charset($link, "utf8");
$conn = mysqli_connect('localhost',root,root123,conntrack);
mysqli_set_charset($conn, "utf8");

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
include("user_a.php");
$str_sidebar2 = ob_get_clean();
ob_start();
include_once("user_b.php");
$str_sidebar = ob_get_clean();

switch ($_REQUEST['cont']) {
case '':

$page = str_replace('{CONTENT}', $str_sidebar, $str_sidebar2);

		break;
}

$cd = strtr($page, $trans);
echo $cd;
}
?>
</form>

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