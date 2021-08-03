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

echo '<div class"card">
<div class="col-sm-12 col-md-12 lobipanel-parent-sortable ui-sortable">
<div class="card card-bd lobidrag lobipanel lobipanel-sortable">
<div class="card-body"><div style="overflow-x:auto;">
<center><table class="table" border="15" id="ss0">
<div class="box box-solid box-default"><thead><tr> 
        <td> <font face="Arial"><center><h3>{AAAA76}</h3></center></font> </td>
        <td> <font face="Arial"><center><h3>{AAAA75}</h3></center></font> </td>
      </tr></thead></div>';
echo '</table></center></div>';
}
?>
<script>
$(document).ready(function() {
    $('#ss0').DataTable( {
        "processing": true,
        "serverSide": true,
         "order": [[1,'asc']],
        "ajax": "classes/services.php"
    } );
} );
</script>
</body>
</html>