<?php
session_start();
if (!isset($_SESSION['employee_id'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit;
}
// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Research Papers - Amity University Patna</title>
    <link rel="icon" href="amity_logo.png" type="image/png">

    <meta name="description" content="Common form elements and layouts" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-...<insert-correct-hash>...=" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./styles.css" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs" defer></script>
    

    <style>
        .step {
            width: 30px;
            height: 30px;
            border-radius: 25%;
            background-color: #e2e8f0;
            display: inline-block;
            text-align: center;
            line-height: 30px;
            color: white;
        }
        .step.active {
            background-color: #3b82f6;
        }
        .step.completed {
            background-color: #10b981;
        }

        /* Add custom styles for the top navbar */
        .nav-item:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 50;
        }

        .dropdown-menu a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .sticky {
        z-index: 50;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        .nav-item.active > a {
            background-color: #3b82f6;
            color: #fff;
        }

        /* Adjust icons */
        .nav-item .fa-angle-down {
            transition: transform 0.3s ease;
        }

        .nav-item:hover .fa-angle-down {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal min-h-screen">

    <!-- Navbar -->
    <nav class="shadow-md sticky top-0 left-0" style="font-size:13px;">
        <div class="max-w-auto bg-blue-200 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14">
                <div class="flex">
                    <a href="index1.php" class="flex items-center">
                        <img src="amity_logo.png" alt="amity-logo" class="h-8 w-8">
                        <span class="ml-3 text-xl font-serif text-grey-500 md:text-sm">Amity University Patna</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <!-- Top Navigation Menu -->
                    <ul class="flex space-x-4">
                        <li class="nav-item">
                            <a href="index1.php" class="px-4 py-2 text-lg font-thin hover:bg-gradient-to-b from-blue-200 to-blue-50 rounded-lg flex items-center" style="font-size:15px;">
                                <i class="fa fa-home mr-2"></i> Home
                            </a>
                        </li>
                        <li class="nav-item relative">
                            <a href="#" class="px-4 py-2 hover:bg-gradient-to-b text-lg font-thin from-blue-200 to-blue-50 rounded-lg flex items-center" style="font-size:15px;">
                                <i class="fa fa-list-alt mr-2"></i> Forms <i class="fa fa-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu rounded-b-lg">
                                <a href="ResearchPaper.php"><i class="fa fa-file-text mr-2"></i> Research Paper</a>
                                <a href="Chapters.php"><i class="fa fa-file mr-2"></i> Chapter</a>
                                <a href="Papers.php"><i class="fa fa-file-powerpoint mr-2"></i> Conference Paper</a>
                                <a href="books.php"><i class="fa fa-book mr-2"></i> Books Published</a>
                            </div>
                        </li>
                        <li class="nav-item relative">
                            <a href="#" class="px-4 py-2 hover:bg-gradient-to-b text-lg font-thin from-blue-200 to-blue-50 rounded-lg flex items-center" style="font-size:15px;">
                                <i class="fa fa-list mr-2"></i> View Reports <i class="fa fa-angle-down ml-1"></i>
                            </a>
                            <div class="dropdown-menu rounded-b-lg">
                                <a href="ReoResearchpaper.php"><i class="fa fa-file-text mr-2"></i> Research Papers</a>
                                <a href="Reochapters.php"><i class="fa fa-book mr-2"></i> Chapters</a>
                                <a href="Reopapers.php"><i class="fa fa-file-powerpoint mr-2"></i> Conference Paper</a>
                                <a href="ReoBooks.php"><i class="fa fa-book-open mr-2"></i> Books Published</a>
                            </div>
                        </li>
                        <li class="nav-item relative">
                        <div class="relative ml-4" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center focus:outline-none">
                            <?php
                                if (isset($_SESSION['employee_id'])) {
                                    $employee_id = $_SESSION['employee_id'];
                                    $conn = new mysqli('localhost', 'root', '', 'scholarsphere');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $sql = "SELECT avatar_filename FROM registerinfo WHERE emp_id = $employee_id";
                                    $result = $conn->query($sql);
                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $avatar_filename = $row['avatar_filename'];
                                        echo '<img class="h-12 w-12 rounded-full" src="uploads/' . $avatar_filename . '" alt="User Avatar">';
                                    } else {
                                        echo '<img class="h-8 w-8 rounded-full" src="assets/images/avatars/default-avatar.jpg" alt="Default Avatar">';
                                    }
                                    $conn->close();
                                }
                            ?>
                            <span class="ml-2 text-gray-900">Welcome<br> <b><?php echo $_SESSION['user_name'] ?></b>,
                            <?php echo $_SESSION['department']?></span>
                        </button>
                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md overflow-hidden" x-cloak>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Settings</a>
                            <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Profile</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-200">Logout</a>
                        </div>
                    </div>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-container max-w-full">
        <!-- Your main content here -->
 

