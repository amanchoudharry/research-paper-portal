<?php
$cid= $_GET['cid'];
//echo $cid;
include "connect.php";
$sql="select * from patient where patient_id=".$cid;
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{

?>
<div class="label label-info label-xlg arrowed-in arrowed-in-right">
																			<div>
																				<a class="user-title-label" href="#">
																					
<span class="white"> Visit on : <?php echo $row['cdate']?>
<input type="hidden" name="date" value="<?php echo $doa;?>"> </span>
																				</a>
																			</div>
																		</div>
																		<?php
//echo "<br>";
}
?>
<a href="insertClient2.php?p_id=<?php echo $cid; ?>">Generate</a>																	</div>
<div>
															<div class="row">
																<div class="col-xs-12 col-sm-2">
																	<div class="text-center">
																		<!--<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="assets/images/avatars/profile-pic.jpg" />-->
																		<br />
																		
																	</div>
																</div>


<div id="show"></div>
