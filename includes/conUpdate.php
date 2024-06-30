<?php
include 'dbConn.php';
include 'afunctions.php';

$nic = $_GET['upID'];
$sql = "SELECT * FROM contestant_details WHERE cNIC = '$nic';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//save details in variable to display
$nic = $row['cNIC'];
$full = $row['fName'];
$ini = $row['iName'];
$city = $row['city'];
$district = $row['district'];
$desc = $row['cDescription'];
//update details when update button pressed
if (isset($_POST['submit'])) {

    //sanitize details
    $I_nic = validate($_POST['contestant-nic']);
    $I_full = validate($_POST['full-name']);
    $I_ini = validate($_POST['initials']);
    $I_city = validate($_POST['city']);
    $I_district = validate($_POST['district']);
    $I_desc = validate($_POST['description']);

    //validate details
    if (validateNIC($I_nic)) {
        if (noIntegers($I_full) && noIntegers($I_ini)) {
            $sql = "UPDATE contestant_details SET
                    cNIC = '$I_nic',
                    fName = '$I_full',
                    iName = '$I_ini',
                    city = '$I_city',
                    district = '$I_district',
                    cDescription = '$I_desc'
                    WHERE cNIC = '$nic';";

            mysqli_query($conn, $sql);

            header("Location: ../ContestantManage.php?entry=Successfully Updated Contestant");
        } else {
            header("Location: conUpdate.php?error=Names cannot contain integers");
            exit();
        }
    } else {
        header("Location: conUpdate.php?error=Invalid NIC format");
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <link rel="stylesheet" href="../css/contestantsyle.css" />
</head>

<body>
    <div class="container">
        <form id="create-contestant-form" method="post">
            <fieldset>
                <legend>Enter Contestant Information:</legend>
                <div>
                    <!--Error Display-->
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <!--Success Display-->
                    <?php if (isset($_GET['entry'])) { ?>
                        <p class="entry"><?php echo $_GET['entry']; ?></p>
                    <?php } ?>
                </div>
                <div>
                    <label>NIC:</label>
                    <input type="text" id="contestant-nic" name="contestant-nic" autocomplete="off" required value="<?php echo $nic; ?>">
                </div>
                <div>
                    <div class="head">
                        <label>Full Name:</label>
                        <input type="text" id="full-name" name="full-name" autocomplete="off" required value="<?php echo $full; ?>">
                        <label>Name with Initials:</label>
                        <input type="text" id="initials" name="initials" autocomplete="off" required value="<?php echo $ini; ?>">
                    </div>
                    <div>
                        <div class="head">
                            <br>
                            <label>City:</label>
                            <input type="text" id="city" name="city" autocomplete="off" required value="<?php echo $city; ?>">
                            <label>District:</label>
                            <input type="text" id="district" name="district" autocomplete="off" required value="<?php echo $district; ?>">
                        </div>
                    </div>
                    <div>
                        <label>Description:</label>
                        <input type="text" id="description" name="description" autocomplete="off" required value="<?php echo $desc; ?>">
                    </div>
            </fieldset>
            <input type="submit" name="submit">
        </form>
    </div>

</body>

</html>