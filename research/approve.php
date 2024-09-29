<?php
include "common.php";
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Reports</a>
							</li>
							<li class="active"> Edit Research Paper</li>
						</ul><!-- /.breadcrumb -->

						<!--<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div> /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<!--<div class="page-header">
							<h1>
								Research Paper
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Common form elements and layouts
								</small>
							</h1>
						</div> /.page-header -->
						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 <?php
$destination = '';
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "scholarsphere";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated data from the form
    $id = $_POST['srNo'];
    $university = $_POST['university'];
    $department = $_POST['department'];
    $faculty = $_POST['faculty_scientist'];
    $emp_id = $_POST['employee_id'];
    $otherauthor = $_POST['author_name'];
    $coauthor = $_POST['Co-author'];
    $papertitle = $_POST['papertitle'];
    $journalname=$_POST['journal_name'];
	$article=$_POST['article'];
	// $National=$_POST['National'];
    $region = $_POST['National'];
    $publicationdate = $_POST['publicationdate'];
    $pubyear = $_POST['pubyear'];
    $edition = $_POST['edition'];
    $pagefrom = $_POST['pagefrom'];
    $pageto = $_POST['pageto'];
    $impact=$_POST['impact'];
    $scopus = isset($_POST['scopus']) ? $_POST['scopus'] : '';
    $listedin=$_POST['listedin'];
    $wos = isset($_POST['wos']) ? $_POST['wos'] : '';
    $peer = isset($_POST['peer']) ? $_POST['peer'] : '';
    $issn = $_POST['issn'];
    $isbn = $_POST['isbn'];
    $pubname = $_POST['pubname'];
    $affltn = $_POST['affltn'];
    $corrauthor = $_POST['corrauthor'];
    $citind = $_POST['citind'];
    $nocit = $_POST['nocit'];
    $link=$_POST['link'];
    if(isset($_FILES['evdupload']) && $_FILES['evdupload']['error'] === UPLOAD_ERR_OK) {
    $file_name = $_FILES['evdupload']['name'];
    $file_tmp = $_FILES['evdupload']['tmp_name'];
    // Move uploaded file to desired directory
    $upload_directory = 'uploads/'; 

//cheking if dir. to store files is available if not it is being created
    if (!is_dir($upload_directory)) {
    // Create the directory with permissions 0755
    if (!mkdir($upload_directory, 0755, true)) {
        die("Failed to create directory '$upload_directory'");
    }
    }

    $destination = $upload_directory . $file_name;
    if(move_uploaded_file($file_tmp, $destination)) {
        // File uploaded successfully
        // we can save $destination to your database if you need to store the file path
        echo '<script>alert("File uploaded successfully")</script>';
    } else {
        echo "Error uploading file.";
    }
}
    $othrinfo=$_POST['othrinfo'];
    $ref=$_POST['ref'];

    // SQL to update data in the database
    $sql = "UPDATE researchpapersbyfaculty SET University='$university', Department='$department', Faculty='$faculty', `Employee ID`='$emp_id', `Author`='$otherauthor', `Co-author`='$coauthor', papertitle='$papertitle',journalname='$journalname', article='$article', region='$National', pubdate='$publicationdate', pubyear='$pubyear', volume='$edition', pagefrom='$pagefrom', pageto='$pageto',impact='$impact', scopus='$scopus', listedin='$listedin', wos='$wos', peer='$peer', issn='$issn', isbn='$isbn', pubname='$pubname', affltn='$affltn', corrauthor='$corrauthor', citind='$citind', nocit='$nocit',evdupload='$destination', othrinfo='$othrinfo', ref='$ref' WHERE srNo='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success page
        header("location: ReoResearchpaper.php");
        exit();
    } else {
        // Redirect to error page
        header("location: error.php");
        exit();
    }
}

// Close connection
mysqli_close($conn);
?>
<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "scholarsphere";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter exists in the URL
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
   
    $sql = "SELECT * FROM researchpapersbyfaculty WHERE srNo = ?";


    if ($stmt = $conn->prepare($sql)) {
      
        $stmt->bind_param("i", $param_id);

        $param_id = $_GET['id'];

        if ($stmt->execute()) {
        
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                
                $row = $result->fetch_assoc();
            } else {
       
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
      
        $stmt->close();
    }
} else {
 
    header("location: error.php");
    exit();
}

// Close connection
$conn->close();
?>

								<form class="form-horizontal" role="form" method="post" action="editReoResearchpaper.php" enctype="multipart/form-data">
								<input type="hidden" name="srNo" value="<?php echo $row['srNo']; ?>">
                                <div class="form-group">
										<!--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> University </label> -->
										<div class="col-sm-9">
											<input type="hidden" id="form-field-1" name="university" value="<?php echo $row['University']; ?>" placeholder="Enter University Name" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									
									<div class="form-group">
										<!--<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Department </label> -->
										<div class="col-sm-9">
											<input type="hidden" id="form-field-1-1" name="department" value="<?php echo $row['Department']; ?>" placeholder="Enter Department Name" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									
									<div class="form-group">
										<!--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Faculty/Scientist </label> -->
										<div class="col-sm-9">
											<input type="hidden" id="form-field-2" name="faculty_scientist" value="<?php echo $row['Faculty']; ?>" placeholder="Enter Faculty/Scientist Name" class="col-xs-10 col-sm-5" />
											<span class="help-inline col-xs-12 col-sm-7">
												<!-- <span class="middle">Inline help text</span> -->
											</span>
										</div>
									</div>
									
									<div class="form-group">
										<!--<label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Employee ID </label> -->
										<div class="col-sm-9">
											<input type="hidden" id="form-field-3" name="employee_id" value="<?php echo $row['Employee ID']; ?>" placeholder="Enter Employee ID" class="col-xs-5 col-sm-3" />
											<span class="help-inline col-xs-7 col-sm-9"></span>
										</div>
									</div>
									<div class="form-group">
										<!--<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> Author's Name </label> -->
										<div class="col-sm-9">
											<input type="hidden" id="form-field-4" name="author_name" value="<?php echo $row['Author']; ?>" placeholder="Enter Author's Name" class="col-xs-10 col-sm-5" />
											<div class="space-2"></div>
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Corresponding author's Name </label>
										<div class="col-sm-9">
											<div class="clearfix">
												<input type="text" id="form-field-5" name="Co-author" value="<?php echo $row['Co-author']; ?>" placeholder="Enter Corresponding author's Name" class="col-xs-10 col-sm-5" />
											</div>
											<div class="space-2"></div>
											
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Title of Paper </label>
										<div class="col-sm-9">
											<input type="text" name="papertitle" value="<?php echo $row['papertitle']; ?>" placeholder="Enter Title of Paper" class="col-xs-10 col-sm-5" />
											<div class="space-2"></div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right"> Name of Journal </label>
										<div class="col-sm-9">
											<input type="text" name="journal_name" value="<?php echo $row['journalname']; ?>" placeholder="Enter Name of Journal" class="col-xs-10 col-sm-5" />
											<div class="space-2"></div>
										</div>
									</div>
									
									
									
									<div class="hr hr-24"></div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Research Paper/Article Submission</h4>
													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div>
															<label for="research-paper">Research Paper/Article or anything which you would like to mention</label>
															<textarea class="form-control" name="article" id="research-paper" value="<?php echo $row['article']; ?>" placeholder="Enter Research Paper/Article"></textarea>
														</div>
														<hr />
														<div>
															<label for="publisher">Name of Publisher</label>
															<input type="text" name ="pubname" class="form-control" id="publisher" value="<?php echo $row['pubname']; ?>" placeholder="Enter Name of Publisher">
														</div>
														<hr />
														<div>
															<label for="institutional-affiliations">Institutional Affiliations</label>
															<input type="text" name="affltn" class="form-control" id="institutional-affiliations" value="<?php echo $row['affltn']; ?>" placeholder="Enter Institutional Affiliations">
														</div>
														<hr />
														<div>
															<label for="corresponding-author">Corresponding Author</label>
															<input type="text" name="corrauthor" class="form-control" id="corresponding-author" value="<?php echo $row['corrauthor']; ?>" placeholder="Enter Corresponding Author">
														</div>
														<hr />
														<div>
															<label for="additional-info">Any Other Information</label>
															<textarea class="form-control" name="othrinfo" id="additional-info" value="<?php echo $row['othrinfo']; ?>" placeholder="Enter Any Other Information"></textarea>
														</div>
														<hr />
														<div>
															<label for="reference">Reference</label>
															<textarea class="form-control" name="ref" id="reference" value="<?php echo $row['ref']; ?>" placeholder="Enter Reference"></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Publication Details</h4>
													<span class="widget-toolbar">
														<a href="#" data-action="settings">
															<i class="ace-icon fa fa-cog"></i>
														</a>
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</span>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div>
															<label for="volume-edition">Volume/Edition</label>
															<input class="form-control" name="edition" type="number" id="volume-edition" value="<?php echo $row['volume']; ?>" placeholder="Enter Volume/Edition" />
														</div>
														<hr />
														<div>
															<label for="issn">ISSN</label>
															<input class="form-control" name="issn" type="text" id="issn" value="<?php echo $row['issn']; ?>" placeholder="Enter ISSN" />
														</div>
														<hr />
														<div>
															<label for="isbn">ISBN</label>
															<input class="form-control" name="isbn" type="text" id="isbn" value="<?php echo $row['issn']; ?>" placeholder="Enter ISBN" />
														</div>
														<hr />
														<div>
															<label for="citation-index">Citation Index</label>
															<input class="form-control" name="citind" type="number" id="citation-index" value="<?php echo $row['citind']; ?>" placeholder="Enter Citation Index" />
														</div>
														<hr />
														<div>
															<label for="num-citations">Number of Citations</label>
															<input class="form-control" name = "nocit" type="number" id="num-citations" value="<?php echo $row['nocit']; ?>" placeholder="Enter Number of Citations" />
														</div>
														<hr />
														<div>
															<label for="impact-factor">Impact Factor</label>
															<input class="form-control" name="impact" type="text" id="impact-factor" value="<?php echo $row['impact']; ?>" placeholder="Enter Impact Factor" />
														</div>
														<hr />
														<div>
															<label for="ugc-recognition-link">UGC Recognition Link</label>
															<input class="form-control" name="link" type="url" id="ugc-recognition-link" value="<?php echo $row['link']; ?>" placeholder="Enter UGC Recognition Link" />
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Publication Details</h4>
													<span class="widget-toolbar">
														<a href="#" data-action="settings">
															<i class="ace-icon fa fa-cog"></i>
														</a>
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</span>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div>
															<label for="region">Region</label>
															<select class="form-control" id="region" name="National" >
																<option value=""></option>
																<option value="National" <?php if($row['region'] == 'National') echo 'selected'; ?>>National</option>
                                                                <option value="International" <?php if($row['region'] == 'International') echo 'selected'; ?>>International</option>
															</select>
														</div>
														<hr />
														<div>
															<label for="listing">Listing</label>
															<select class="form-control" id="listing" name="listedin">
																<option value=""></option>
																<option <?php if($row['listedin'] == 'UGC') echo 'selected'; ?>>UGC</option>
                                                                <option <?php if($row['listedin'] == 'PubMed') echo 'selected'; ?>>PubMed</option>
                                                                <option <?php if($row['listedin'] == 'ICI') echo 'selected'; ?>>ICI</option>
                                                                <option <?php if($row['listedin'] == 'Others') echo 'selected'; ?>>Others</option>
															</select>
														</div>
													</div>
												</div>
												
											</div>
									<br>
									<br>
									</div>
									
									<div class="space-24"></div>
									
									<h3 class="header smaller lighter blue">
										Peer Review & Listings
										<small>Peer Review Status and Listing Information</small>
									</h3>
									
									<div class="row">
										<div class="col-xs-12 col-sm-4">
											<div class="control-group">
												<label class="control-label bolder blue" name="peer">Peer Reviewed</label>
												<div class="radio inline">
													<label>
														<input name="peer" type="radio" class="ace" value="yes" />
														<span class="lbl"> Yes</span>
													</label>
												</div>
												<div class="radio inline">
													<label>
														<input name="peer" type="radio" class="ace" value="no" />
														<span class="lbl"> No</span>
													</label>
												</div>
											</div>
										</div>
										<br>
										<br>
										<div class="col-xs-12 col-sm-4">
											<div class="control-group">
												<label class="control-label bolder blue" name="wos">Listed in Web of Science (Thomas Reuters) (Clarivate Analytics)</label>
												<div class="radio inline">
													<label>
														<input name="wos" type="radio" class="ace" value="yes" />
														<span class="lbl"> Yes</span>
													</label>
												</div>
												<div class="radio inline">
													<label>
														<input name="wos" type="radio" class="ace" value="no" />
														<span class="lbl"> No</span>
													</label>
												</div>
											</div>
										</div>
										<br>
										<br>
										
										<div class="col-xs-12 col-sm-4">
											<div class="control-group">
												<label class="control-label bolder blue" name="scopus">Listed in Scopus</label>
												<div class="radio inline">
													<label>
														<input name="scopus" type="radio" class="ace" value="yes" />
														<span class="lbl"> Yes</span>
													</label>
												</div>
												<div class="radio inline">
													<label>
														<input name="scopus" type="radio" class="ace" value="no" />
														<span class="lbl"> No</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									
									
									<!-- /.row -->

									<hr />
									
									<!-- <hr /> -->
									<div class="row">
										<div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Evidence (Upload)</h4>
													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div class="form-group">
															<div class="col-xs-12">
																<input type="file" id="id-input-file-2" name="evdupload" />
															</div>
														</div>
														<div class="form-group">
															<div class="col-xs-12">
																<input multiple="" type="file" id="id-input-file-3" />
															</div>
														</div>
														<label>
															<input type="checkbox" name="file-format" id="id-file-format" class="ace" />
															<span class="lbl"> Allow only images</span>
														</label>
													</div>
												</div>
											</div>
										
										
										</div>
										<div class="col-sm-4">
										<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Publication Details</h4>

<span class="widget-toolbar">
    <a href="#" data-action="settings">
        <i class="ace-icon fa fa-cog"></i>
    </a>
    <a href="#" data-action="reload">
        <i class="ace-icon fa fa-refresh"></i>
    </a>
    <a href="#" data-action="collapse">
        <i class="ace-icon fa fa-chevron-up"></i>
    </a>
    <a href="#" data-action="close">
        <i class="ace-icon fa fa-times"></i>
    </a>
</span>

<div class="widget-body">
    <div class="widget-main">
        <div>
            <label for="publication-date">Publication Date</label>
            <div class="input-group">
                <input class="form-control date-picker" id="publication-date" value="<?php echo $row['pubdate']; ?>" name="publicationdate" type="text" data-date-format="yyyy-mm-dd" />
                <span class="input-group-addon">
                    <i class="fa fa-calendar bigger-110"></i>
                </span>
            </div>
        </div>

        <hr />

        <div>
            <label for="publication-year">Publication Year</label>
            <input class="form-control" type="number" id="publication-year" name="pubyear" value="<?php echo $row['pubyear']; ?>" placeholder="Enter Publication Year" />
        </div>

        <hr />

        <div class="row">
            <div class="col-xs-6">
                <label for="page-from">Page From</label>
                <input class="form-control" type="number" id="page-from" name="pagefrom" value="<?php echo $row['pagefrom']; ?>" placeholder="Enter Page From" />
            </div>

            <div class="col-xs-6">
                <label for="page-to">Page To</label>
                <input class="form-control" type="number" id="page-to" name="pageto" value="<?php echo $row['pageto']; ?>" placeholder="Enter Page To" />
            </div>
</div>
														</div>
													</div>
												</div>
											</div>
</div>
									
                                    
									<div class="clearfix form-actions">
									<div class="col-md-offset-4 col-md-8">
                                        <button class="btn btn-info" type="submit" name="submit">
                                           <i class="ace-icon fa fa-check bigger-110"></i>
                                              Update
                                        </button>
                                       </div>
									
											
									
								</form>

								
								<div class="row">
									
													</form>
												</div> 
								</div>

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Amity</span>
							University &copy;
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							 
							</a>

							 
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

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

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
	</body>
</html>
