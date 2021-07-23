<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RAD SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets2/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets2/css/themify-icons.css">
    <link rel="stylesheet" href="assets2/css/metisMenu.css">
    <link rel="stylesheet" href="assets2/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets2/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets2/css/typography.css">
    <link rel="stylesheet" href="assets2/css/default-css.css">
    <link rel="stylesheet" href="assets2/css/styles.css">
    <link rel="stylesheet" href="assets2/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets2/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<?php       
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
session_start();

	if ($_SESSION['AUTH_USER'] == '') {

    $host = "localhost";  
    $user = "root";  
    $password = 'root123';  
    $db_name = "radius";  
      
    $con = mysqli_connect($host, $user, $password, $db_name); 

        $sql = "select * from radacct where framedipaddress = '" . $_SERVER['REMOTE_ADDR'] . "' and acctstoptime is null ";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

if ($_REQUEST['user'] = $row['username']) {
          
        if($count == 1){  
		setcookie('login_user', $row['username'], time() + 60 * 60 * 24 * 365);
		$_SESSION['AUTH_USER'] = strtolower($row['username']);
            echo '<META http-equiv="refresh" content="0;URL= user.php">';  }} else {

  echo '

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                        <form name="form1" action = "" onsubmit = "return validation()" method = "POST">  
                    <div class="login-form-head">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Admin</label>
                            <input type="text" name="user">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="pass">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button type="submit" name="login">Submit <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                            </div>
                        </div>
                    </div>

    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
</script>

    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets2/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets2/js/popper.min.js"></script>
    <script src="assets2/js/bootstrap.min.js"></script>
    <script src="assets2/js/owl.carousel.min.js"></script>
    <script src="assets2/js/metisMenu.min.js"></script>
    <script src="assets2/js/jquery.slimscroll.min.js"></script>
    <script src="assets2/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets2/js/plugins.js"></script>
    <script src="assets2/js/scripts.js"></script>';

	if (isset($_POST['login'])) {
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    $lang = $_POST['lang'];  

        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from rm_users where username = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
		setcookie('login_user', $username, time() + 60 * 60 * 24 * 365);
		$_SESSION['AUTH_USER'] = strtolower($username);
            echo '<META http-equiv="refresh" content="0;URL= user.php">';  }  
        else{  
            echo "<p5> Login failed. Invalid username or password.</p5>";}    
 } 

}}

	if ($_SESSION['AUTH_USER'] != '') {
header("Location: user.php"); }
echo             '  </form></div></div></div>';
?>
</body>

</html>