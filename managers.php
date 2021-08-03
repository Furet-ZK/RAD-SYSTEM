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

if ($_SESSION['AUTH_MANAGER'] == 'admin') {
        $query = mysqli_query($link, "SELECT * FROM rm_managers where managername != 'admin' ");

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body">
<div style="overflow-x:auto;">
<center><table class="table" border="15" id="m0">
<thead><tr> 
        <td> <font face="Arial"><center><h3>{AAAA82}</h3></center></font> </td>
        <td> <font face="Arial"><center><h3>{AAAA60}</h3></center></font> </td>
      </tr></thead></table></center></div></div></div></div></div></div>';
}}
?>

<script>
$(document).ready(function() {
    $('#m0').DataTable( {
        "processing": true,
        "serverSide": true,
    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        $('td:eq(0)', nRow).html( '<a class="btn bg-gradient-success btn-lg btn-block" href="index.php?cont=edit_manager&name='+ aData[0] +'"><center><h3 style="font-size: 24px;">'+ aData[0] +'</h3></center>' );
        $('td:eq(1)', nRow).html( '<a class="btn bg-gradient-dark btn-lg btn-block"><center><h3 style="font-size: 24px;">'+ aData[1] +'&nbsp;'+ aData[2] +'</h3></center></a>' );

    },
        "ajax": "classes/managers.php"
    } );
} );
</script>
</body>
</html>