<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Page</title>
  <link rel="stylesheet" href="css/faqstyle.css" />
  <link rel="stylesheet" href="css/eventstyle.css" />
  <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
  <?php
  include "includes/nav.php";
  ?>
  <h1>Frequently Asked Questions</h1>

  <div class="faq-container">
    <div class="faq-form">
      <h2>Submit a Question</h2>
      <form action='includes/faqAdd.php' method="POST">
        <label for="faq-question">Question:</label>
        <textarea id="faq-question" name="faq-question" rows="4" required></textarea>

        <label for="faq-answer">Answer:</label>
        <textarea id="faq-answer" name="faq-answer" rows="4" required></textarea>

        <button type="submit" name="submit">Submit</button>
      </form>
    </div>
    <div>
      <!--Error Display-->
      <?php if (isset($_GET['error'])) { ?>
        <p class="error2"><?php echo $_GET['error2']; ?></p>
      <?php } ?>
      <!--Success Display-->
      <?php if (isset($_GET['entry'])) { ?>
        <p class="entry"><?php echo $_GET['entry']; ?></p>
      <?php } ?>
    </div>
  </div>
  <footer>
    <p>&copy; 2023 Your Website. All rights reserved.</p>
  </footer>
</body>

</html>