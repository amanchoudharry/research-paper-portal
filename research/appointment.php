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
	function ok(x)
{
	//confirm("Do you really want to refund?");
	window.open("editApp.php?id="+x,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=250,width=500,height=200");
}

function ok1(x)
{
	//alert("Appointment has been canceled successfully.");
	window.location="delApp.php?id="+x;
}
	</script>
	</head>
	<?php
	include "header.php";
	include "connect.php";
	$totalcost=0;
	?>
	
								<!-- PAGE CONTENT BEGINS -->
								
<form class="form-horizontal" role="form" method="post">
									
									<div align="left" style="position:relative;">
									
												                                    
									</div>
									
									
									
									<span class="invoice-info-label">Date:</span>
													<span class="blue"><?php
echo date("j-n-Y");
$doa=date("j-n-Y");?><input type="hidden" name="adm_date" value="<?php echo $doa;?>"></span>
									
	<br><br>								
									
<span class="invoice-info-label">Appointments</span>
<span class="red">									
									
<?php
$year1 = (date('m') > 6) ? date('Y') +1 : date('Y');
$qry="select max(patient_id) from patient";
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
    //echo $year1."/".date('M')."/<b>".$cid."</b>"; 
}
}

?>
<input type="hidden" name="patient_id" value="<?php
$qry="select max(patient_id) from patient";
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
									
		<br><br>									
								<form method="post">
         <table width="70%" border="0" >
		
        <tr>
			<td><b>Select Day :</b>
			<select class="select-field" name="day">
				<option value="0">All</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<?php for($i=10;$i<=31;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i ;}?></option>
			</select>&nbsp;&nbsp;&nbsp;</td>
            <td><b>Month : </b> 
			<select class="select-field" name="month">
				<option value="0">All</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select></td>
			<td><b>Year : </b>
			<select class="select-field" name="year">
				
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
				<option value="2026">2026</option>
			</select>
			</td>
            <td><input type="hidden" name="onload" value="openCity(event, 'report')"><input type="submit" name="report" value="Generate Report" /></td>
        </tr>
        </table>
        </form><br>	
		<table border="1">
		<?php
		 if(isset($_POST['report']))
        {
            include "connect.php";
            $sn=1;
            $day=$_POST['day'];
            $month=$_POST['month'];
            $year=$_POST['year'];
            $totalcost=0;
			if ($month==0 && $day==0) 
			{
				$sql="select * from patient where cdate like '%-".$year."'";
				//echo $sql;
			}	
			if ($month!=0 && $day==0) 
			{
				$sql="select * from patient where cdate like '%-".$month."-".$year."'";
				//echo $sql;
			}
			if ($month!=0 && $day!=0) 
			{
				$sql="select * from patient where cdate='".$day."-".$month."-".$year."'";
				//echo $sql;
			}
			if ($month==0 && $day!=0) 
			{
				$sql="select * from patient where cdate=0";
				echo "Not appropriate selection.";
			}
			$result=mysqli_query($con,$sql);
			echo "<tr>";
				echo "<td align='center'><b>S.No.</b></td>";
				echo "<td align='center'><b>Booked Date</b></td>";
				echo "<td align='center'><b>Appointment Date</td>";
				echo "<td align='center'><b>Receipt No.</td>";
				echo "<td align='center'><b>Patient</b></td>";
				echo "<td align='center'><b>Guardian</b></td>";
				echo "<td align='center'><b>Mobile</b></td>";
				echo "<td align='center'><b>Address</b></td>";
				echo "<td align='center'><b>Edit</b></td>";
				//echo "<td align='center'><b>Delete</b></td>";
				
			echo "</tr>";
			while($row=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td align='center'>".$sn.".</td>";
				echo "<td align='center'>".$row[1]."</td>";
				echo "<td align='center'>".$row['cdate']."</td>";
				echo "<td align='center'>".$row['billNumber']."</td>";
				echo "<td>".$row['patient_name']."</td>";
				echo "<td>".$row['fh_name']."</td>";
				echo "<td>".$row['mobile']."</td>";
				echo "<td>".$row['address']."</td>";
				//echo "<td><a href='editApp.php?id=".$row['id']."' target='_blank'>edit</a></td>";
				echo "<td><a href='#' onClick='ok(".$row['id'].")'><img src='img/edit.png'></a></td>";
				//echo "<td><a href='#' onClick='ok1(".$row['id'].")'>del</a></td>";
				//echo "<td><a href='delApp.php?id=".$row['id']."' target='_blank'>del</a></td>";
				
				echo "</tr>";
				$sn=$sn+1;
				$totalcost=$totalcost+$row[10];
				
			}
		
		?>
		<tr>
			<td colspan="9" align="center"><b>Total : <?php echo $sn-1; ?> appointments</b></td>
			
		</tr>
		<?php
		}
		?>
		</table>
																	
									
									
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
	
	$weight = $_POST['weight'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$ammount = $_POST['ammount'];
	$remarks = $_POST['remarks'];
	
	//INSERT INTO `patient`(`adm_date`, `patient_id`, `patient_name`, `fh_name`, `dob`, `weight`, `email`, `mobile`, `address`, `amount`, `remarks`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12])
	
	$sql="INSERT INTO patient(adm_date,patient_id,patient_name,fh_name,dob,weight,email,mobile,address,amount,remarks) VALUES ('".$adm_date."','".$patient_id."','".$pname."','".$fhname."','".$dob."','".$weight."','".$email."','".$mobile."','".$address."','".$ammount."','".$remarks."')";
	//echo $sql;
	
	mysqli_query($con,$sql);
	
	//echo "Data has been inserted successfully.";
?>	
<script>
	
	window.location='print/print3.php';
</script>
<?php
  }
  include "footer.php";
  ?>