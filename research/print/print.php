<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	<script>
		function updateInv()
		{
			var address = document.getElementById("address").value;
			var invoiceId = document.getElementById("invoiceId").value;
			var invid = invoiceId.split("/");
			var date = document.getElementById("date").value;
			var tr = document.getElementById("tr").value;
			//alert(address);
			//alert(invoiceId);
			//alert(date);
			//alert(tr);

			var str="";
			for(i=0;i<=tr-1;i++)
			{
				str=str+document.getElementById("item"+i).value+","+document.getElementById("desc"+i).value+",";
				
			}
			//alert(str);
			var cost="";
			for(i=0;i<=tr-1;i++)
			{
				cost=cost+document.getElementById("cost"+i).value+"#";
				
			}
			//alert(cost);
			var details="";
			for(i=0;i<=tr-1;i++)
			{
				details=details+document.getElementById("desc"+i).value+",";
				
			}
			if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    //var test=  xmlhttp.responseText+"";
    //alert(test);
    
    //document.getElementById("show").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","update.php?address="+address+"&invoiceId="+invid[3]+"&date="+date+"&detail="+details+"&cost="+cost,true);
xmlhttp.send();
window.print();
//window.location="../clients.php";
		}
function printPage()
{
	window.print();
	//window.location="../clients.php";
}
	</script>

</head>

<body onload="printPage()">
<?php
$invoice = $_POST['grand1'];
$cid = $_POST['cid'];
$invoiceId = $_POST['invoiceId'];
$date= $_POST['date'];
//echo "****";
//echo $invoiceId;
//echo $invoice;
//echo "-------";
//echo $cid;
//echo "**********";
$tr=$_POST['tri'];
//echo $tr;
$m=0;
for($x=1;$x<=$tr;$x++)
{
 $y="amt".$x;
 $m=$m + $_POST[$y];
}
?>


	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div style="position:relative; ">
		
            <b>Rishav Sinha & Co.<br>
			Charterd Accountant<br>
			22, Vaibhav Appartment<br>
			Budh Marg, Patna-8000001</b>
		


            <div id="" style="position:ABSOLUTE;TOP:0%;  right:0px;">
				<img id="" src="images/logo2.png" alt="logo" />
            </div>
		
		</div>
		<br><br><br><BR>
		<div style="clear:both"></div>
		
		<div id="customer">
		
			<textarea id="address"><?php			
include "../connect.php";
$sql="select * from clients where cid=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{

//echo $row['cid'];
$r="";
echo "To ".$r."\r\n";
echo "\r\n    ".$row['cname']."\r\n";

echo ""."    s/o ".$row['fname']."\r\n";

echo ""."   ".$row['address'];

}


?>			</textarea>
            
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice </td>
                    <td><textarea id="invoiceId"><?php $year1 = (date('m') > 6) ? date('Y') +1 : date('Y');
					echo "RSC/".date('Y')."-".$year1."/".date('M')."/".$invoiceId; ?></textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date"></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"><?php echo ($m+0.18*$m); ?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>S. No. </th>
		      <th colspan="2">Particulars</th>
			  <th >Cost</th>
		      <th >Subtotal</th>
		      
		  </tr>
		  <input type="hidden" id="tr" value="<?php echo $tr;?>">
		  <?php
		  	$items = explode(",", $invoice);
			
			$cost="";
			$details="";
			for($i=0;$i<=$tr-1;$i++)
			{
			 $cost=$cost.$_POST["amt".($i+1)]."#";
			 
			 
		  ?>
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea id="item<?php echo $i;?>"><?php echo $i+1;?></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description" colspan="2"><textarea id="desc<?php echo $i;?>"><?php echo $_POST["subs".($i+1)]; $details=$details.$_POST["subs".($i+1)].","; ?></textarea>
			  </td>
		      <td><textarea class="cost" id="cost<?php echo $i;?>"><?php $z="amt".($i+1); echo (int)$_POST[$z];?></textarea><input type="hidden" class="qty" value="1"></td>
		      <td><span class="price"><?php $z="amt".($i+1); echo (int)$_POST[$z];?></span></td>
		  </tr>
		  <?php
		  }
		  //echo $cost;
		  ?>
		   <input type="hidden" value="<?php echo $cost; ?>" id="cost"> 
		  <!--<tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row"></a></td>
		  </tr>-->
		  
		  <tr>
		      <td colspan="2" rowspan="2">A/C NAME: RISHAB SINHA & CO<BR>A/C NO: 0228002100014435<BR>IFSC: PUNB022800<BR>BRANCH: JEHANABAD </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="subtotal"><?php echo $m; ?></div></td>
		  </tr>
		  <tr>

		     
		      <td colspan="2" class="total-line">Tax : CGST @ 9% &nbsp;&nbsp;+ </td>
		      <td class="total-value">SGST @ 9%</td>
		  </tr>
		  <tr>

		      <td colspan="2" rowspan="2"> A/C NAME: RISHAB SINHA & CO<BR>A/C NO: 36029709188<BR>IFSC: SBIN0003477<BR>BRANCH: SBI, NEW MARKET </td>
		      <td colspan="2" class="total-line"> Grand Total</td>
		      <td class="total-value"><div id="total"><?php echo ($m+0.18*$m); ?></div></td>
		  </tr>
		  <tr>
		      
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> Note: Kindly, make the payment within 7 days of bill served.</td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"><?php echo ($m+0.18*$m); ?></div></td>
		  </tr>
		  <?php
		  
		  $createdBy= $_SESSION['username'];
$sql="INSERT INTO invoice(invoiceId,clientId,details,date,cost,createdBy)VALUES('".$invoiceId."','".$cid."','".$details."','".$date."','".$cost."','".$createdBy."')";
		 mysqli_query($con,$sql);
		  ?>
		  <input type="hidden" value="<?php echo $invoiceId."*".$cid."*".$invoice."*".$date?>" id="sql">
		  <div id="show"></div>
		<tr id="hiderow">
		
		    <td colspan="5" align="right"><div onclick="updateInv()"><u>Print</u></div></td>			
		  </tr>
		  <tr id="hiderow">
			<td colspan="5" align="right"><a href = "javascript:history.back()">GO BACK</a></div></td>
			
		  </tr>
		</table>
		
		<div align="left">
		  For, Rishab Sinha & Co.<br>Chartered Accountant<br><br>Rishab Kumar Sinha <br>(Prop.)
		  
		</div>
	
	</div>
	
</body>

</html>