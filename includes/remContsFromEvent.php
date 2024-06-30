<?php
include_once 'dbConn.php';

if (isset($_GET['eventID']) && isset($_GET['cNIC'])) {

    $eventID = $_GET['eventID'];
    $cNIC = $_GET['cNIC'];

    $sql = "DELETE FROM contestant_number 
            WHERE cNIC = '$cNIC' AND eventID = '$eventID';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:../manageContestants.php?eventID= ' . $eventID . '');
    }
}
