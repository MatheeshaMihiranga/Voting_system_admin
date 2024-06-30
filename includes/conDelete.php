<?php
include_once 'dbConn.php';

if (isset($_GET['delID'])) {

    $nic = $_GET['delID'];
    $sql = "DELETE FROM contestant_details WHERE cNIC = '$nic';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:../ContestantManage.php?success=Successfully Deleted');
    } else {
        die(mysqli_error($conn));
    }
}
