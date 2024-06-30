<?php
include_once 'dbConn.php';
include_once 'afunctions.php';

if (
    isset($_POST['contestant-nic']) && isset($_POST['full-name'])
    && isset($_POST['initials']) && isset($_POST['description'])
    && isset($_POST['city']) && isset($_POST['district'])
) {
    $nic = validate($_POST['contestant-nic']);
    $full = validate($_POST['full-name']);
    $ini = validate($_POST['initials']);
    $desc = validate($_POST['description']);
    $city = validate($_POST['city']);
    $district = validate($_POST['district']);

    if (validateNIC($nic)) {
        if (noIntegers($full) && noIntegers($ini)) {
            $sql = "INSERT INTO contestant_details (cNIC, fName, iName, city, district, cDescription)
                VALUES ('$nic', '$full', '$ini', '$city', '$district', '$desc');";
            mysqli_query($conn, $sql);

            header("Location: ../Contestant.php?entry=Successfully Created Contestant");
        } else {
            header("Location: ../Contestant.php?error1=Names cannot contain integers");
            exit();
        }
    } else {
        header("Location: ../Contestant.php?error2=Invalid NIC format");
        exit();
    }
} else {
    header("Location: ../Contestant.php");
    exit();
}
