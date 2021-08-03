<?php
session_start();

	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {
 
// DB table to use
$table = array(
    array('table'=>'radacct',  'as'=>'mt'),
    array('table'=>'rm_users', 'as'=>'jt1', 'join_type'=>'LEFT', 'join_on'=>'mt.username  = jt1.username'),
    array('table'=>'rm_services', 'as'=>'jt2', 'join_type'=>'LEFT', 'join_on'=>'jt1.srvid = jt2.srvid'),
    array('table'=>'rm_wlan', 'as'=>'jt3', 'join_type'=>'LEFT', 'join_on'=>'mt.callingstationid = jt3.maccpe'),
    array('table'=>'rm_ap', 'as'=>'jt4', 'join_type'=>'LEFT', 'join_on'=>'jt3.apip = jt4.ip'),
); 
 
$primaryKey = 'radacctid';
 
$columns = array(
    array( 'db' => 'mt.username', 'dt' => 0 ),
    array( 'db' => 'mt.username', 'dt' => 1 ),
    array( 'db' => 'mt.username', 'dt' => 2 ),
    array( 'db' => 'mt.calledstationid',  'dt' => 3 ),
    array( 'db' => 'mt.callingstationid',  'dt' => 4 ),
    array( 'db' => 'mt.framedipaddress',     'dt' => 5 ),
    array( 'db' => 'jt2.srvname', 'dt' => 6 ),
    array( 'db' => 'jt3.signal',  'dt' => 7 ),
    array( 'db' => 'jt3.ccq',  'dt' => 8 ),
    array( 'db' => 'jt3.apip',  'dt' => 9 ),
    array( 'db' => 'mt.username',  'dt' => 10, 'formatter' => function( $d, $row ) {

$link = mysqli_connect('127.0.0.1',root,root123,radius);
mysqli_set_charset($link, "utf8");
        $query2 = mysqli_query($link, "select TIMEDIFF(now() , acctstarttime) as num from radacct where username = '$row[0]' and acctstoptime is null ");
    while ($row2 = $query2->fetch_assoc()){
$b= '<a><strong>' . $row2['num'] . '</strong><br></a>';
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
$where = "jt1.owner = '" . $_SESSION['AUTH_MANAGER'] . "' and mt.acctstoptime is NULL ";}

if ($_SESSION['AUTH_MANAGER'] == 'admin'){
$where = "mt.acctstoptime is NULL ";}

require( 'ssp.inc.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns , '', $where, $group_by, $having)
);

}