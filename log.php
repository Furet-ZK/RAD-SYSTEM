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
echo '<center><nav class="mt-3">
  <form class="form-inline ml-3" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="term">
    <button class="btn bg-gradient-primary" type="submit" name="submit">Search</button>
  </form>
</nav></center><br>';

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;"><div class="card-body">
<center><table class="table table-bordered table-hover table-striped" id="example4">
<div class="box box-solid box-default"><thead><tr> 
        <td> <font face="Arial"><center>{AAAA72}</center></font> </td>
        <td> <font face="Arial"><center>{AAAA73}</center></font> </td>
        <td> <font face="Arial"><center>{AAAA74}</center></font> </td>
          <td><font face="Arial"><center>{AAAA75}</center></font> </td>
      </tr></thead></div>';
echo '</table></center>';

}
?>

<script>
$(document).ready(function() {
    $('#example4').DataTable( {
        "processing": true,
        "serverSide": true,
         "order": [[2,'desc']],
    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        $('td:eq(0)', nRow).html( '<a><center><strong>'+ aData[0] +'</strong></center>' );
        $('td:eq(1)', nRow).html( '<a><center><strong>'+ aData[1] +'</strong></center></a>' );
        $('td:eq(2)', nRow).html( '<a><center><strong>'+ aData[2] +'</strong></center></a>' );
        $('td:eq(3)', nRow).html( '<a><center><strong>'+ aData[3] +'</strong></center></a>' );
    },
        "ajax": "classes/logs.php"
    } );
} );
</script>
</body>
</html>
