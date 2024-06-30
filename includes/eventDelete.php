<?php
include_once 'dbConn.php';

if (isset($_GET['delID'])) {

    $eventID = $_GET['delID'];
    $sql = "DELETE FROM event_details WHERE eventID = '$eventID';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:../Event Schedule.php?success=Successfully Deleted');
    } else {
        die(mysqli_error($conn));
    }
}
