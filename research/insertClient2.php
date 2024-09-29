<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Arbazo</title>

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
		//alert(x);
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
    
    document.getElementById("show").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showComments.php?cid="+x,true);
xmlhttp.send();
	}
	</script>
	</head>
	<?php
	include "header.php";
	include "connect.php";

	?>
	
								<!-- PAGE CONTENT BEGINS -->
								
<form class="form-horizontal" role="form" method="post">
									
									<div align="left" style="position:relative;">
									
												                                    
									</div>
									
									
									
									<span class="invoice-info-label">Date:</span>
													<span class="blue"><?php
echo date("j-n-Y");
$doa=date("j-n-Y");?><input type="hidden" name="adm_date" value="<?php echo $doa;?>"></span>
									
&nbsp;&nbsp;								
									
<span class="invoice-info-label">Patient Id:</span>
<span class="red">									
									
<?php
$year1 = (date('m') > 6) ? date('Y') +1 : date('Y');
//$qry="select max(patient_id) from patient";
//$result=mysqli_query($con,$qry);
//if($result==NULL)
{
	//echo "<b>1</b>";
}
//else
{
//if($row=mysqli_fetch_array($result))
{
    $cid= $_GET['p_id'];
    echo $year1."/".date('M')."/<b>".$cid."</b>"; 
}
}

?>
</span>
																

<span class="red">									
<input type="hidden" name="billNumber" value="<?php
$qry="select max(id) from patient";
$result=mysqli_query($con,$qry);
if($result==NULL)
{
	echo "1";
}
else
{
if($row=mysqli_fetch_array($result))
{
    echo $row[0]+1;
}
}
?>">
</span>								
									
<input type="hidden" name="patient_id" value="<?php echo $cid; ?>"></span>

<?php
$sql="SELECT * FROM patient WHERE id=(select max(id) from patient where patient_id=".$cid.")";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
?>									
									
									
									
									<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Patient Name </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="pname" class="col-xs-10 col-sm-5" value="<?php echo $row['patient_name']?>"  />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father's / Husband's Name </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="fhname" value="<?php echo $row['fh_name']?>"class="col-xs-10 col-sm-5"  />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Age </label>			                                    <div class="col-sm-3">
										<input type="text" id="form-field-1" value="<?php echo $row['dob']?>" name="dob"/>
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Consultation Date </label>
									<div class="col-sm-9">
										<input type="text" id="form-field-1" name="cdate" value="<?php echo $row['cdate']?>" readonly/>
										<?php
											$x=-1;
											$aap= $doa-$row['cdate'];
											if($aap==0)
												echo "<b style='color:green'>Today is appointment.</b>";
												
											if($aap<0)
												if((-1*$aap)==1)
													echo "<b style='color:red'>Tomorrow is appointment.</b>";
												else
													echo "<b style='color:red'>Appointment is after ".(-1*$aap)." days.</b>";
												
											if($aap>0)
												if($aap==1)
													echo "<b style='color:red'>Appointment was 1 day before.</b>";
												else
													echo "<b style='color:red'>Last appointment was ".($aap)." days before.</b>";
										 
										 
										 ?>
										</div>
									</div>
									<!--<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> GST No </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="gst" class="col-xs-10 col-sm-5" />
										</div>
									</div> -->
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="email" value="<?php echo $row['email']?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="mobile" value="<?php echo $row['mobile']?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="address" value="<?php echo $row['address']?>"class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Amount Received </label>			                                    <div class="col-sm-9">
										<div>
																				<span>
																				<select name="ammount">
																				<option value="0" selected>Rs. 0/-</option>
																				<option value="100">Rs. 100/-</option>
																				<option value="200">Rs. 200/-</option>
																				<option value="300">Rs. 300/-</option>
																				<option value="400">Rs. 400/-</option>
																				<option value="500">Rs. 500/-</option>
																				<option value="600">Rs. 600/-</option>
																				<option value="1000">Rs. 1000/-</option>
																				</select>
																																								</span> 															</div> 
										<div>
																																																							</div> 
										</div> 
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Operation Charge </label>			                                    <div class="col-sm-3">
										<input type="text" id="form-field-1" name="op_charge" class="col-xs-10 col-sm-5" value="Rs. 0/-"/>
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Remarks </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="remarks" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>			                                    <div class="col-sm-9">
										<input type="submit" id="form-field-1" name="submit" /> 
										</div>
									</div>
									</form>
<?php
}
?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 
  <?php
  include "connect.php";
  if(isset($_POST['submit']))
  {
  	$adm_date = $_POST['adm_date'];
	$patient_id = $_POST['patient_id'];
	$pname = $_POST['pname'];
	$fhname = $_POST['fhname'];
	$dob = $_POST['dob'];
	
	$cdate1 = $_POST['cdate'];
	$cdate2=explode("-",$cdate1);
	$cdate=$cdate2[2]."-".$cdate2[1]."-".$cdate2[0];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$ammount = $_POST['ammount'];
	$remarks = $_POST['remarks'];
	$billNumber = $_POST['billNumber'];
	$op_charge = $_POST['op_charge'];
	
	$usql="UPDATE patient SET patient_name='".$pname."',fh_name='".$fhname."',dob='".$dob."',email='".$email."',mobile='".$mobile."',address='".$address."' WHERE patient_id=".$patient_id;
	echo $usql;
	mysqli_query($con,$usql);
	
	//INSERT INTO `patient`(`adm_date`, `patient_id`, `patient_name`, `fh_name`, `dob`, `weight`, `email`, `mobile`, `address`, `amount`, `remarks`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12])
	
	$sql="INSERT INTO patient(adm_date,patient_id,patient_name,fh_name,dob,cdate,email,mobile,address,amount,remarks,billNumber,op_charge) VALUES ('".$adm_date."','".$patient_id."','".$pname."','".$fhname."','".$dob."','".$doa."','".$email."','".$mobile."','".$address."','".$ammount."','".$remarks."','".$billNumber."','".$op_charge."')";
	//echo $sql;
	
	mysqli_query($con,$sql);
	
	//echo $cdate1;
	//echo "<br>";
	//echo $cdate;
?>	
<script>
	
	window.open("print/print3.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=550,width=400,height=400");
	//window.open("print/receipt.php");
	window.open("print/receipt.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=100,width=400,height=400");
	window.location="admin.php";

</script>
<?php
  }
  
  
  include "footer.php";
  ?>