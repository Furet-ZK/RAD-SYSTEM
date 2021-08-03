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

        $query = mysqli_query($link, "SELECT * FROM system_settings ");
    while ($row = $query->fetch_array()){
echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<form method="post" action="" id="q">
<table class="table" border="15">
<td><center><h3><div class="form-row"><div class="form-group col-md-12">
		<center><label><center><a>IP Address</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="address" value="' . $row['address'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>NetMask</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="netmask" value="' . $row['netmask'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Network</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="network" value="' . $row['network'] . '" ></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Broadcast</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="broadcast" value="' . $row['broadcast'] . '"></center>
	</div>
<div class="form-group col-md-6">
		<center><label><center><a>Gateway</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="gateway" value="' . $row['gateway'] . '"></center>
	</div>
<div class="form-group col-md-12">
		<center><label><center><a>DNS</a></center></label></center>
		<center><input style="text-align:center;" class="form-control" name="dns" value="' . $row['dns-nameservers'] . '"></center>
	</div>
<div class="form-group col-md-12">
		<?php if ($update == true): ?>
		<center><button class="btn bg-gradient-warning" type="submit" name="update"><h3 style="font-size: 24px;">Change</h3></button></center>
		<?php endif ?>
	</div></table></div></div></div></div>';

	if (isset($_POST['update'])) {
		$address = $_POST['address'];
		$netmask = $_POST['netmask'];
		$network = $_POST['network'];
		$broadcast = $_POST['broadcast'];
		$gateway = $_POST['gateway'];
		$dns = $_POST['dns'];

		$res= mysqli_query($link, "UPDATE nas SET nasname= '$ip', shortname= '$name', secret= '$secret', apiusername= '$apiu', apipassword= '$apip'");

                      $myfile = fopen("/etc/network/interfaces", "w") or die("Unable to open file!");
                      $txt = "";
                      fwrite($myfile, $txt);
                      $txt = "# This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto eth0
iface eth0 inet static
   hwaddress ether 00:00:5A:74:FD:29
	address $address
	netmask $netmask
	network $network
	broadcast $broadcast
	gateway $gateway
	# dns-* options are implemented by the resolvconf package, if installed
	dns-nameservers $dns
";
                      fwrite($myfile, $txt);
                      fclose($myfile);

		$res= mysqli_query($link, "UPDATE system_settings SET address= '$address' WHERE ID= '0' ");
		$res= mysqli_query($link, "UPDATE system_settings SET netmask= '$netmask' WHERE ID= '0' ");
		$res= mysqli_query($link, "UPDATE system_settings SET network= '$network' WHERE ID= '0' ");
		$res= mysqli_query($link, "UPDATE system_settings SET broadcast= '$broadcast' WHERE ID= '0' ");
		$res= mysqli_query($link, "UPDATE system_settings SET gateway= '$gateway' WHERE ID= '0' ");
		$res= mysqli_query($link, "UPDATE system_settings SET dns-nameserver= '$dns' WHERE ID= '0' ");


echo "<BR>";
echo "<script>window.location = 'index.php?cont=list_users';</script>";

}}


echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<table class="table" border="15">
<td><center><form method="post" action="" ><div class="form-row">
<div class="form-group col-md-6">
		<button class="btn bg-gradient-danger btn-block" type="submit" name="shutdown"><h3>Poweroff System</h3></button>
	</div>
<div class="form-group col-md-6">
		<button class="btn bg-gradient-primary btn-block" type="submit" name="reboot"><h3>Reboot</h3></button>
	</div></table></div></div></div></div></div></div>';

	if (isset($_POST['shutdown'])) {
shell_exec("sudo /sbin/shutdown -h now");}

	if (isset($_POST['reboot'])) {
shell_exec("sudo /sbin/shutdown -r now");}

}}


?>
<script>
$(function () {
  $('#q').validate({
    rules: {
      address: {
        required: true,
        minlength: 1
      },
      netmask: {
        required: true,
        minlength: 1
      },
      network: {
        required: true,
        minlength: 1
      },
      broadcast: {
        required: true,
        minlength: 1
      },
      gateway: {
        required: true,
        minlength: 1
      },
    },
    messages: {
      address: {
        required: "Please ADD the ADDRESS",
      },
      network: {
        required: "Please ADD the Network",
      },
      netmask: {
        required: "Please ADD the Netmask",
      },
      broadcast: {
        required: "Please ADD the Broadcast",
      },
      gateway: {
        required: "Please ADD the Gateway",
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