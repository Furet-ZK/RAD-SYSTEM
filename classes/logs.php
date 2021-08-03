<?php
session_start();
 	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {

// DB table to use
$table = array(
    array('table'=>'logs',  'as'=>'mt'),
); 
 
// Table's primary key
$primaryKey = 'ID';
 
$columns = array(
    array( 'db' => 'mt.name', 'dt' => 0 ),
    array( 'db' => 'mt.log', 'dt' => 1 ),
    array( 'db' => 'mt.time',    'dt' => 2 ),
    array( 'db' => 'mt.price', 'dt' => 3 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'root123',
    'db'   => 'radius',
    'host' => 'localhost'
);

if ($_SESSION['AUTH_MANAGER'] != 'admin'){
$where = "mt.name = '" . $_SESSION['AUTH_MANAGER'] . "' ";}

require( 'ssp.inc.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns , '', $where, $group_by, $having)
);

}