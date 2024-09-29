<?php
$cid=$_POST['cid'];
$status=$_POST['status'];
$comment=$_POST['comment'];
$amount=$_POST['amount'];
$date=$_POST['date'];
session_start();
$username= $_SESSION['username'];

//echo $cid;
//echo $status;
//echo $comment;

include "connect.php";
//$sql="update clients set status=".$status.", comments='".$comment."' where cid=".$cid;
$sql="INSERT INTO comments(cid,comments,status,amount,date,commentedBy) VALUES(".$cid.",'".$comment."','".$status."','".$amount."','".$date."','".$username."')";
//echo $sql;
mysqli_query($con,$sql);
?>
<script>
window.location="clients.php";
</script>