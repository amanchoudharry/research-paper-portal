<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<script>
function printPage()
{
	window.print();
	window.location="../admin.php";
}
</script>
</head>

<body>
<!--<body onload="printPage()">-->
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
    <td width="32%">Name : <?php echo $row[3]?></td>
    <td width="12%" rowspan="2" valign="top">Age:<?php echo $row[5]?></td>
    <td width="12%" rowspan="2" valign="top">Weight:<?php echo $row[6]?></td>
    <td width="27%" rowspan="2" valign="top">Address:<?php echo $row['address']?></td>
    <td width="22%" rowspan="2" align="justify" valign="top">Date:<?php echo $row[1]?></td>
  </tr>
  <tr>
    <td>W/o:<?php echo $row[4]?></td>
  </tr>
<?php
}
?>
  <tr>
    <td><table width="100%" border="0" frame="rhs">
      <tr>
	  	<td colspan="4">
			<table border="0" width="80%">
				<tr>
        <td><b>Para</b></td>
        <td>Alive</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td><b>MH</b></td>
        <td>Cycle</td>
        <td>Flow</td>
        <td>Pain</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>LMP</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><b>FH</b></td>
        <td>Diabetes</td>
        <td colspan="2">Hypertension</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Cancer</td>
        <td colspan="2">Heart Disease </td>
        </tr>
      <tr>
        <td><b>P.H.</b></td>
        <td colspan="3">Chronic disease </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">Operation</td>
        </tr>
      <tr>
        <td colspan="4"><b>Alergy</b></td>
        </tr>
			</table>		</td>
	  </tr>
      <tr>
	  	<td colspan="4">
				<table border="0" width="100%">
					<tr>
        <td colspan="4"><b>On Examination</b> </td>
       </tr>
      <tr>
        <td>G.H.</td>
        <td>&nbsp;</td>
        <td>Chest</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>CSV</td>
        <td>&nbsp;</td>
        <td>Breasts</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>PA</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>PS</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>PE</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
				</table>		</td>	
	  </tr>
	  <tr>
	  	<td colspan="4">
			<table border="0" width="100%">
				<tr>
        <td colspan="4"><b>HSF analysis after 3 days of abstinence</b> </td>
        </tr>
      <tr>
        <td colspan="2">Serum TSH</td>
        <td colspan="2">Serum PRL</td>
      </tr>
      
      <tr>
        <td>FSH, LH - D2 </td>
        <td>&nbsp;</td>
        <td>D&amp;C,EB</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
	  	<td>HSG D 8-12</td>
        <td>&nbsp;</td>
        <td>TVS</td>
		<td>AMH</td>
       </tr>
      
      <tr>
        <td colspan="4">Hb% ABOgr Rh typing </td>
        </tr>
      <tr>
        <td colspan="4">VDRL - H &amp; W </td>
        </tr>
      <tr>
        <td colspan="4">Blood Sugar R </td>
        </tr>
      <tr>
        <td colspan="4">HIV. HBsAg Anti HCV </td>
        </tr>
      <tr>
        <td colspan="4">R-E of urine </td>
        </tr>
      <tr>
        <td colspan="4">Rubella IgG titre </td>
        </tr>
			</table>		</td>
	  </tr>
	  <tr>
        <td colspan="4">USG for foetal growth liquor </td>
        </tr>
      <tr>
        <td colspan="4">Blood Sugar 2 hours after </td>
        </tr>
      <tr>
        <td colspan="4">75 grams of glucose.</td>
        </tr>
      <tr>
        <td colspan="4"> (Nutriright - G75) </td>
      </tr>
      <tr>
        <td>Hb%</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>

<br><br><br>
<center>
<?php
$sql="select * from patient where id=(select max(id) from patient)";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
?>
<table width="80%" border="0" cellspacing="0" cellpadding="0" frame="box">
  <tr>
    <td><p>Patient Id: <?php echo $row['patient_id']?></p>
    <p>Patient Name:<?php echo $row[3]?></p>
    <p>Husband Name:<?php echo $row[4]?></p></td>
    <td>Bill Number:<?php echo $row['billNumber']?></td>
    <td align="center">Date:<?php echo $row[1]?></td>
  </tr>
  <tr>
    <td colspan="3"> <p>&nbsp;</p>
    <p><strong>Amount Rs. <?php echo $row['amount']?> has been received. </strong></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><p>Signature</p>
    <p>&nbsp;</p></td>
  </tr>
<?php
}
?>  
</table>
</body>
</html>
