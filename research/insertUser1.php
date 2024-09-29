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
	?>
	
								<!-- PAGE CONTENT BEGINS -->
								
<form class="form-horizontal" role="form" method="post">
<div align="left" style="position:relative;">
									<h4 align="center" style="position:ABSOLUTE;TOP:0%;  left:300px;">User Entry Form</h4>			                                    
									</div>
									<br><br><br>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="name" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Father's Name </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="fname" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="uname" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="pass" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="email" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="mobile" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>			                                    <div class="col-sm-9">
										<input type="text" id="form-field-1" name="address" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Privilege </label>			                                    <div class="col-sm-9">
										<div>
										  <table width="20%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td>New Patient </td>
                                              <td><label>
                                                <input type="checkbox" name="checkbox" value="1">
                                              </label></td>
                                            </tr>
                                            <tr>
                                              <td>Old Patient </td>
                                              <td><input type="checkbox" name="checkbox2" value="2"></td>
                                            </tr>
                                            <tr>
                                              <td>Appointment</td>
                                              <td><input type="checkbox" name="checkbox3" value="3"></td>
                                            </tr>
                                            <tr>
                                              <td>Refund</td>
                                              <td><input type="checkbox" name="checkbox4" value="4"></td>
                                            </tr>
                                          </table>
										</div> 
										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>			                                    <div class="col-sm-9">
										<input type="submit" id="form-field-1" name="submit"/>
										</div>
									</div>
									</form>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 
  <?php
  include "connect.php";
  if(isset($_POST['submit']))
  {
  	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$status = $_POST['status'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	
	$sql="INSERT INTO user_info(user_name,password,name,fname,address,mobile,status,email) VALUES ('".$uname."','".$pass."','".$name."','".$fname."','".$address."','".$mobile."','".$status."','".$email."')";
	//echo $sql;
	
	mysqli_query($con,$sql);
	
	echo "Data has been inserted successfully.";
  }
  include "footer.php";
  ?>