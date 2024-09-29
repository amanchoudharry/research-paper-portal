<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Tables - Ace Admin</title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <style>
  .ui-autocomplete-loading {
    background: white url("img/ui-anim_basic_16x16.gif") right center no-repeat;
  }
  </style>
  <script>
	function show(x)
	{
		alert("vcddfdfd");
	}
   var items = [];	
function calcTotal(x)
{
  //alert(x);
   var main=document.getElementById("main"+x).value;
   var subs=document.getElementById("subs"+x).value;
   //alert(main);
   alert(subs);
   //var tot=main * subs;
   document.getElementById("amt"+x).value=tot;

   items[x-1]=x+","+main;
  // alert(items[x-1]);
   document.getElementById("grand1").value=items;
  document.getElementById("total").value=Number(document.getElementById("total").value) + tot;
 document.getElementById("grand").innerHTML= Number(document.getElementById("total").value)+(0.18 * Number(document.getElementById("total").value));
   
   
}
function calcTotal1()
{
  //alert("ssssssssssss");
    
	var tr=document.getElementById("tr1").value;
	//alert(tr);
	var y=0;
	for(i=1;i<=tr; i++)
	{
		//alert(document.getElementById("amt"+i).value);
		y=y+Number(document.getElementById("amt"+i).value);
		//alert(y);
	}
	
 document.getElementById("total").value= y;
  document.getElementById("grand").innerHTML= y+0.18*y;
}


function insert()
	{
		//alert("hello");
		var tr=document.getElementById("tr1").value;
		var res= +tr +1;
		var n = res.toString();
		document.getElementById("tr1").value= +tr +1;
		var table = document.getElementById("mytable");
    	var row = table.insertRow(-1);
    	var cell1 = row.insertCell(0);
    	var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		//var cell4 = row.insertCell(3);
    	cell1.innerHTML = +n;
		//cell2.innerHTML = "";
		//cell2.innerHTML = "<select class='select-field' id='main"+n+"' name='main"+n+"' ><option vlaue='0'>Select Service</option>	<option value='10'>Service 1</option><option value='20'>Service 2</option><option value='30'>Service 3</option></select>";
		//cell3.innerHTML = "<select class='select-field' id='subs"+n+"' name='subs"+n+"' onChange='calcTotal("+n+")'><option value='0'>Select Service</option ><option value='1'>Service 1</option><option value='2'>Service 2</option><option value='3'>Service 3</option></select>";
		cell2.innerHTML = "<input type='text' id='subs"+n+"' name='subs"+n+"' value='' size='80'>";
		cell3.innerHTML = "<input type='text' id='amt"+n+"' name='amt"+n+"' onKeyUp='calcTotal1()' size='7'>";
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
				   cell2.innerHTML=xmlhttp.responseText;
    		}
  		}
			xmlhttp.open("GET","selectbrand.php?cid="+cid+"&sno="+n,true);
			xmlhttp.send();
    	cell4 .innerHTML = "<input type='text' class='client_info' id='qty"+n+"' name='qty"+n+"'/>";
		cell5.innerHTML = "<input type='text' class='client_info' id='amt"+n+"' name='amt"+n+"'/>";
		cell6.innerHTML = "<input type='text' class='client_info' id='dis"+n+"' name='dis"+n+"' onblur='item_tot_amt("+n+")'/>";
		cell7.innerHTML = "<input type='text' class='client_info' id='tamt"+n+"' name='tamt"+n+"'/>";
	}
	function addAmt(x)
	{
		alert(x);
		document.getElementById("total").value=Number(document.getElementById("total").value) + Number(x);
		document.getElementById("grand").innerHTML=Math.round(Number(document.getElementById("total").value)+(0.18 * Number(document.getElementById("total").value)));
	}
</script>
	</head>
	<?php
	include "header.php";
	include "connect.php";
	?>

								<!-- PAGE CONTENT BEGINS -->
<form method="post" action="print/print.php">
								<div class="space-6"></div>

								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-large">
												<h3 class="widget-title grey lighter">
													<i class="ace-icon fa fa-leaf green"></i>
													Customer Invoice												</h3>

												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">Invoice:</span>
													<span class="red">
<?php
$year1 = (date('m') > 6) ? date('Y') +1 : date('Y');
$qry="select max(invoiceId) from invoice";
$result=mysqli_query($con,$qry);
if($result==NULL)
{
	echo "<b>1</b>";
}
else
{
if($row=mysqli_fetch_array($result))
{
    $cid= $row[0]+1;
    echo "RSC/".date('Y')."-".$year1."/".date('M')."/<b>".$cid."</b>"; 
}
}

?>
<input type="hidden" name="invoiceId" value="<?php
$qry="select max(invoiceId) from invoice";
$result=mysqli_query($con,$qry);
if($result!=NULL)
{
if($row=mysqli_fetch_array($result))
{
    $cid= $row[0]+1;
    echo $cid; 
}
}
else
{
	echo "1";
}
?>"></span>

													<br />
													<span class="invoice-info-label">Date:</span>
													<span class="blue"><?php
echo date("j-n-Y");
$doa=date("j-n-Y");?><input type="hidden" name="date" value="<?php echo $doa;?>"></span>												</div>

												<div class="widget-toolbar hidden-480">
													<a href="#">
														<i class="ace-icon fa fa-print"></i>													</a>												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Client Id : <?php $cid =$_GET['cid']; echo $cid; ?></b>																</div>
</div>																	
<?php	
include "connect.php";
$sql="select * from clients where cid=".$cid;
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
?>
															<div>
																<ul class="list-unstyled spaced">
																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>PAN :<?php echo $row['PAN']?>																	</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right blue"></i>DOB :<?php echo $row['DOB']?> 																	</li>
																															</li>
																</ul>
															</div>
														</div><!-- /.col -->

														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
																	<b>Client Name :<?php echo $row['cname']?></b>																</div>
															</div>

															<div>
																<ul class="list-unstyled  spaced">
																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>Father's Name : <?php echo $row['fname']?>																</li>

																	<li>
																		<i class="ace-icon fa fa-caret-right green"></i>Address:<?php echo $row['address']?>																	</li>
																</ul>
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space"></div>

													<div>
													
														<table class="table table-striped table-bordered" id="mytable">
															<thead>
																<tr>
																	<th>S.No.</th>
																	<th align="center">Particulars</th>
																	<th>Total</th>
																</tr>
															</thead>

															<tbody>
																<tr>
																	<td>1</td>

																	<!--<td>
																		<select name="mains1" id="main1">
																			<option value="0">Select Service</option>
																			<option value="10">Service 1</option>
																			<option value="20">Service 2</option>
																			<option value="30">Service 3</option>
																		<select>																					                       													</td>-->
																	<td class="hidden-xs">
																		<!--<select name="subs1" id="subs1" onChange="calcTotal(1)">
																			<option value="0">Select Service</option>
																			<option value="1">Service 1</option>
																			<option value="2">Service 2</option>
																			<option value="3">Service 3</option>
																		<select>-->		
																	<input type="text" name="subs1" id="subs1" value="" size="80">																    																</td>
																																																		
																	<td>
												<input type="text" id="amt1" name="amt1" onKeyUp="calcTotal1()" size="7"/></td>
																
																</td></tr>
																											
															</tbody>
														</table>
														<table>
														<tr>
						<td align="right" colspan="4"><img src="img/plus.jpg" width="20px" height="20px" onClick="insert()"/></td>
																</tr>
														</table>
					
													</div>

													<div class="hr hr8 hr-double hr-dotted">
													
													</div>

													<div class="row">
													<div class="col-sm-7 pull-right">
															<h4 class="pull-right">
																CGST @<span>9%</span><BR>SGST @<span>9%</span>															</h4>
														</div>
														<div class="col-sm-7 pull-right">
															<h4 class="pull-right">
																Total
																<span class="red">
																<input type="hidden" id="total" value="0">
																<div id="grand">0</div></span>															</h4>
														</div>
														<div class="col-sm-7 pull-left"></div>
													</div>

													<div class="space-6"></div>
													<div class="well" align="center">
														
														<input type="hidden" name="cid" value="<?php echo $cid;?>">
														<input type="hidden" value="1" id="tr1" name="tri"/>
														<input type="hidden" name="grand1" id="grand1" value="">
														<input type="submit">
														</form>
													</div>
													<a href = "javascript:history.back()">GO BACK</a>
												</div>
											</div>
										</div>
									</div>
								</div>

<?php
}

?>								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy;						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>							</a>

							 							</a>

							 							</a>						</span>					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
