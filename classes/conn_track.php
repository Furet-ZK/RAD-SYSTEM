<?php
session_start();
	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {

$conn = mysqli_connect('localhost',root,root123,conntrack);
mysqli_set_charset($conn, "utf8");
$res= mysqli_query($conn, "SELECT * FROM `tabidx` order by date desc limit 1");
    while ($row = $res->fetch_array()){

$da = $row['date'];

// DB table to use
$table = array(
    array('table'=>$da,  'as'=>'mt')
);

$primaryKey = 'username';
 
$columns = array(
    array( 'db' => 'mt.time', 'dt' => 0 ),
    array( 'db' => 'mt.username', 'dt' => 1 ),
    array( 'db' => 'mt.srcip',  'dt' => 2 ),
    array( 'db' => 'mt.dstip',     'dt' => 3 ),
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => 'root123',
    'db'   => 'conntrack',
    'host' => 'localhost'
);

require( 'ssp.inc.php' );}
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns , '', $where, $group_by, $having)
);
}