<?php
include 'dbConn.php';
include 'afunctions.php';

$id = $_GET['upID'];
$sql = "SELECT * FROM event_details WHERE eventID = '$id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//save old info to display
$eid = $row['eventID'];
$edesc = $row['eDescription'];
$eTime = $row['eTIME'];
$sDate = $row['sDate'];
$eDate = $row['eDate'];
$sTime  = $row['sTime'];
$eStatus = $row['eventStatus'];

if (isset($_POST['updateEvent'])) {

    $N_edesc = validate($_POST['edesc']);
    $N_sdate = validate($_POST['sdate']);
    $N_edate = validate($_POST['edate']);
    $N_stime = validate($_POST['stime']);
    $N_etime = validate($_POST['etime']);
    $event_state = validate($_POST['eventState']);

    $sql = "UPDATE event_details SET
            sDate = '$N_sdate',
            eDate = '$N_edate',
            sTime = '$N_stime',
            eTIME = '$N_etime',
            eDescription = '$N_edesc',
            eventStatus = '$event_state'
            WHERE eventID = '$eid'";

    mysqli_query($conn, $sql);
    header("Location: ../Event Schedule.php?entry=Successfully Updated FAQ");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
    <link rel="stylesheet" href="css/eventstyle.css">
</head>

<body>
    <div class="container">
        <h1>Create an Event</h1>
        <form id="create-event-form" method="POST">

            <div class="form-group">
                <label>Event Description:</label>
                <input type="text" name="edesc" required value="<?php echo $edesc; ?>">
            </div>
            <div class="form-group">
                <label>Start Date:</label>
                <input type="date" name="sdate" required value="<?php echo $sDate; ?>">
            </div>
            <div class="form-group">
                <label>End Date:</label>
                <input type="date" name="edate" value="<?php echo $eDate; ?>">
            </div>
            <div class="form-group">
                <label>Start Time:</label>
                <input type="time" name="stime" required value="<?php echo $sTime; ?>">
            </div>
            <div class="form-group">
                <label>End Time:</label>
                <input type="time" name="etime" required value="<?php echo $eTime; ?>">
            </div>
            <!--event status-->
            <div class="form-group">
                <label>Event Status:</label>
                <select name="eventState">
                    <option value="<?php echo $eStatus; ?>" selected><?php echo $eStatus; ?></option>
                    <option value="pending">pending</option>
                    <option value="ongoing">ongoing</option>
                    <option value="event completed">event completed</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="updateEvent">
            </div>

        </form>
    </div>
    <footer>
        <p>&copy; 2023 Your Website. All rights reserved.</p>
    </footer>
</body>

</html>