<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Creating a Contestant</title>
  <link rel="stylesheet" href="css/contestantstyle.css">
</head>

<body>
  <?php include 'includes/nav.php'; ?>

  <div class="container">
    <form id="create-contestant-form" action="includes/contestantAdd.php" method="post">
      <fieldset>
        <legend>Enter Contestant Information:</legend>
        <div>
          <!--Error Display-->
          <?php if (isset($_GET['error1'])) { ?>
            <p class="error1"><?php echo $_GET['error1']; ?></p>
          <?php } ?>
          <!--Error Display-->
          <?php if (isset($_GET['error2'])) { ?>
            <p class="error2"><?php echo $_GET['error2']; ?></p>
          <?php } ?>
          <!--Success Display-->
          <?php if (isset($_GET['entry'])) { ?>
            <p class="entry"><?php echo $_GET['entry']; ?></p>
          <?php } ?>
        </div>
        <div>
          <label>NIC:</label>
          <input type="text" id="contestant-nic" name="contestant-nic" required>
        </div>
        <div>
          <div class="head">
            <label>Full Name:</label>
            <input type="text" id="full-name" name="full-name" required>
            <label>Name with Initials:</label>
            <input type="text" id="initials" name="initials" required>
          </div>
        </div>
        <div>
          <div class="head">
            <br>
            <label>City:</label>
            <input type="text" id="city" name="city" required>
            <label>District:</label>
            <input type="text" id="district" name="district" required>
          </div>
          <div>
            <label>Description:</label>
            <input type="text" id="description" name="description" required>
          </div>
        </div>
        <!--
        <div>
          <label>Image</label>
          <p>Please use JPEG or JPG</p>
          <input type="file" id="file" name="file" required>
        </div>
          -->
      </fieldset>
      <input type="submit" value="Add Contestant">
    </form>
  </div>

  <footer>
    <p>&copy; 2023 Your Website. All rights reserved.</p>
  </footer>
</body>

</html>