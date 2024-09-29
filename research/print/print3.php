<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<script>
function printPage()
{
	window.print();
	window.close();
}
</script>
</head>

<!--<body>-->
<body onload="printPage()">
<?php
include "../connect.php";
$sql="select * from patient where id=(select max(id) from patient)";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
?>
<br><br><br><br><br><br><br><br><br><br>
<table width="100%" border="0">
  <tr>
    <td width="40%" colspan="2"><b>Name : <?php echo $row[3]?></b></td>
    <td width="10%" valign="top">Id:<?php echo $row['patient_id']?></td>
    <td width="10%" valign="top">Age:<?php echo $row[5]?></td>
    <td width="20%" valign="top">Mobile:<?php echo $row[8]?></td>
    <td width="20%" align="justify" valign="top">&nbsp;&nbsp;Date:<b><?php echo $row['cdate']?></b></td>
  </tr>
  <tr>
    <td colspan="2">W/o:<?php echo $row[4]?></td>
    <td colspan="4">Address: <?php echo $row['address']?></td>
  </tr>
<?php
}
?>
  <tr>
    <td align="center">Weight:</td>
    <td>&nbsp;</td>
    <td>BP:</td>
    <td>&nbsp;</td>
    <td>LLP:</td>
    <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>
