<?php
session_start();
include_once 'includes/dbConn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Contestants</title>
  <link rel="stylesheet" href="css/retrieveandshow.css">
  <link rel="stylesheet" href="css/table.css">
  <link rel="navbar.css" href="css/navbar.css">
</head>

<body>
  <?php include 'includes/nav.php'; ?>
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
    <!--DISPLAY DATA IN A TABLE-->
    <div>
      <table>
        <thead>
          <tr>
            <th>NIC</th>
            <th>Full Name</th>
            <th>Name With Initials</th>
            <th>City</th>
            <th>Disctrict</th>
            <th>Descritpion</th>
            <th>Edit</th>
          </tr>
        </thead>
        <!--TABLE BODY WITH DATA-->
        <tbody>
          <?php
          $sql = "SELECT * FROM contestant_details;";
          $result = mysqli_query($conn, $sql);
          //fetch and display data
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $nic = $row['cNIC'];
              $full = $row['fName'];
              $ini = $row['iName'];
              $desc = $row['city'];
              $city = $row['district'];
              $district = $row['cDescription'];
              echo '<tr>
                        <th>' . $nic . '</th>
                        <td>' . $full . '</td>
                        <td>' . $ini . '</td>
                        <td>' . $desc . '</td>
                        <td>' . $city . '</td>
                        <td>' . $district . '</td>
                        <td>
                        <button><a href="includes/conUpdate.php?upID=' . $nic . ' ">Update</button>
                        <button><a href="includes/conDelete.php?delID=' . $nic . '">Delete</button>
                        </td>
                      </tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
    <!--Footer-->
    <footer>
      <p>&copy; 2023 Your Website. All rights reserved.</p>
    </footer>
</body>

</html>