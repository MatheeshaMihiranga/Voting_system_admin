<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    Gallery Manage
  </title>
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<body>
  <?php
  include "includes/nav.php";
  ?>
  <h2>Add Image to Gallery</h2>
  <form method="POST" action="includes/Galleryedit.php" enctype="multipart/form-data">
    <label>Title:</label>
    <input type="text" name="title" required><br><br>
    <label>Image:</label>
    <input type="file" name="image" required><br><br>
    <input type="submit" value="Upload">
  </form>

  <h2>Delete Image</h2>
  <table>
      <tr>
          <th>MID</th>
          <th>Title</th>
          <th>Image</th>
          <th>Action</th>
      </tr>
      <?php
      // Database connection
      include_once 'includes/dbConn.php';

      // Retrieve images from the database
      $query = "SELECT * FROM media";
      $result = mysqli_query($conn, $query);

      // Display images
      while ($row = mysqli_fetch_assoc($result)) {

          echo '<tr>';
          echo '<td>' . $row['MID'] . '</td>';
          echo '<td>' . $row['mDescription'] . '</td>';
          $path = "includes/";
          echo '<td><img src="' . $path . $row['mlocation'] . '" alt="' . $row['mDescription'] . '" width="100" height="100"></td>';
          echo '<td><form method="POST" action="includes/Gallerydelete.php"><input type="hidden" name="image_id" value="' . $row['MID'] . '"><input type="submit" value="Delete"></form></td>';
          echo '</tr>';
      }

      // Close database connection
      mysqli_close($conn);
      ?>
  </table>
  <footer>
    <p>&copy; 2023 Your Website: All rights reserved.</p>
  </footer>
</body>

</html>