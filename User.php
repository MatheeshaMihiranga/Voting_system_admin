<?php
session_start();
include 'includes/dbConn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User  Page</title>
    <link rel="stylesheet" href="css/faqstyle.css">
    <link rel="stylesheet" href="css/eventstyle.css">
    <link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/navbar.css">
</head>

<body>
<?php
    include "includes/nav.php";
  ?>
    <h1>Users Delete</h1>
    <div class="faq-container">
    </div>

    <!--DISPLAY DATA IN A TABLE-->
    <div class="faq-container">
        <table>
            <thead>
                <tr>
                    <th>Email </th>
                    <th>FirstName </th>
                    <th>LastName </th>
                    <th>Country</th>
                    <th>Dob</th>
                </tr>
            </thead>
            <!--TABLE BODY WITH DATA-->
            <tbody>
                <?php
                $sql = "SELECT * FROM user_details;";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $uEmail = $row['uEmail'];
                        $uFirstName = $row['uFirstname'];
                        $uLastName = $row['uLastname'];
                        $country = $row['country'];
                        $dob = $row['dob'];
                        echo '<tr>
                                <th>' . $uEmail . '</th>
                                <td>' . $uFirstName . '</td>
                                <td>' . $uLastName . '</td>
                                <td>' . $country . '</td>
                                <td>' . $dob . '</td>
                                <td>
                                <button><a href="includes/userDelete.php?delID=' . $uEmail . '">Delete</button>
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
