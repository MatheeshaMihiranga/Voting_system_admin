<?php
session_start();
include 'includes/dbConn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <link rel="stylesheet" href="css/faqstyle.css">
    <link rel="stylesheet" href="css/eventstyle.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
    <?php
    include "includes/nav.php";
    ?>
    <h1>Frequently Asked Questions</h1>
    <div class="faq-container">
    </div>

    <!--DISPLAY DATA IN A TABLE-->
    <div class="faq-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <!--TABLE BODY WITH DATA-->
            <tbody>
                <?php
                $sql = "SELECT * FROM faq;";
                $result = mysqli_query($conn, $sql);
                //fetch and display data
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['fID'];
                        $question = $row['question'];
                        $answer = $row['answer'];
                        echo '<tr>
                                <th>' . $id . '</th>
                                <td>' . $question . '</td>
                                <td>' . $answer . '</td>
                                <td>
                                <button><a href="includes/faqUpdate.php?upID= ' . $id . ' ">Update</button>
                                <button><a href="includes/faqDelete.php?delID=' . $id . '">Delete</button>
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