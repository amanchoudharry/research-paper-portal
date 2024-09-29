<?php
include "commonAdmin.php";
include "connect.php";
?>
<div class="main-content p-2 bg-purple-100 w-full overflow-hidden min-h-screen">
    <div class="main-content-inner">
        <nav class="p-3" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li>
                    <a href="index1Admin.php" class="text-blue-400 hover:text-blue-700 flex items-center">
                        <i class="fa fa-home mr-2"></i>Home
                    </a>
                </li>
                <li>
                    <span class="mx-2 text-gray-700">/</span>
                </li>
                <li>
                    <a href="#" class="text-blue-400 hover:text-blue-700">Reports</a>
                </li>
                <li>
                    <span class="mx-2 text-gray-700">/</span>
                </li>
                <li class="text-blue-400">Conference Papers</li>
            </ol>
        </nav>
	</div>

    <style>
        .table-responsive {
            max-width: 1600px;
            margin: auto;
            max-height: 50rem;
            overflow-x: auto;
            border: 1px solid #ddd;
            background-color: white;
        }
        .modal-table-responsive {
            max-width: 1600px;
            margin: auto;
            max-height: 50rem;
            overflow-x: auto;
            border: 1px solid #ddd;
            background-color: white;
        }

        #papersTable tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        #papersTable tbody tr:nth-child(even) {
            background-color: #eef2ff;
        }

        #papersTable thead {
            background-color: #9370DB;
            color: white;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease;
        }

        .btn-icon.edit {
            background-color: #60a5fa;
        }

        .btn-icon.edit:hover {
            background-color: #3b82f6;
        }

        .btn-icon.delete {
            background-color: #f87171;
        }

        .btn-icon.delete:hover {
            background-color: #ef4444;
        }

        .btn-icon i {
            font-size: 1.0rem;
            color: white;
        }

        /* Modal styling */
        .modal {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
        justify-content: center; /* Horizontally center */
        align-items: center; /* Vertically center */
    }

        .modal-content {
            background-color: rgba(243 232 255 0);
            padding: 1rem;
            border-radius: 0.5rem;
            width: 90%;
            max-width: 100%;
            max-height: 100%;
            overflow: auto;
            margin-top:10rem;
        }

        .close {
            color:#f87171;
            font-size: 28px;
            font-weight: bold;
            float:right;
        }

        .close:hover,
        .close:focus {
            color: red ;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <div class="flex justify-center p-2 m-5">
        <div class="table-responsive p-2 rounded-md">
            <?php
            $emp_id = $_SESSION['employee_id'];
            $sql = "SELECT * FROM papersbyfaculty WHERE status=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table id="papersTable" class="min-w-full border-collapse bg-white border-gray-200 text-left">';
                echo '<thead>';
                echo '<tr>';
				echo '<th class="px-4 py-2">Edit</th>';
				echo '<th class="px-4 py-2">Delete</th>';
				echo '<th class="px-4 py-2">ID</th>';
				echo '<th class="px-4 py-2">University</th>';
				echo '<th class="px-4 py-2">Department</th>';
				echo '<th class="px-4 py-2">Faculty/Scientist</th>';
				echo '<th class="px-4 py-2">Employee ID</th>';
				echo '<th class="px-4 py-2">Author/s</th>';
				echo '<th class="px-4 py-2">Co-author</th>';
				echo '<th class="px-4 py-2">Paper Title</th>';
				echo '<th class="px-4 py-2">Journal</th>';
				echo '<th class="px-4 py-2">Conference</th>';
				echo '<th class="px-4 py-2">Conference Paper</th>';
				echo '<th class="px-4 py-2">ISSN</th>';
				echo '<th class="px-4 py-2">ISBN</th>';
                echo '<th class="px-4 py-2">Evidence Upload</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="hover:bg-gray-100 cursor-pointer" data-row=\'' . json_encode($row) . '\'>';
                    echo '<td class="border px-4 py-2 text-center"><a href="editReoResearchpaperAdmin.php?id=' . $row['srNo'] . '" class="btn-icon edit"><i class="fas fa-edit"></i></a></td>';
                    echo '<td class="border px-4 py-2 text-center">
                            <form method="post" action="deleteReoResearchPaperAdmin.php">
                                <input type="hidden" name="srNo" value="' . $row['srNo'] . '">
                                <button type="submit" class="btn-icon delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                          </td>';
						  echo '<td class="border px-4 py-2">' . $row['srNo'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['University'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['Department'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['Faculty'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['Employee ID'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['other Author'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['Co-author'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['booktitle'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['journalname'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['conferenceName'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['conferencePaper'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['issn'] . '</td>';
						  echo '<td class="border px-4 py-2">' . $row['isbn'] . '</td>';
                          echo '<td class="border px-4 py-2">
                    <a href="download.php?file=' . urlencode($row['evdupload']) . '" class="text-blue-500 underline">Download</a>
                  </td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            }
            else {
                echo '<p class="text-gray-800 text-2xl">No Papers found.</p><br><p class="text-gray-800 text-md">The entries will appear on the <a href="index1admin.php" class="text-blue-500">Dashboard</a> before approval. After it is approved, it will be visible here.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="rowModal" class="modal">
    <div class="flex justify-center">
    <div class="modal-content">
    <span class="close">&times;</span>
        <div class="modal-table-responsive p-2 rounded-md">
        <div id="modalBody">
            <!-- Dynamic content will be injected here -->
        </div>
        </div>
    </div>
    </div>
</div>
</div>

<?php include "footer.php"; ?>
</body>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        // Make the table interactive with DataTables plugin
        $('#papersTable').DataTable();
    });
</script>


<script>
$(document).ready(function() {
    // Handle row click event using event delegation
    $(document).on('click', '#papersTable tbody tr', function() {
        var rowData = $(this).data("row");
        if (rowData) {
            var modalContent = '<table class="min-w-full table-auto ">';
            modalContent += '<thead class=" bg-purple-100 "><tr>';

            // Create table headers
            $.each(rowData, function(key) {
                modalContent += '<th class="font-semibold px-4 py-2 text-left">' + key + '</th>';
            });

            modalContent += '</tr></thead><tbody><tr>';

            // Create table data
            $.each(rowData, function(key, value) {
                modalContent += '<td class="px-4 py-2 border">' + value + '</td>';
            });

            modalContent += '</tr></tbody></table>';
            $("#modalBody").html(modalContent);
            $("#rowModal").show();
        }
    });

    // Close the modal when the close button is clicked
    $(".close").click(function() {
        $("#rowModal").hide();
    });

    // Close the modal when clicking outside of the modal content
    $(window).click(function(event) {
        if (event.target.id === "rowModal") {
            $("#rowModal").hide();
        }
    });
});
</script>

</html>
