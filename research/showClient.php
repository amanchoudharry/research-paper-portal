<?php
$cid= $_GET['cid'];
//echo $cid;
include "connect.php";
$sql="select * from clients where cid=".$cid;
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{

?>
<form method="post" action="showClientProcess.php">
<input type="hidden" name="cid" value="<?php echo $cid; ?>">
<div class="label label-info label-xlg arrowed-in arrowed-in-right">
																			<div>
																				<a class="user-title-label" href="#">
																					
																					<span class="white">Client Id:<?php echo $cid; ?> &nbsp;&nbsp;Name:<?php echo $row['cname']?>&nbsp;&nbsp;Father's Name: <?php echo $row['fname']?>&nbsp;&nbsp;&nbsp;&nbsp; Date : <?php
echo date("j-n-Y");
$doa=date("j-n-Y");?><input type="hidden" name="date" value="<?php echo $doa;?>"> </span>																				</a>																			</div>
																		</div>
																	</div>
<div>
															<div class="row">
																<div class="col-xs-12 col-sm-2">
																	<div class="text-center">
																		<!--<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="assets/images/avatars/profile-pic.jpg" />-->
																		<br />
																		
																	</div>
																</div>

																<div class="col-xs-12 col-sm-7">
																	<div class="space visible-xs"></div>
																		<div class="profile-user-info profile-user-info-striped">
																			<div class="profile-info-row">
																				<div class="profile-info-row">
																					<div class="profile-info-name"> Status </div>
<?php 
$sql1="select * from comments where comment_id=(select max(comment_id) from comments group by cid having cid=".$cid.")";
$result1=mysqli_query($con,$sql1);
if($result1!=NULL)
{
while($row1=mysqli_fetch_array($result1))
{
?>

	
																			<div class="profile-info-value">
																				<span>
																				<select name="status">
																				<?php
																				if($row1['status']==0)
																				{
																				echo "<option value='0' selected>No work</option>";
																				  echo "<option value='1'>Pending</option>";
																				  echo "<option value='2'>Complete</option>";
																				}
																				if($row1['status']==1)
																				{
																				echo "<option value='0'>No work</option>";
																				echo "<option value='1' selected>Pending</option>";
																				echo "<option value='2'>Complete</option>";																
																				}
																				if($row1['status']==2)
																				{
																				echo "<option value='0'>No work</option>";
																				echo "<option value='1'>Pending</option>";
																			echo "<option value='2' selected>Complete</option>";																
																				
																				}
																				
																				?>
																			    </select>																				</span> 															</div> 
																		</div>
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Amount </div>

																			<div class="profile-info-value">
																				<span>
													<input type="text" name="amount" value="<?php echo $row1['amount']; ?>"><br>
																		<a href="invoice.php?cid=<?php echo $cid; ?>">Generate Bill</a>
																				</span>																</div> 
																		</div>

<?php
}
}else
{
?>

<div class="profile-info-value">
																				<span>
																				<select name="status">
																				<option value="0" selected>No work</option>
																				<option value="1">Pending</option>
																				<option value="2">Complete</option>
																				</select>																					                                                                               </span> 															
																				</div> 
																				
																		</div>
																		<div class="profile-info-row">
																			<div class="profile-info-name"> Amount </div>

																			<div class="profile-info-value">
																				<span>
													<input type="text" name="amount" value="0"><br>
														<a href="invoice.php?cid=<?php echo $cid; ?>">Generate Bill</a>
																				</span>																</div> 
																		</div>

<?php
}
?>																																						 																		</div>
                                                                       </div>
																</div>
															</div>
														</div>
<table>	
<tr><td><h4 class="header blue lighter less-margin">Comment</h4></tr></td>
<tr><td>											<textarea name= "comment"  placeholder="Type something…" rows="8" cols="102" ><?php 
$sql1="select * from comments where comment_id=(select max(comment_id) from comments group by cid having cid=".$cid.")";
$result1=mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($result1))
{
	echo $row1['comments'];
}
?></textarea></td></tr>
<tr><td align="center">											
<input type="submit" name="ok"  type="button"></td></tr>
</table>													
<?php
}
?>
</form>
<a href="#" onclick="show(<?php echo $cid;?>)">Show All</a>
<div id="show"></div>
