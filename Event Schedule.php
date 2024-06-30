<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Event Schedule</title>
  <script src="script.js"></script>
  <link rel="stylesheet" href="css/schedulestyle.css" />
  <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
  <?php
  include 'includes/dbConn.php';
  include "includes/nav.php";
  ?>
  <?php
  if (isset($_GET['update'])) {
    $sqlUpdateQuery = "UPDATE event_details SET eventStatus = '{$_GET['update']}' WHERE eventId='{$_GET['eventID']}'";

    $results = mysqli_query($conn, $sqlUpdateQuery);
    if ($_GET['update'] == 'closed') {
      //calculate results
      $sqlTotalResultsQuery = "select eventID,cNIC,count(voteCount) as result from votes where eventID ='{$_GET['eventID']}' group by cNIC";
      $result2 = mysqli_query($conn, $sqlTotalResultsQuery);
      //fetch and display data
      if ($result2) {
        while ($row = mysqli_fetch_assoc($result2)) {
          $stmt = mysqli_stmt_init($conn);
          $sql = 'INSERT INTO results (cNIC,eventID,totVotes) VALUES (?,?,?);';
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:event Shedule.php');
            exit();
          }
          $cNIC = $row['cNIC'];
          $eventID = $row['eventID'];
          $totalVotes = $row['result'];
          mysqli_stmt_bind_param($stmt, "sss", $cNIC, $eventID, $totalVotes);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_close($stmt);
        }
      }
    }
    if ($results) {
      header("Location: Event Schedule.php");
    }
  }
  ?>
  <div class="container" style="max-width: 90%">
    <h1>Event Schedule</h1>
    <table>
      <thead>
        <tr>
          <th>Event ID</th>
          <th>Event Description</th>
          <th>start Date</th>
          <th>End Date</th>
          <th>start Time</th>
          <th>End Time</th>
          <th>event Status</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>Manage Contestants</th>
          <th>change status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM event_details;";
        $result = mysqli_query($conn, $sql);
        //fetch and display data
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                      <td>' . $row['eventID'] . '</td>
                      <td>' . $row['eDescription'] . '</td>
                      <td>' . $row['sDate'] . '</td>
                      <td>' . $row['eDate'] . '</td>
                      <td>' . $row['sTime'] . '</td>
                      <td>' . $row['eTIME'] . '</td>
                      <td>' . $row['eventStatus'] . '</td>
                      <td>
                      <button><a href="includes/eventUpdate.php?upID= ' . $row['eventID'] . ' ">Update</button>
                      </td>
                      <td>
                      <button><a href="includes/eventDelete.php?delID=' . $row['eventID'] . '">Delete</button>
                      </td>
                      <td>
                      <button><a href="manageContestants.php?eventID=' . $row['eventID'] . '">Manage Contestants</button>
                      </td>
                      <td>';
            if ($row['eventStatus'] == 'pending') {
              echo '<button><a href="Event Schedule.php?eventID=' . $row['eventID'] . '&update=ongoing">start voting</button>';
            } else if ($row['eventStatus'] == 'ongoing') {
              echo '<button><a href="Event Schedule.php?eventID=' . $row['eventID'] . '&update=closed">end voting</button>';
            } else echo '<p>event completed</p>                                                                                        
                               </td>
                             </tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <footer>
    <p>&copy; 2023 Your Website. All rights reserved.</p>
  </footer>
</body>

</html>