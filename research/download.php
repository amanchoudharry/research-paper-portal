<?php
// Check if a file is requested via the 'file' parameter in the URL
if (isset($_GET['file'])) {
    // Get the file name from the URL parameter (sanitize input for security)
    $filename = basename($_GET['file']);
    $filepath = "uploads/" . $filename; // Define the path where files are stored

    // Check if the file exists
    if (file_exists($filepath)) {
        // Set headers to force download
        header('Content-Description: File Transfer');
        
        // Detect the file extension and set the appropriate Content-Type
        $file_extension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        switch ($file_extension) {
            case "jpg":
            case "jpeg":
                header("Content-Type: image/jpeg");
                break;
            case "png":
                header("Content-Type: image/png");
                break;
            case "pdf":
                header("Content-Type: application/pdf");
                break;
            default:
                header("Content-Type: application/octet-stream");
        }
        
        // These headers force the browser to download the file
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($filepath));
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Content-Transfer-Encoding: binary');

        // Read the file and send it to the browser
        readfile($filepath);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "No file specified.";
}
?>
