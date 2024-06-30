<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nid'])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="css/contestantstyle.css">
        <link rel="stylesheet" href="css/navbar.css">
</head>

    <body>
    <?php
    include "includes/nav.php";
  ?>
        <div class="container">

            <h2> Welcome to Silver voice Admin  </h2>

        </div>
        <footer>
            <p>&copy; 2023 Your Website. All rights reserved.</p>
        </footer>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>