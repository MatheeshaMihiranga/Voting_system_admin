<?php
include_once 'dbConn.php';

if (isset($_GET['delID'])) {

    $id = $_GET['delID'];
    $sql = "DELETE FROM faq WHERE fID = '$id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:../FAQmanage.php?success=Successfully Deleted');
    } else {
        die(mysqli_error($conn));
    }
}
