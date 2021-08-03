<?php
session_start();

	if ($_SESSION['AUTH_MANAGER'] == '') {
header("Location: index.php");
    }
    else {
 
// DB table to use
$table = array(
    array('table'=>'rm_services',  'as'=>'mt'),
    array('table'=>'rm_allowedmanagers', 'as'=>'mt1', 'join_type'=>'LEFT', 'join_on'=>'mt.srvid  = mt1.srvid'),
); 
 
$primaryKey = 'mt.srvid';
 
$columns = array(
    array( 'db' => 'mt.srvname', 'dt' => 0, 'formatter' => function( $d, $row ) {
	if ($_SESSION['AUTH_MANAGER'] == 'admin') {
                $buttons= '<a class="btn bg-gradient-success btn-lg btn-block" href="index.php?cont=edit_service&srvid='.$row[2].'"><center><h3 style="font-size: 24px;">'.$row[0].'</h3>';
                return $buttons;} else {
                $buttons= '<a class="btn bg-gradient-success btn-lg btn-block"><center><h3 style="font-size: 24px;">'.$row[0].'</h3>';
                return $buttons;}}),
    array( 'db' => 'mt.unitprice', 'dt' => 1, 'formatter' => function( $d, $row ) {

$link = mysqli_connect('127.0.0.1',root,root123,radius);
mysqli_set_charset($link, "utf8");
$query1 = mysqli_query($link, "SELECT * FROM rm_managers where managername = '" . $_SESSION['AUTH_MANAGER'] . "' ");
       while($row1 = mysqli_fetch_array($query1)){
if ($row1['BNM'] == '1') {
                $buttons= '<a class="btn bg-gradient-dark btn-lg btn-block"><center><h3 style="font-size: 24px;">'.$row[3].'</h3>';
                return $buttons;} else {
                $buttons= '<a class="btn bg-gradient-dark btn-lg btn-block"><center><h3 style="font-size: 24px;">'.$row[1].'</h3>';
                return $buttons;}}}
),
    array( 'db' => 'mt.srvid', 'dt' => 2 ),
    array( 'db' => 'mt.unitpriceNM', 'dt' => 3 ),
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => 'root123',
    'db'   => 'radius',
    'host' => 'localhost'
);
if ($_SESSION['AUTH_MANAGER'] != 'admin'){
$where = "mt1.managername = '" . $_SESSION['AUTH_MANAGER'] . "' and srvname != 'expire' ";}

if ($_SESSION['AUTH_MANAGER'] == 'admin'){
$where = "mt1.managername = '" . $_SESSION['AUTH_MANAGER'] . "' and srvname != 'expire' ";}


require( 'ssp.inc.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns , '', $where, $group_by, $having)
);

}