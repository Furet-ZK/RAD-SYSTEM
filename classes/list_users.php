<?php
session_start();
	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {

// DB table to use
$table = array(
    array('table'=>'rm_users',  'as'=>'mt'),
    array('table'=>'rm_services', 'as'=>'jt1', 'join_type'=>'INNER', 'join_on'=>'mt.srvid  = jt1.srvid'),
); 

$primaryKey = 'username';
 
$columns = array(
    array( 'db' => 'mt.username', 'dt' => 0 ),
    array( 'db' => 'mt.username', 'dt' => 1 ),
    array( 'db' => 'mt.firstname',  'dt' => 2 ),
    array( 'db' => 'mt.expiration',     'dt' => 3 ),
    array( 'db' => 'mt.staticipcpe', 'dt' => 4 ),
    array( 'db' => 'jt1.srvname',  'dt' => 5 ),
    array( 'db' => 'mt.username',  'dt' => 6 ),
    array( 'db' => 'mt.username',  'dt' => 7 ),
    array( 'db' => 'mt.lastname',  'dt' => 8 ),
    array( 'db' => 'mt.username',  'dt' => 9, 'formatter' => function( $d, $row ) {

$link = mysqli_connect('127.0.0.1',root,root123,radius);
mysqli_set_charset($link, "utf8");
$n= mysqli_query($link, "select count(*) as num from radacct where username = '$row[9]' and acctstoptime is null");
    while ($row3 = $n->fetch_array()){
if ($row3['num'] > 0){
$a= '&nbsp;<a class="btn btn-app bg-gradient-info"><i class="fas fa-plug"></i>Online</a>';
                return $a;}
else {
$b= '&nbsp;<a class="btn btn-app bg-gradient-indigo"><i class="fas fa-power-off"></i>Offline</a>';
                return $b;}}}
),
    array( 'db' => 'mt.username',  'dt' => 10, 'formatter' => function( $d, $row ) {

$link = mysqli_connect('127.0.0.1',root,root123,radius);
mysqli_set_charset($link, "utf8");
        $query2 = mysqli_query($link, "select acctstoptime from radacct where username = '$row[0]' and acctstoptime != 'null' order by acctstoptime desc limit 1 ");
    while ($row2 = $query2->fetch_assoc()){
$b= '<a><strong>' . $row2['acctstoptime'] . '</strong><br></a>';
                return $b;}}
),
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => 'root123',
    'db'   => 'radius',
    'host' => 'localhost'
);
if ($_SESSION['AUTH_MANAGER'] != 'admin'){
$where = "mt.owner = '" . $_SESSION['AUTH_MANAGER'] . "' ";}

require( 'ssp.inc.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns , '', $where, $group_by, $having)
);
}