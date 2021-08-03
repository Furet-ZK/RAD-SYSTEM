<?php
session_start();

	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {
 
// DB table to use
$table = array(
    array('table'=>'rm_ap',  'as'=>'mt'),
); 
 
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'mt.name', 'dt' => 0 ),
    array( 'db' => 'mt.ip', 'dt' => 1 ),
    array( 'db' => 'mt.community', 'dt' => 2 ),
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => 'root123',
    'db'   => 'radius',
    'host' => 'localhost'
);

require( 'ssp.inc.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns , '', $where, $group_by, $having)
);

}