<?php
// Database connection
include_once 'dbConn.php';

// Get form data
$title = $_POST['title'];
$imageName = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];

// Move uploaded image to a folder
$targetPath = "../../votingsystem/includes/gallery/" . $imageName;
move_uploaded_file($imageTmp, $targetPath);

// Insert image details into the database
$query = "INSERT INTO media (mDescription, mlocation) VALUES ('$title', '$targetPath')";
mysqli_query($conn, $query);

// Redirect back to the admin page
header("Location: ../Gallery.php");

?>
