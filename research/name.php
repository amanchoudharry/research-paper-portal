<?php 
include "con2.php";
//echo "aaaaaaaaaa";
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = "SELECT vname FROM vdetail WHERE vname LIKE '%{$query}%'";
	$result=mysqli_query($con,$sql);
	$array = array();
    while ($row = mysqli_fetch_array($result)) {
        $array[] = array (
            'label' => $row['vname'].', '.$row['vname'],
            'value' => $row['vname'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>