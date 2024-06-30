<?php
session_start();
include "dbConn.php";

if (isset($_POST['aEmail']) && isset($_POST['aPassword'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $mail = validate($_POST['aEmail']);
    $pass = validate($_POST['aPassword']);

    //Field filled check
    if (empty($mail)) {
        header("Location: ../index.php?error1=Please enter a valid Email");
        exit();
    } elseif (empty($pass)) {
        header("Location: ../index.php?error2=Please enter a valid Password");
        exit();
    } else {

        //retrieve data
        $sql1 = "SELECT * FROM admin_login
                WHERE aEmail = '$mail'";

        $result1 = mysqli_query($conn, $sql1); //run query to retrieve data

        if (mysqli_num_rows($result1) === 1) {
            $sql2 = "SELECT aPassword FROM admin_login
                     WHERE aEmail = '$mail'";

            $result2 = mysqli_query($conn, $sql2); //sql query to retrieve password object
            $p_row = mysqli_fetch_assoc($result2); //retrieve the data array from the object
            $dbh_pass = $p_row['aPassword']; //access and get the password in the object

            if (password_verify($pass, $dbh_pass)) {

                $sql3 = "SELECT * FROM admin_login
                        WHERE aEmail = '$mail'";
                $result3 = mysqli_query($conn, $sql1);
                $row = mysqli_fetch_assoc($result3); //fetch that data to create session

                $_SESSION['id'] = $row['aEmail'];
                $_SESSION['nid'] = $row['aNIC'];
                header("Location: ../home.php");
                exit();
            }
            //else if data is not similar return error
            else {
                header("Location: ../index.php?error3=Incorect Email or Password");
                exit();
            }
        }
        //if data was not found in the first place
        else {
            header("Location: ../index.php?error3=Incorect Email or Password");
            exit();
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
