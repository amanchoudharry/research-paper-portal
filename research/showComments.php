<?php
$cid= $_GET['cid'];
//echo $cid;
include "connect.php";
$sql="select * from comments where cid=".$cid;
$result=mysqli_query($con,$sql);
echo "<table border='1' width='90%'>";
echo "<tr bgcolor='#dcdcdc'><td align='center'><b>Date</b></td><td align='center'><b>Comments</b></td><td align='center'><b>Amount</b></td><td align='center'><b>Status</b></td><td align='center'><b>Comment by</b></td></tr>";
$color=1;
while($row=mysqli_fetch_array($result))
{
if($color==1){
    echo '<tr bgcolor="">';
    $color="2";
  } else { 
    echo '<tr bgcolor="#dcdcdc">';
    $color="1";
  }

echo "<td nowrap>".$row['date']."</td>";
echo "<td>".$row['comments']."</td>";
echo "<td>".$row['amount']."</td>";
if($row['status']==0)
{
	echo "<td>No work</td>";
																				  													}
if($row['status']==1)
{
	echo "<td>Pending</td>";
																				  													}
if($row['status']==2)
{
	echo "<td>Complete</td>";
																				  													}
																																	echo "<td>".$row['commentedBy']."</td>";
echo "</tr>";

}
echo "</table>";
?>
