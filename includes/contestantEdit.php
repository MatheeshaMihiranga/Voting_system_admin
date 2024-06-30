<?php
include_once 'dbConn.php';
include_once 'afunctions.php';

if (isset($_POST['update'])) {
    if (
        isset($_POST['NIC']) && isset($_POST['fullName'])
        && isset($_POST['iniName']) && isset($_POST['cDesc'])
        && isset($_POST['city']) && isset($_POST['dist'])
    ) {
        $originalNIC = validate($_POST['originalNIC']);
        $nic = validate($_POST['NIC']);
        $full = validate($_POST['fullName']);
        $ini = validate($_POST['iniName']);
        $desc = validate($_POST['cDesc']);
        $city = validate($_POST['city']);
        $district = validate($_POST['dist']);

        if (validateNIC($nic)) {
            if (noIntegers($full) && noIntegers($ini)) {
                $sql1 = "UPDATE contestant_details
                SET cNIC = '$nic',
                fName = '$full',
                iName = '$ini',
                cDescription = '$desc',
                city = '$city',
                district = '$district'
                WHERE cNIC = '$originalNIC'";

                mysqli_query($conn, $sql1);

                header("Location: ../ContestantManage.php?entry=Successfully Updated Contestant");
            } else {
                header("Location: ../ContestantManage.php?error=Names cannot contain integers");
                exit();
            }
        } else {
            header("Location: ../ContestantManage.php?error=Invalid NIC format");
            exit();
        }
    } else {
        header("Location: ../ContestantManage.php");
        exit();
    }
}
