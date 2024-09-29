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


?>
<br><br>
<center>
<?php
include "../connect.php";
$id=$_GET['id'];
$sql="select * from patient where id=".$id;
//echo $sql;
$result1=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result1))
{
?>
<table width="80%" border="0" cellspacing="0" cellpadding="0" frame="box">
  <tr>
    <td colspan="3" align="center"><b>Dr. (Mrs.) Shanti Roy</b> </td>
  </tr>
  <tr>
    <td colspan="3" align="center">V-19, Vidyapuri, Kankarbagh, Patna-800020 </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>Cash Receipt No.- <?php echo $row['billNumber']?></td>
    <td>Patient Id- <?php echo $row['patient_id']?></td>
    <td align="center">Date-<?php echo $row[1]?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"> <p>&nbsp;</p>
      <p>Received from <?php echo $row[3]?> W/o <?php echo $row[4]?> against consultation/ operation fixed on dated <?php echo $row['cdate']?> </p>
	  <?php
	  $number = $row['amount'];
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
 // echo $result . "Rupees  " . $points . " Paise";
 
	  ?>
      <p><strong>Amount Rs. <?php echo $row['amount']?>/- (<?php 
	  if($points==0)
	  echo $result . "Rupees Only";
	  else
	  	echo $result . "Rupees  " . $points . " Paise Only";
	  ?>) . </strong></p>
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
