<?php
// Database connection
include_once 'dbConn.php';

// Get image ID from the form
$imageId = $_POST['image_id'];

// Get the file path from the database
$query = "SELECT mlocation FROM media WHERE MID = $imageId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$filePath = $row['mlocation'];

// Delete the image file from the folder
if (file_exists($filePath)) {
    unlink($filePath);
}

// Delete the image from the database
$query = "DELETE FROM media WHERE MID = $imageId";
mysqli_query($conn, $query);

// Redirect back to the admin page
header("Location: ../Gallery.php");
?>