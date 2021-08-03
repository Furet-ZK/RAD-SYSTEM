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
	// initialize variables
	$update = true;
echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<!-----------<div style="overflow-x:auto;">/--------->
<table class="table" border="15"><td>
<center><form method="post" action="" id="q">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">{AAAA107}</label>
      <input style="text-align:center;" type="text" class="form-control" name="srvname" placeholder="{AAAA107}">
    </div>
    <div class="form-group col-md-6">
      <label for="password">{AAAA108}</label>
      <input style="text-align:center;" type="text" class="form-control" name="pool" placeholder="{AAAA108}">
    </div>
  <div class="form-group col-md-6">
    <label for="lastname">{AAAA110}</label>
    <input style="text-align:center;" type="text" class="form-control" name="price" placeholder="{AAAA110}">
  </div>
    <div class="form-group col-md-6">
      <label for="phone">{AAAA111}</label>
      <input style="text-align:center;" type="text" class="form-control" name="disco" placeholder="{AAAA111}">
    </div>
  <div class="form-group col-md-6">
    <label for="firstname">{AAAA109}</label>
    <input style="text-align:center;" type="text" class="form-control"  value ="30" name="expire" placeholder="{AAAA109}">
  </div>
    <div class="form-group col-md-6">
      <label for="discount">{AAAA112}</label>
      <select style="text-align:center;" name="ignore" class="form-control">
<option value="0">no</option>
<option value="1">Yes</option>
</select>
    </div>
    <div class="form-group col-md-6">
      <label for="phone">{AAAA113}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="dlrate" placeholder="0 = Unlimited / Kbps">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">{AAAA114}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="uprate" placeholder="0 = Unlimited / Kbps">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">{AAAA115}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="dldoli" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">{AAAA116}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="dlupli" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-12">
      <label for="discount">{AAAA129}</label>
      <select style="text-align:center;" name="enbu" class="form-control">
       <option value="1">YES</option>
        <option value="0" selected>No</option>
</select>
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA117}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="dbl" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA118}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="ubl" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA119}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="dbt" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA120}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="ubt" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">{AAAA121}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="dbti" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">{AAAA122}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="upti" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-4">
      <label for="phone">{AAAA123}</label>
      <input style="text-align:center;" type="text" class="form-control"  value ="8" name="prt" placeholder="8 = Default">
    </div>
    <div class="form-group col-md-12">
      <label for="discount">{AAAA130}</label>
      <select style="text-align:center;" name="enqu" class="form-control">
       <option value="1">YES</option>
        <option value="0" selected>No</option>
</select>
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA125}</label>
      <input style="text-align:center;" type="text" class="form-control"  value ="0" name="dlq" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA126}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="upq" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA127}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="toq" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-3">
      <label for="phone">{AAAA128}</label>
      <input style="text-align:center;" type="text" class="form-control" value ="0" name="tiq" placeholder="0 = Unlimited">
    </div>
    <div class="form-group col-md-12">
      <label for="discount">{AAAA124}</label>
      <select style="text-align:center;" name="exp" class="form-control">';
        $query = mysqli_query($link, "select * from rm_services ");
    while ($row = $query->fetch_array()){
 echo ' <option value="' . $row['srvid'] . '">' . $row['srvname'] . '</option>';}
 echo ' <option value="" selected>none</option>';
echo '</select>
    </div>
<div class="md-form col-md-12">
		<?php if ($update == true): ?>
		<br><button class="btn bg-gradient-dark" type="submit" name="update" ><h3 style="font-size: 24px;">{AAAA132}</h3></button></center>
		<?php endif ?>
	</div></table></div></div></div></div></div>';
	if (isset($_POST['update'])) {
		$srvname = $_POST['srvname'];
		$pool = $_POST['pool'];
		$expire = $_POST['expire'];
		$price = $_POST['price'];
		$disco = $_POST['disco'];
		$ignore = $_POST['ignore'];
		$dlrate = $_POST['dlrate'];
		$uprate = $_POST['uprate'];
		$dldoli = $_POST['dldoli'];
		$dlupli = $_POST['dlupli'];
		$dbl = $_POST['dbl'];
		$ubl = $_POST['ubl'];
		$dbt = $_POST['dbt'];
		$ubt = $_POST['ubt'];
		$dbti = $_POST['dbti'];
		$ubti = $_POST['ubti'];
		$dlq = $_POST['dlq'];
		$upq = $_POST['upq'];
		$toq = $_POST['toq'];
		$tiq = $_POST['tiq'];
		$exp = $_POST['exp'];
		$enbu = $_POST['enbu'];
		$enqu = $_POST['enqu'];
-
	$test = mysqli_query($link, " SELECT COUNT(*) AS num FROM rm_services WHERE srvname = '$srvname' ");
       while($row = mysqli_fetch_array($test)){
    if($row['num'] > 0)
    {
echo '<br>';
        print "الاشتراك موجود مسبقا\n";
    } else {
		$res = mysqli_query($link, "INSERT INTO `rm_services` (`srvname`, `descr`, `downrate`, `uprate`, `limitdl`, `limitul`, `limitcomb`, `limitexpiration`, `limituptime`, `poolname`, `unitprice`, `unitpriceNM`, `unitpriceadd`, `timebaseexp`, `timebaseonline`, `timeunitexp`, `timeunitonline`, `trafficunitdl`, `trafficunitul`, `trafficunitcomb`, `inittimeexp`, `inittimeonline`, `initdl`, `initul`, `inittotal`, `srvtype`, `timeaddmodeexp`, `timeaddmodeonline`, `trafficaddmode`, `monthly`, `enaddcredits`, `minamount`, `minamountadd`, `resetctrdate`, `resetctrneg`, `pricecalcdownload`, `pricecalcupload`, `pricecalcuptime`, `unitpricetax`, `unitpriceaddtax`, `enableburst`, `dlburstlimit`, `ulburstlimit`, `dlburstthreshold`, `ulburstthreshold`, `dlbursttime`, `ulbursttime`, `enableservice`, `dlquota`, `ulquota`, `combquota`, `timequota`, `priority`, `nextsrvid`, `dailynextsrvid`, `disnextsrvid`, `availucp`, `renew`, `carryover`, `policymapdl`, `policymapul`, `custattr`, `gentftp`, `cmcfg`, `advcmcfg`, `addamount`, `ignstatip`) 
					VALUES ('$srvname', '', '$dlrate', '$uprate', '$dldoli', '$dlupli', '0', '1', '0', '$pool', '$price', '$disco', '$price', '2', '0', '$expire', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2', '1', '0', '1', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '$enbu', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '8', '8', '-1', '-1', '0', '0', '0', '', '', '', '0', '', '0', '1', '$ignore'); ");
if ($enbu == '1') {
		$res = mysqli_query($link, "UPDATE `rm_services` SET dlburstlimit='$dbl', ulburstlimit='$ubl', dlburstthreshold='$dbt', ulburstthreshold='$ubt', dlbursttime='dbti', ulbursttime='$ubti' where srvname = '$srvname' ");}
if ($enqu == '1') {
		$res = mysqli_query($link, "UPDATE `rm_services` SET dlquota='$dlq', ulquota='$upq', combquota='$toq', timequota='$tiq' where srvname = '$srvname' ");}

		$res = mysqli_query($link, "INSERT INTO `logs`(`name`, `log`, `time`) VALUES ('" . $_SESSION['AUTH_MANAGER'] . "', 'service name add ($srvname) ' ,localtime())");

echo "{AAAA133}";
echo "<BR>";
echo "<script>window.location = 'index.php';</script>";
}}}}
echo '</table></div>';}
?>
<script>
$(function () {
  $('#q').validate({
    rules: {
      srvname: {
        required: true,
        minlength: 1
      },
      pool: {
        required: true,
        minlength: 1
      },
      price: {
        required: true,
        minlength: 1
      },
      disco: {
        required: true,
        minlength: 1
      },
    },
    messages: {
      srvname: {
        required: "Please ADD a Service Name",
      },
      pool: {
        required: "Please ADD a Pool Name",
        minlength: "Your pool must be at least 1 characters long"
      },
      price: {
        required: "Please ADD a Subscripe Price",
        minlength: "Your pool must be at least 1 characters long"
      },
      disco: {
        required: "Please ADD a Subscripe Discount Price",
        minlength: "Your pool must be at least 1 characters long"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>