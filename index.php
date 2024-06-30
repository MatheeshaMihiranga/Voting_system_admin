<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="css/adminlogin.css" />
<link rel="stylesheet" href="css/navbar.css">
</head>

<body>
  
  <form action="includes/alogin.php" method="post">

    <h2>ADMIN LOGIN</h2>
    <h6>Silver Voice<sup>TM</sup></h6>

    <label>Email</label>
    <input type="email" name="aEmail" placeholder="example@mail.com">

    <!--Error Display-->
    <?php if (isset($_GET['error1'])) { ?>
      <p class="error1"><?php echo $_GET['error1']; ?></p>
    <?php } ?>
    <!----------------------------------------------------->

    <label>Password</label>
    <input type="password" name="aPassword" placeholder="password">

    <!--Error Display-->
    <?php if (isset($_GET['error2'])) { ?>
      <p class="error2"><?php echo $_GET['error2']; ?></p>
    <?php } ?>
    <!----------------------------------------------------->

    <!--Error Display-->
    <?php if (isset($_GET['error3'])) { ?>
      <p class="error3"><?php echo $_GET['error3']; ?></p>
    <?php } ?>
    <!----------------------------------------------------->

    <button name="submit" type="submit">Login</button>

  </form>
</body>

</html>