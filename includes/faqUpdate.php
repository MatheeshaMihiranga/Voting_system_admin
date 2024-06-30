<?php
include 'dbConn.php';
include 'afunctions.php';

$id = $_GET['upID'];
$sql = "SELECT * FROM faq WHERE fID = '$id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ques = $row['question'];
$ans = $row['answer'];

if (isset($_POST['update'])) {

    $sql = "UPDATE faq SET question = '{$_POST['faq-question']}', answer = '{$_POST['faq-answer']}' WHERE fID = '$id';";
    mysqli_query($conn, $sql);

    header("Location: ../FAQmanage.php?entry=Successfully Updated FAQ");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <link rel="stylesheet" href="css/faqstyle.css" />
</head>

<body>

    <h1>Frequently Asked Questions</h1>

    <div class="faq-container">
        <div class="faq-form">
            <h2>Submit a Question</h2>
            <form method="POST">
                <label for="faq-question">Question:</label>
                <input type="text" id="faq-question" name="faq-question" autocomplete="off" value="<?php echo $ques; ?>">

                <label for="faq-answer">Answer:</label>
                <input type="text" id="faq-answer" name="faq-answer" autocomplete="off" value="<?php echo $ans; ?>">

                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</body>

</html>