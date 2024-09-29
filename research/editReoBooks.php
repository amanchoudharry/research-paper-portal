<?php
ob_start(); // Starts output buffering
include "common.php";
?>
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
    $faculty = $_POST['author_name'];
    $emp_id = $_POST['emp_id'];
    $otherauthor = $_POST['author_name'];
    $coauthor = $_POST['corresponding_coauthor_name'];
    $booktitle = $_POST['paper_title'];
    // $journalname=$_POST['journalname'];
	// $article=$_POST['article'];
	$National=$_POST['National'];
    // $region = $_POST['National'];
    $publicationdate = $_POST['publicationdate'];
    $pubyear = $_POST['pubyear'];
    $edition = $_POST['edition'];
    $pagefrom = $_POST['pagefrom'];
    $pageto = $_POST['pageto'];
    // $impact=$_POST['impact'];
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
    $link=$_POST['nocit'];
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
    $sql = "UPDATE booksbyfaculty SET University='$university', Department='$department', Faculty='$faculty', `Employee ID`='$emp_id', `other Author`='$otherauthor', `Co-author`='$coauthor', booktitle='$booktitle', region='$National', pubdate='$publicationdate', pubyear='$pubyear', volume='$edition', pagefrom='$pagefrom', pageto='$pageto', scopus='$scopus', listedin='$listedin', wos='$wos', peer='$peer', issn='$issn', isbn='$isbn', pubname='$pubname', affltn='$affltn', corrauthor='$corrauthor', citind='$citind', nocit='$nocit',evdupload='$destination', othrinfo='$othrinfo', ref='$ref' WHERE srNo='$id'";

    if ($conn->query($sql) === TRUE) {
        // JavaScript to show a success message and then redirect
        echo "<script>
            alert('Data updated successfully!');
            window.location.href = 'index1.php';
            </script>";
        exit();
    } else {
        // JavaScript to show an error message and then redirect to error page
        echo "<script>
            alert('Error updating data: " . $conn->error . "');
            window.location.href = 'error.php';
            </script>";
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
   
    $sql = "SELECT * FROM booksbyfaculty WHERE srNo = ?";

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
<!-- Main Content -->
				

			<main class="flex-1 p-2 bg-gradient-to-br from-blue-200 to-white min-h-screen">
				<!-- PAge Navigatn -->
				<div class="main-content-inner">
						<nav class=" bg-inherit bg-blue-500 w-full" aria-label="breadcrumb">
							<ol class="list-reset flex">
								<li>
									<a href="index1.php" class=" text-blue-400 hover:text-blue-700 flex items-center">
										<i class="fa fa-home mr-2"></i>Home
									</a>
								</li>
								<li>
									<span class="mx-2 text-gray-500">/</span>
								</li>
								<li>
									<a href="#" class="text-blue-400 hover:text-blue-700">Forms</a>
								</li>
								<li>
									<span class="mx-2 text-gray-500">/</span>
								</li>
								<li class="text-gray-500">Books Published</li>
							</ol>
						</nav>
				</div>
				
<!-- <div class=""> -->
<div class="container  mx-auto p-6 max-w-7xl bg-white rounded-lg shadow-lg">
	<!-- Step Indicator -->
	<div class="mb-8 px-10">
		<div class="flex justify-between mb-4">
			<div class="step completed">1</div>
			<div class="step">2</div>
			<div class="step">3</div>
		</div>
	</div>
	<form class="space-y-6" method="post" action="editReoBooks.php" enctype="multipart/form-data">
		<!-- Section 1: Basic Details -->
		<div id="section1" class="form-section active ">
			<input type="hidden" name="srNo" value="<?php echo $row['srNo']; ?>">
			<input type="hidden" name="university" value="<?php echo $_SESSION['university'] ?>">
			<input type="hidden" name="department" value="<?php echo $_SESSION['department'] ?>">
			<input type="hidden" name="author_name" value="<?php echo $_SESSION['user_name'] ?>">
			<input type="hidden" name="emp_id" value="<?php echo $row['Employee ID']; ?>">

			<h4 class="text-lg font-semibold text-gray-900">Basic Details</h4>
			<hr class="w-full max-w-xs mb-4">

			<div class=" my-10">
				<label for="form-field-5" class="block text-sm font-medium text-gray-700">Corresponding author's Name<span class="text-red-500">*</span></label>
				<input required type="text" id="form-field-5" name="corresponding_coauthor_name" value="<?php echo $row['Co-author']; ?>" placeholder="Enter Corresponding author's Name" class="mt-1 w-full max-w-md px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
			</div>

			<div class="my-10">
				<label for="paper_title" class="block text-sm font-medium text-gray-700">Title of Book<span class="text-red-500">*</span></label>
				<input required type="text" name="paper_title" id="paper_title" value="<?php echo $row['booktitle']; ?>" placeholder="Enter Title of Book" class="mt-1 w-full max-w-md px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
			</div>
			<div class="flex justify-between mt-10">
				<button type="button" id="next1" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white-500 focus:ring-offset-5">Next ></button>
			</div>
		</div>

		<!-- Section 2: Publication Details -->
		<div id="section2" class="form-section">
			<h4 class="text-lg font-semibold text-gray-900">Book Submission</h4>
			<hr class="w-full max-w-xs mb-4">
			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

				<!-- Publisher Name -->
				<div class="mb-4">
					<label for="publisher" class="block text-sm font-medium text-gray-700">Name of Publisher<span class="text-red-500">*</span></label>
					<input required type="text" name="pubname" id="publisher" value="<?php echo $row['pubname']; ?>" placeholder="Enter Name of Publisher" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>
				<!-- Institutional Affiliations -->
				<div class="mb-4">
					<label for="institutional-affiliations" class="block text-sm font-medium text-gray-700">Institutional Affiliations<span class="text-red-500">*</span></label>
					<input required type="text" name="affltn" id="institutional-affiliations" value="<?php echo $row['affltn']; ?>" placeholder="Enter Institutional Affiliations" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>

				<!-- Corresponding Author -->
				<div class="mb-4">
					<label for="corresponding-author" class="block text-sm font-medium text-gray-700">Corresponding Author<span class="text-red-500">*</span></label>
					<input required type="text" name="corrauthor" id="corresponding-author" value="<?php echo $row['corrauthor']; ?>" placeholder="Enter Corresponding Author" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>

				<!-- Any Other Information -->
				<div class="mb-4">
					<label for="additional-info" class="block text-sm font-medium text-gray-700">Any Other Information</label>
					<textarea name="othrinfo" id="additional-info" placeholder="Enter Any Other Information" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?php echo $row['othrinfo']; ?></textarea>
				</div>
				<!-- Reference -->
				<div class="mb-4">
					<label for="reference" class="block text-sm font-medium text-gray-700">Reference</label>
					<textarea name="ref" id="reference" placeholder="Enter Reference" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?php echo $row['ref']; ?></textarea>
				</div>
			</div>
			<h4 class="text-lg font-semibold">Evidence (Upload)<span class="text-red-500">*</span></h4>
			<hr class="w-full max-w-xs mb-4">

				<div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
					<div class="space-y-4">
					<div class="mb-4">
						<input type="file" id="file-input" name="evdupload" class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
							</div>
							<div class="h-40 overflow-hidden border border-gray-200 p-2 rounded-lg">
											<div id="preview-container" class="flex flex-wrap gap-4">
												<?php if (!empty($row['evdupload'])): ?>
													<!-- Display image preview -->
													<?php if (preg_match('/\.(jpg|jpeg|png|gif)$/', $row['evdupload'])): ?>
														<img src="<?php echo $row['evdupload']; ?>" alt="Uploaded Image" class="h-full w-auto object-cover rounded-lg" />
													<?php else: ?>
														<!-- Display file link -->
														<a href="<?php echo $row['evdupload']; ?>" target="_blank" class="text-blue-500 underline">View Uploaded File (Images are shown here, PDFs will shown in new Tab)</a>
													<?php endif; ?>
												<?php else: ?>
													<p>No file uploaded yet.</p>
												<?php endif; ?>
											</div>
							</div>
										<!-- Link to the file -->
										<?php if (!empty($row['evdupload'])): ?>
											<div class="mt-2">
												<a href="<?php echo $row['evdupload']; ?>" target="_blank" class="text-blue-500 underline">Download/View Uploaded File</a>
											</div>
										<?php endif; ?>
					</div>
				</div>

				<script>
				const fileInput = document.getElementById('file-input');
				const previewContainer = document.getElementById('preview-container');
				fileInput.addEventListener('change', function(event) {
				const file = event.target.files[0];

				// Clear previous preview
				previewContainer.innerHTML = '';

				if (file) {
				const fileReader = new FileReader();
				fileReader.onload = function(e) {
				const image = document.createElement('img');
				image.src = e.target.result;
				image.className = 'max-w-full h-32 object-cover rounded'; // Adjusted height to 32
				previewContainer.appendChild(image);
				};
				fileReader.readAsDataURL(file);
				}
				});
				</script>
				<div class="flex justify-between mt-8">
				<button type="button" id="prev2" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-white-500 focus:ring-offset-5">< Previous</button>
				<button type="button" id="next2" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white-500 focus:ring-offset-5">Next ></button>
			</div>
		</div>

		
		<!-- section 3 -->
		<div id="section3" class="form-section">
			<h4 class="mt-6 text-lg font-semibold  text-gray-900">Peer Review & Listings</h4>
			<hr class="w-full max-w-xs mb-4">			
			<h1 class="mt-0.5 text-lg font-thin  text-blue-500 mb-4">Peer Review Status and Listing Information :</h1>
			<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
				<!-- Peer Reviewed -->
				<div>
					<div class="mb-4">
						<label for="peer" class="block text-sm font-medium text-gray-700">Peer Reviewed<span class="text-red-500">*</span></label>
						<div class="flex items-center space-x-4">
							<label class="inline-flex items-center">
								<input required name="peer" <?php if($row['peer'] == 'y') echo 'checked'; ?> type="radio" class="form-radio text-blue-500" value="y" />
								<span class="ml-2 mr-2">Yes</span>
							</label>
							<label class="inline-flex items-center">
								<input required name="peer" <?php if($row['peer'] == 'n') echo 'checked'; ?> type="radio" class="form-radio text-blue-500" value="n" />
								<span class="ml-2 mr-2">No</span>
							</label>
						</div>
					</div>
				</div>

				
				<!-- Listed in Scopus -->
				<div>
					<div class="mb-4">
						<label for="scopus" class="block text-sm font-medium text-gray-700">Listed in Scopus<span class="text-red-500">*</span></label>
						<div class="flex items-center space-x-4">
							<label class="inline-flex items-center">
								<input required name="scopus" <?php if($row['scopus'] == 'y') echo 'checked'; ?> type="radio" class="form-radio text-blue-500" value="y" />
								<span class="ml-2 mr-2">Yes</span>
							</label>
							<label class="inline-flex items-center">
								<input required name="scopus" <?php if($row['scopus'] == 'n') echo 'checked'; ?> type="radio" class="form-radio text-blue-500" value="n" />
								<span class="ml-2 mr-2">No</span>
							</label>
						</div>
					</div>
				</div>
				<!-- Listed in Web of Science -->
				<div>
					<div class="mb-4">
						<label for="wos" class="block text-sm font-medium text-gray-700">Listed in Web of Science (Thomas Reuters) (Clarivate Analytics)<span class="text-red-500">*</span></label>
						<div class="flex items-center space-x-4">
							<label class="inline-flex items-center">
								<input required name="wos" <?php if($row['wos'] == 'y') echo 'checked'; ?> type="radio" class="form-radio text-blue-500" value="y" />
								<span class="ml-2 mr-2">Yes</span>
							</label>
							<label class="inline-flex items-center">
								<input required name="wos" <?php if($row['wos'] == 'n') echo 'checked'; ?> type="radio" class="form-radio text-blue-500" value="n" />
								<span class="ml-2 mr-2">No</span>
							</label>
						</div>
					</div>
				</div>
			</div>
		<h4 class="text-lg font-semibold text-gray-900">Publication Details</h4>
		<hr class="w-full max-w-xs mb-4">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<!-- Volume/Edition -->
				<div class="mb-4">
					<label for="volume-edition" class="block text-sm font-medium text-gray-700">Volume/Edition<span class="text-red-500">*</span></label>
					<input required type="number" name="edition" id="volume-edition" value="<?php echo $row['volume']; ?>" placeholder="Enter Volume/Edition" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>



				<!-- ISSN -->
				<div class="mb-4">
					<label for="issn" class="block text-sm font-medium text-gray-700">ISSN<span class="text-red-500">*</span></label>
					<input required type="text" name="issn" id="issn" value="<?php echo $row['issn']; ?>" placeholder="Enter ISSN" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>
				<!-- Citation Index -->
				<div class="mb-4">
					<label for="citation-index" class="block text-sm font-medium text-gray-700">Citation Index<span class="text-red-500">*</span></label>
					<input required type="number" name="citind" id="citation-index" value="<?php echo $row['citind']; ?>"  placeholder="Enter Citation Index" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>


				<!-- ISBN -->
				<div class="mb-4">
					<label for="isbn" class="block text-sm font-medium text-gray-700">ISBN<span class="text-red-500">*</span></label>
					<input required type="text" name="isbn" id="isbn" value="<?php echo $row['isbn']; ?>" placeholder="Enter ISBN" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>
				<!-- Number of Citations -->
				<div class="mb-4">
					<label for="num-citations" class="block text-sm font-medium text-gray-700">Number of Citations<span class="text-red-500">*</span></label>
					<input required type="number" name="nocit" id="num-citations" value="<?php echo $row['nocit']; ?>" placeholder="Enter Number of Citations" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
				</div>
				</div>
				
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div class="mb-4">
					<label for="region" class="block text-sm font-medium text-gray-700">Region<span class="text-red-500">*</span></label>
					<select id="region" name="National" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
						<option value=""></option>
						<option value="National" <?php if($row['region'] == 'National') echo 'selected'; ?>>National</option>
                        <option value="International" <?php if($row['region'] == 'International') echo 'selected'; ?>>International</option>
					</select>
				</div>
				<div class="mb-4 ">
					<label for="listing" class="block text-sm font-medium text-gray-700">Listing<span class="text-red-500">*</span></label>
					<select id="listing" name="listedin" class="mt-1 w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
						<option value=""></option>
						<option <?php if($row['listedin'] == 'UGC') echo 'selected'; ?>>UGC</option>
                        <option <?php if($row['listedin'] == 'PubMed') echo 'selected'; ?>>PubMed</option>
                        <option <?php if($row['listedin'] == 'ICI') echo 'selected'; ?>>ICI</option>
                        <option <?php if($row['listedin'] == 'Others') echo 'selected'; ?>>Others</option>
					</select>
				</div>
				<div class="mb-6">
					<label for="publication-date" class="block text-gray-700 font-semibold mb-2">Publication Date<span class="text-red-500">*</span></label>
					<div class="flex items-center">
						<input required class="form-control date-picker w-full max-w-md px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="publicationdate" name="publicationdate" value="<?php echo $row['pubdate']; ?>" type="date" data-date-format="yyyy-mm-dd" />
					</div>
				</div>
				<div class="mb-6">
					<label for="publication-year" class="block text-gray-700 font-semibold mb-2">Publication Year<span class="text-red-500">*</span></label>
					<input required class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" id="publication-year" name="pubyear" value="<?php echo $row['pubyear']; ?>" placeholder="Enter Publication Year" />
				</div>
					<div>
						<label for="page-from" class="block text-gray-700 font-semibold mb-2">Page From<span class="text-red-500">*</span></label>
						<input required class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" id="page-from" name="pagefrom" value="<?php echo $row['pagefrom']; ?>" placeholder="Enter Page From" />
					</div>

					<div>
						<label for="page-to" class="block text-gray-700 font-semibold mb-2">Page To<span class="text-red-500">*</span></label>
						<input required class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" id="page-to" name="pageto" value="<?php echo $row['pageto']; ?>" placeholder="Enter Page To" />
					</div>
				</div>

				<div class="flex justify-between mt-8">
					<button type="button" id="prev3" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-white-500 focus:ring-offset-5">< Previous</button>
					<div class="flex justify-between">
					<button type="submit" id="submit" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white-500 focus:ring-offset-5">Update</button>
				</div>
		</div>
	</div>
			
	</form>
</div>

<script>
    const steps = document.querySelectorAll('.step');
    const formSections = document.querySelectorAll('.form-section');
    let currentSection = 0;

    function showSection(index) {
        formSections.forEach((section, i) => {
            section.classList.toggle('hidden', i !== index);
        });
        steps.forEach((step, i) => {
            step.classList.toggle('completed', i < index);
            step.classList.toggle('active', i === index);
        });
    }

    function validateSection(section) {
        // Get all required inputs in the current section
        const requiredInputs = section.querySelectorAll('[required]');
        let isValid = true;

        requiredInputs.forEach(input => {
            // Check if the input is empty
            if (!input.value) {
                isValid = false;
                input.classList.add('border-red-500'); // Highlight empty fields
            } else {
                input.classList.remove('border-red-500');
            }
        });

        return isValid;
    }

    document.getElementById('next1').addEventListener('click', () => {
        const currentFormSection = formSections[currentSection];
        
        // Validate current section before moving forward
        if (validateSection(currentFormSection)) {
            currentSection++;
            showSection(currentSection);
        } else {
            alert('Please fill out all required fields.');
        }
    });

    document.getElementById('prev2').addEventListener('click', () => {
        currentSection--;
        showSection(currentSection);
    });

    document.getElementById('next2').addEventListener('click', () => {
        const currentFormSection = formSections[currentSection];
        
        if (validateSection(currentFormSection)) {
            currentSection++;
            showSection(currentSection);
        } else {
            alert('Please fill out all required fields.');
        }
    });

    document.getElementById('prev3').addEventListener('click', () => {
        currentSection--;
        showSection(currentSection);
    });

    // Initialize the form by showing the first section
    showSection(currentSection);
</script>

</div>
						
					</div>
				
			</main>

			<?php
			include "footer.php";
			?>



			<!-- </div>/.main-container -->
		</div>
	</body>
</html>