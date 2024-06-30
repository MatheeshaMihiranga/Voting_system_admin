<?php
include_once 'dbConn.php';

if (isset($_GET['delID'])) {

    $uEmail = $_GET['delID'];
    $sql = "DELETE FROM user_details WHERE uEmail = '$uEmail';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:../User.php?success=Successfully Deleted');
    } else {
        die(mysqli_error($conn));
    }
}
