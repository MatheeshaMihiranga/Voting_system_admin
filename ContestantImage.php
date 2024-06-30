<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creating a Contestant</title>
    <link rel="stylesheet" href="css/contestantstyle.css">
<link rel="stylesheet" href="css/navbar.css">
</head>

<body>
<?php
    include "includes/nav.php";
  ?>
    <div class="container">
        <form action="includes/cImageUpload.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Upload an Image for a Contestant</legend>
                <div>
                    <!--Error Display-->
                    <?php if (isset($_GET['error1'])) { ?>
                        <p class="error1"><?php echo $_GET['error1']; ?></p>
                    <?php } ?>
                    <!--Success Display-->
                    <?php if (isset($_GET['entry'])) { ?>
                        <p class="entry"><?php echo $_GET['entry']; ?></p>
                    <?php } ?>
                </div>
                <div>
                    <label for="profile-pic">Contestant NIC:</label>
                    <input type="text" id="NIC" name="NIC" required>
                </div>
                <div>
                    <p>Please Upload JPG or JPEG</p>
                </div>
                <div>
                    <label for="profile-pic">Profile Picture:</label>
                    <input type="file" id="img" name="img">
                </div>
                <div>
                    <button name="upload" type="submit">Upload</button>
                </div>
                <div>
                    <button name="display" type="submit">Display</button>
                </div>
                <div>
                    <button name="delete" type="submit">Delete</button>
                </div>
            </fieldset>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Your Website. All rights reserved.</p>
    </footer>
</body>

</html>