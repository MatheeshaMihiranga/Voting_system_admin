<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/schedulestyle.css" />
</head>

<body>
  <?php
  include 'includes/dbConn.php';
  include "includes/nav.php";
  if (isset($_GET['cNIC'])) {
    $getContestantsForEventQuery = 'SELECT * FROM contestant_details, contestant_number WHERE contestant_details.cNIC = contestant_number.cNIC and contestant_number.eventID = ' . $_GET['eventID'] . ' order by contestant_number.cNO';
    $contestants = mysqli_query($conn, $getContestantsForEventQuery);
    $cNo = 1;
    if (mysqli_num_rows($contestants) > 0) {
      while ($row = mysqli_fetch_assoc($contestants)) {
        $cNo = $row['cNo'] + 1;
        if ($row['cNIC'] == $_GET['cNIC']) {
          echo '<script>alert("Already added!")
                window.location.href = "manageContestants.php?eventID=' . $_GET['eventID'] . '";
              </script>';
          // exit();
          // header('Location:manageContestants.php?eventID=' . $_GET['eventID']);
        }
      }
    }


    $stmt = mysqli_stmt_init($conn);
    $sql = 'INSERT INTO contestant_number (cNIC,eventID,cNo) VALUES (?,?,?);';
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header('Location:manageContestants.php?eventID=' . $_GET['eventID']);
      exit();
    }
    $cNIC = $_GET['cNIC'];
    $eventID = $_GET['eventID'];
    mysqli_stmt_bind_param($stmt, "sss", $cNIC, $eventID, $cNo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  ?>

  <div style="display:flex; flex-direction: row;">
    <div class="container">
      <div class="page-header">
        <h1>Full Contestant list</h1>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>add</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM contestant_details";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($contestant = mysqli_fetch_array($result)) {
                echo '<tr>
                            <td>' . $contestant['cNIC'] . '</td>
                            <td>' . $contestant['fName'] . '</td>
                            <td>
                              <button><a href="manageContestants.php?eventID=' . $_GET['eventID'] . '&cNIC=' . $contestant['cNIC'] . '">add to Event</button>
                            </td>
                        </tr>';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container" style="margin-left:50px">
      <div class="page-header">
        <h1>Contestants added to the event</h1>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>remove</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = 'SELECT * FROM contestant_details, contestant_number WHERE contestant_details.cNIC = contestant_number.cNIC and contestant_number.eventID = ' . $_GET['eventID'] . ' order by contestant_number.cNO';;
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($contestant = mysqli_fetch_array($result)) {
                echo '<tr>
                              <td>' . $contestant['cNIC'] . '</td>
                              <td>' . $contestant['fName'] . '</td>
                              <td><button><a href="includes/remContsFromEvent.php?eventID=' . $_GET['eventID'] . '&cNIC=' . $contestant['cNIC'] . '">remove from event</button></td>
                          </tr>';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>