<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Amity University Patna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    
    <!-- External CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-...<insert-correct-hash>...=" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./styles.css" rel="stylesheet">
    
    <style>
        .hidden {
            display: none;
        }
		.logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
        }


    .form-container {
        max-width: 400px;
        padding: 2rem;
        background-color: #1a202c7b;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center; 
    }
		.alert {
			position: absolute;
			top: 20px;
			left: 50%;
			transform: translateX(-50%);
			padding: 15px;
			margin-bottom: 20px;
			border-radius: 4px;
			opacity: 1;
			transition: opacity 0.5s ease-out;
			z-index: 10;
		}

        .alert-success {
            background-color: #28a745;
            color: white;
        }
        .alert-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>

    <script>
        function toggleForm(formId) {
            const forms = ["login-form", "register-form", "forgot-password-form"];
            forms.forEach((id) => {
                document.getElementById(id).classList.add("hidden");
            });
            document.getElementById(formId).classList.remove("hidden");
        }

        function fadeOutAlert() {
            const alert = document.getElementById("auto-fade-alert");
            if (alert) {
                setTimeout(() => {
                    alert.style.opacity = "0";
                }, 2000); // Fade out after 2 seconds
                setTimeout(() => {
                    alert.style.display = "none";
                }, 2500); // Remove from the DOM after the fade-out effect
            }
        }
        
        // Trigger the fade-out function on page load
        window.onload = fadeOutAlert;
    </script>



<?php
    session_start();

    // Database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'scholarsphere';

    // Establish connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle user registration
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
		$email = $_POST['email'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$university = $_POST['university'];
		$department = $_POST['department'];
		$employee_id = $_POST['employee_id'];
		
		// Set a default value for the avatar filename
		$avatar_filename = "default.jpg"; // Set your default image name here or leave it empty
	
		// Check if a file is selected and uploaded successfully
		if (isset($_FILES["avatar_file"]) && $_FILES["avatar_file"]["error"] === UPLOAD_ERR_OK) {
			// File upload handling
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["avatar_file"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
			// Check if file is an image
			$check = getimagesize($_FILES["avatar_file"]["tmp_name"]);
			if ($check === false) {
				echo "File is not an image.";
				$uploadOk = 0;
			}
	
			// Check file size (limit to 2MB)
			if ($_FILES["avatar_file"]["size"] > 2000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
	
			// Allow certain file formats
			$allowed_extensions = array("jpg", "jpeg", "png", "gif");
			if (!in_array($imageFileType, $allowed_extensions)) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
	
			// Try to upload file if all checks are passed
			if ($uploadOk == 1) {
				if (move_uploaded_file($_FILES["avatar_file"]["tmp_name"], $target_file)) {
					$avatar_filename = basename($_FILES["avatar_file"]["name"]);
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		} else {
			// No file was uploaded, proceed without an image
			$avatar_filename = "default.jpg"; // Assign default or leave empty
		}
	
		// Insert user data into database
		$sql = "INSERT INTO registerinfo (emp_id, email, user_name, password, university, department, avatar_filename) 
				VALUES ('$employee_id', '$email', '$user_name', '$password', '$university', '$department', '$avatar_filename')";
		
		if ($conn->query($sql) === TRUE) {
      echo '<div class="alert alert-success" id="auto-fade-alert"><strong>Success!</strong> Registration Completed.</div>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	// Handle user login
	
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Validate user credentials
    $employee_id = $_POST['employee_id'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM registerinfo WHERE emp_id='$employee_id' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $user_name = $row['user_name'];
		$university = $row['university'];
        $department = $row['department'];
		$employee_id = $row['emp_id'];
		$email = $row['email'];
		$avatar_filename = $row['avatar_filename'];
        // Start the session (if not already started)
        session_start();
        
        // Store the username, university, department, email, and emp_id in the session for later use
        $_SESSION['user_name'] = $user_name;
        $_SESSION['university'] = $university;
        $_SESSION['department'] = $department;
		$_SESSION['employee_id'] = $employee_id;
		$_SESSION['email'] = $email;
		$_SESSION['avatar_filename'] = $avatar_filename;

        if($employee_id==1)
		{
			header("Location: index1admin.php");
        exit(); // Ensure that no further code is executed after the redirect
		}
        // Redirect to index1.php
        header("Location: index1.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
      echo '<div class="alert alert-danger" id="auto-fade-alert"><strong>Incorrect!</strong> Retry or Register.</div>';
    }
}

// Handle password retrieval
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['forgot_password'])) {
    // Retrieve email from the form
    $email = $_POST['email'];
    
    // Check if the email exists in the database
    $sql = "SELECT * FROM registerinfo WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Generate a random password reset token
        $token = md5(uniqid(rand(), true));
        
        // Update the user's record in the database with the token
        $sql_update = "UPDATE registerinfo SET reset_token='$token' WHERE email='$email'";
        if ($conn->query($sql_update) === TRUE) {
            // Send email with password reset instructions
            $to = $email;
            $subject = "Password Reset Instructions";
            $message = "Dear User,\r\n\r\nPlease click the following link to reset your password: http://example.com/reset_password.php?token=$token\r\n\r\nThank you.";
            $headers = "From: $email" . "\r\n" .
                       "Reply-To: $email" . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();
            
            if (mail($to, $subject, $message, $headers)) {
                echo "Password reset instructions sent to your email.";
            } else {
                echo "Failed to send password reset instructions.";
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Email not found in our records.";
    }
}
	// Close connection
	$conn->close();
	?>
</head>
<body class="bg-gradient-to-br from-blue-950 to-blue-400 flex items-center justify-center min-h-screen">

    <!-- Form Container -->
    <div class="form-container">

        <!-- Login Form -->
        <div id="login-form">
		<div class="logo-container">
		<img src="amity_logo.png" alt="amity-logo" class="h-8 w-8 text-center">
		</div>

		<h1 class="text-4xl font-light text-center mb-4 text-gray-200">Amity University Patna</h1>

            <p class="text-cyan-400 my-5 font-mono text-center font-bold text-lg">Welcome Back !</p>
            <form method="post" action="">
                <div class="mb-4">
                    <label for="employee_id" class="block text-sm font-medium text-gray-300 mb-2">Employee ID</label>
                    <input type="text" id="employee_id" name="employee_id" placeholder="Your Employee ID" class="shadow-sm rounded-md text-gray-200 w-full px-3 py-2 bg-gray-800 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="shadow-sm text-gray-200 bg-gray-800 rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:outline-none" checked>
                        <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                    </div>
                    <button type="button" onclick="toggleForm('forgot-password-form')" class="text-xs text-indigo-500 hover:text-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Forgot Password?</button>
                </div>
                <button type="submit" name="login" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Login
                </button>
                <div class="mt-4 text-center">
                    <button type="button" onclick="toggleForm('register-form')" class="text-xs text-indigo-500 hover:text-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Account</button>
                </div>
            </form>
        </div>

        <!-- Register Form -->
        <div id="register-form" class="hidden">
            <h1 class="text-2xl font-bold text-center mb-4 text-gray-200">Create an Account</h1>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="user_name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                    <input type="text" id="user_name" name="user_name" placeholder="Your Full Name" class="shadow-sm rounded-md text-gray-200 w-full px-3 py-2 bg-gray-800 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" class="shadow-sm rounded-md text-gray-200 w-full px-3 py-2 bg-gray-800 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="shadow-sm text-gray-200 bg-gray-800 rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="mb-4">
                    <label for="university" class="block text-sm font-medium text-gray-300 mb-2">University</label>
                    <input type="text" id="university" name="university" placeholder="Your University" class="shadow-sm rounded-md text-gray-200 w-full px-3 py-2 bg-gray-800 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="mb-4">
                    <label for="department" class="block text-sm font-medium text-gray-300 mb-2">Department</label>
                    <input type="text" id="department" name="department" placeholder="Your Department" class="shadow-sm rounded-md text-gray-200 w-full px-3 py-2 bg-gray-800 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="mb-4">
                    <label for="employee_id" class="block text-sm font-medium text-gray-300 mb-2">Employee ID</label>
                    <input type="text" id="employee_id" name="employee_id" placeholder="Your Employee ID" class="shadow-sm rounded-md text-gray-200 w-full px-3 py-2 bg-gray-800 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <div class="mb-4">
                    <label for="avatar_file" class="block text-sm font-medium text-gray-300 mb-2">Profile Picture</label>
                    <input type="file" id="avatar_file" name="avatar_file" class="shadow-sm text-gray-200 bg-gray-800 rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500">
                </div>
                <button type="submit" name="register" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Register
                </button>
                <div class="mt-4 text-center">
                    <button type="button" onclick="toggleForm('login-form')" class="text-xs text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Already have an account? Login</button>
                </div>
            </form>
        </div>

        <!-- Forgot Password Form -->
        <div id="forgot-password-form" class="hidden">
            <h1 class="text-2xl font-bold text-center mb-4 text-gray-200">Forgot Password</h1>
            <form method="post" action="">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" class="shadow-sm rounded-md text-gray-200 w-full px-3 py-2 bg-gray-800 border border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500" required>
                </div>
                <button type="submit" name="reset_password" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Reset Password
                </button>
                <div class="mt-4 text-center">
                    <button type="button" onclick="toggleForm('login-form')" class="text-xs text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Back to Login</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
