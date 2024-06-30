<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Event</title>
  <link rel="stylesheet" href="css/eventstyle.css">
</head>

<body>
  <?php include 'includes/nav.php'; ?>
  <div class="container">
    <h1>Create an Event</h1>
    <form id="create-event-form" action="includes/eventCreate.php" method="POST">

      <div class="form-group">
        <label>Event Description:</label>
        <input type="text" name="edesc" required>
      </div>
      <div class="form-group">
        <label>Start Date:</label>
        <input type="date" name="sdate">
      </div>
      <div class="form-group">
        <label>End Date:</label>
        <input type="date" name="edate" required>
      </div>
      <div class="form-group">
        <label>Start Time:</label>
        <input type="time" name="stime" required>
      </div>
      <div class="form-group">
        <label>End Time:</label>
        <input type="time" name="etime" required>
      </div>
      <div class="form-group">
        <input type="submit" name="createEvent">
      </div>
    </form>
  </div>
  <footer>
    <p>&copy; 2023 Your Website. All rights reserved.</p>
  </footer>
</body>

</html>