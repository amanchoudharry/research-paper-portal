<?php
// Remove blow comments from header If  you are making calls from another server
/*
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
*/
include "connect.php";
$q = $_GET['q'];
if(isset($q) || !empty($q)) {
	//$con = mysqli_connect($hostname, $username, $password, $dbname);
    //$query = "SELECT id, name FROM country WHERE name LIKE '$q%'";
	$query = "SELECT patient_name,patient_id,fh_name FROM patient WHERE patient_name LIKE '$q%'";
    $result = mysqli_query($con, $query);
    $res = array();
    while($resultSet = mysqli_fetch_assoc($result)) {
$res[$resultSet['patient_id']] = "Patient Id:\n".$resultSet['patient_id']."\n Patient Name:".$resultSet['patient_name']."\n Husband/Father Name:".$resultSet['fh_name'];
    }
    if(!$res) {
    	$res[0] = 'Not found!';
    }
    echo json_encode($res);
}

?>