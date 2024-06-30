<?php
include_once 'dbConn.php';

// IMAGE UPLOAD
if (isset($_POST['upload'])) {

    // Get form data
    $cnic = $_POST['NIC'];
    $image = $_FILES['img']['tmp_name'];

    // Read the image file
    $imgContent = file_get_contents($image);

    // Insert image data into the database
    $sql = "INSERT INTO contestant_image (cNIC, ImageFile) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $cnic, $imgContent);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../ContestantImage.php?entry=Uploaded Successfully");
    } else {
        header("Location: ../ContestantImage.php?error1= Unable to Upload Image");
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// IMAGE DISPLAY
else if (isset($_POST['display'])) {
    // Get form data
    $cnic2 = $_POST['NIC'];

    // Retrieve image data from the database
    $sql1 = "SELECT ImageFile FROM contestant_image WHERE cNIC = '$cnic2'";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        $row1 = mysqli_fetch_assoc($result1);
        $imageData = $row1['ImageFile'];
        header("Content-type: image/jpeg");
        echo $imageData;
        exit();
    } else {
        header("Location: ../ContestantImage.php?error1=Image not found");
        exit();
    }
} 


// Check if the form is submitted for deleting the image
if (isset($_POST['delete'])) {
    // Get form data

    // Delete image data from the database
    $sql3 = "DELETE FROM contestant_image WHERE cNIC = '{$_POST['NIC']}'";
    echo $sql3;
    $result3 = mysqli_query($conn, $sql3);

    if ($result3) {
        header("Location: ../ContestantImage.php?entry=Image deleted successfully");
    } else {
        header("Location: ../ContestantImage.php?error1=Unable to delete image");
    }
} else {
    header("Location: ../ContestantImage.php");
    exit();
}
