<?php
include 'commonAdmin.php'
?>
    <style>
        form {
            margin: 20px;
            padding:5px;
        }
        input[type="text"] {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        h3 {
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .table-container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <div class="flex items-center justify-center">
        <form method="post" action="">
            <input type="text" name="author" placeholder="Faculty" value="<?php echo isset($author) ? htmlspecialchars($author) : ''; ?>">
            <input type="text" name="department" placeholder="Department" value="<?php echo isset($department) ? htmlspecialchars($department) : ''; ?>">
            <input type="text" name="year" placeholder="Year" value="<?php echo isset($year) ? htmlspecialchars($year) : ''; ?>">
            <input type="text" name="title" placeholder="Title" value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
            <button class="mt-2 bg-green-300 px-3 py-2 rounded-md" type="submit"><i class="fa-duotone fa-solid fa-magnifying-glass"></i>Search</button>
        </form>
        <br><br>
    </div>

    <?php
    $servername = "localhost";  
    $username = "root";         
    $password = "";             
    $dbname = "scholarsphere";  

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $author = isset($_POST['author']) ? trim($_POST['author']) : '';
    $department = isset($_POST['department']) ? trim($_POST['department']) : '';
    $year = isset($_POST['year']) ? trim($_POST['year']) : '';
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';

    $columnMappings = [
        'bookchaptersbyfaculty' => [
            'Faculty' => 'Author',
            'Department' => 'Department',
            'pubyear' => 'Year',
            'booktitle' => 'Title'
        ],
        'booksbyfaculty' => [
            'Faculty' => 'Author',
            'Department' => 'Department',
            'pubyear' => 'Year',
            'booktitle' => 'Title'
        ],
        'papersbyfaculty' => [
            'Faculty' => 'Author',
            'Department' => 'Department',
            'pubyear' => 'Year',
            'booktitle' => 'Title'
        ],
        'researchpapersbyfaculty' => [
            'Faculty' => 'Author',
            'Department' => 'Department',
            'pubyear' => 'Year',
            'papertitle' => 'Title'
        ]
    ];

    $hasResults = false;

    function displayTable($conn, $tableName, $columns, $conditions, $columnMappings) {
        global $hasResults;
        $existingColumns = [];
        $result = $conn->query("SHOW COLUMNS FROM $tableName");
        while ($row = $result->fetch_assoc()) {
            $existingColumns[] = $row['Field'];
        }

        $sql = "SELECT * FROM $tableName WHERE 1=1";
        foreach ($conditions as $column => $value) {
            if (isset($value) && $value !== '' && in_array($column, $existingColumns)) {
                $value = $conn->real_escape_string($value);
                if ($column === 'booktitle' || $column === 'papertitle') {
                    $sql .= " AND LOWER($column) LIKE LOWER('%$value%')";
                } elseif ($column === 'pubyear' && $value === '0') {
                    $sql .= " AND $column = 0";
                } else {
                    $sql .= " AND LOWER($column) LIKE LOWER('%$value%')";
                }
            }
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $hasResults = true;
            echo "<div class='table-container'>";
            echo "<h3>" . ucfirst($tableName) . "</h3>"; 
            echo "<table class='styled-table'>";
            echo "<tr>";
            foreach ($columns as $column) {
                $displayName = isset($columnMappings[$tableName][$column]) ? $columnMappings[$tableName][$column] : $column;
                echo "<th>$displayName</th>";
            }
            echo "</tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($columns as $column) {
                    echo "<td>" . (isset($row[$column]) ? $row[$column] : '') . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $author = isset($_POST['author']) ? trim($_POST['author']) : '';
        $department = isset($_POST['department']) ? trim($_POST['department']) : '';
        $year = isset($_POST['year']) ? trim($_POST['year']) : '';
        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    
        if (!empty($author) || !empty($department) || !empty($year) || !empty($title)) {
            foreach ($columnMappings as $tableName => $columns) {
                $conditions = [
                    'Department' => $department,
                    'Faculty' => $author,
                    'pubyear' => $year,
                    'booktitle' => $title,
                    'papertitle' => $title
                ];
                displayTable($conn, $tableName, array_keys($columns), $conditions, $columnMappings);
            }
    
            if (!$hasResults) {
                echo "<script>showAlert('No results found.');</script>";
            }
        } else {
            echo "<script>showAlert('Please enter a value in at least one filter field.');</script>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
