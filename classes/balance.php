<?php
session_start();

	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {
 
// DB table to use
$table = array(
    array('table'=>'rm_managers',  'as'=>'mt'),
); 
 
$primaryKey = 'managername';
 
$columns = array(
    array( 'db' => 'mt.managername', 'dt' => 0 ),
    array( 'db' => 'mt.firstname', 'dt' => 1 ),
    array( 'db' => 'mt.balance', 'dt' => 2 ),
    array( 'db' => 'mt.testcurrent', 'dt' => 3 ),
    array( 'db' => 'mt.lastname', 'dt' => 4 ),
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