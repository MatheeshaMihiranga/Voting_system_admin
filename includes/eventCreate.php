<?php
include_once 'dbConn.php';
include_once 'afunctions.php';

if (isset($_POST['createEvent'])) {
    $edesc = validate($_POST['edesc']);
    $sdate = validate($_POST['sdate']);
    $edate = validate($_POST['edate']);
    $stime = validate($_POST['stime']);
    $etime = validate($_POST['etime']);
    //default event state
    $event_state = 'pending';

    $sql = "INSERT INTO event_details (sDate, eDate, sTime, eTIME, eDescription,eventStatus)
            VALUES ('$sdate', '$edate', '$stime', '$etime', '$edesc','$event_state');";
    mysqli_query($conn, $sql);

    header("Location: ../Event.php?success=Successfully Created Event");
} else {
    header("Location: ../Contestant.php?error=Could not create event");
    exit();
}
