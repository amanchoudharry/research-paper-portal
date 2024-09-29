<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body onload="window.print()">
<?php
$invoice = $_POST['grand1'];
$cid = $_POST['cid'];
echo $invoice;
echo "-------";
echo $cid;
echo "**********";
$tr=$_POST['tri'];
echo $tr;
$m=0;
for($x=1;$x<=$tr;$x++)
{
 $y="amt".$x;
 $m=$m + $_POST[$y];
}
?>


	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            <textarea id="address"><?php			
include "../connect.php";
$sql="select * from clients where cid=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{

//echo $row['cid'];
echo "Name: ".$row['cname']."\r\n";

echo "\r\n"."Father's Name: ".$row['fname']."\r\n";

echo "\r\n"."Address: ".$row['address'];

}


?>			
</textarea>

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">Widget Corp.
c/o Steve Widget</textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"><?php echo $m; ?></div></td>
                </tr>

            </table>
		
		</div>
		<center>
		<table id="items" border="1">
		
		  <tr>
		      <th>Product</th>
		      <th colspan="3">Description</th>
		      <th>Total</th>
			  
			  

		     </tr>
		  <?php
		  	$items = explode(",", $invoice);
			for($i=0;$i<=$tr-1;$i++)
			{
		  ?>
		  <tr>
		      <td class="item-name"><div class="delete-wpr"><textarea><?php echo $items[$i*2];?></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description" colspan="3"><textarea><?php echo $items[($i*2)+1];?></textarea></td>
		      <td ><textarea class="cost"><?php $z="amt".($i+1); echo (int)$_POST[$z];?></textarea>
		      <input type="hidden" class="qty" value="1">
		       <input type="hidden" class="price" value="<?php $z="amt".($i+1); echo $_POST[$z];?>"></td>
		  </tr>
		  
		  <?php
		  }
		  ?>  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">875.00</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">875.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">875.00</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
	
</body>

</html>