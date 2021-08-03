<html>
<body>
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
	// initialize variables
	$update = true;

echo '<div class"card">
<div class="row">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<!-----------<div style="overflow-x:auto;">/--------->
<table class="table" border="15"><td>
<center><form method="post" action="" id="quickForm">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">{AAAA42}</label>
      <input style="text-align:center;" type="text" class="form-control" name="username" placeholder="{AAAA42}">
    </div>
    <div class="form-group col-md-6">
      <label for="password">{AAAA85}</label>
      <input style="text-align:center;" type="password" class="form-control" name="password" placeholder="{AAAA85}">
    </div>
  <div class="form-group col-md-6">
    <label for="firstname">{AAAA60}</label>
    <input style="text-align:center;" type="text" class="form-control" name="firstname" placeholder="{AAAA60}">
  </div>
  <div class="form-group col-md-6">
    <label for="lastname">{AAAA61}</label>
    <input style="text-align:center;" type="text" class="form-control" name="lastname" placeholder="{AAAA61}">
  </div>
    <div class="form-group col-md-6">
      <label for="phone">{AAAA98}</label>
      <input style="text-align:center;" type="text" class="form-control" name="phone">
    </div>
    <div class="form-group col-md-6">
      <label for="ipaddress">{AAAA49}</label>
      <input style="text-align:center;" type="text" class="form-control" name="ipaddress" placeholder="{AAAA101}">
    </div>
  <div class="form-group col-md-12">
    <label for="address">{AAAA97}</label>
    <input style="text-align:center;" type="text" class="form-control" name="address" placeholder="{AAAA97}">
  </div>
<div class="md-form col-md-12">
		<br><button class="btn bg-gradient-dark" type="submit" name="update" ><h3 style="font-size: 24px;">{AAAA102}</h3></button></center>
	</div>';
echo'</table></div>';}
?>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 5
      },
    },
    messages: {
      username: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
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
</body>
</html>


