<?php
//$sql= $_GET['sql'];
//echo $cid;
include "../connect.php";
//$item = explode("*",$sql);
//echo $item[2];
//$sql="UPDATE invoice SET details=,'".date=."' ;

$address= $_GET['address'];
$invoiceId= $_GET['invoiceId'];
$date=$_GET['date'];
$detail=$_GET['detail'];
$cost=$_GET['cost'];
$sql="UPDATE invoice SET details='".$detail."',date='".$date."',cost='".$cost."' WHERE invoiceId=".$invoiceId;
mysqli_query($con,$sql);
?>