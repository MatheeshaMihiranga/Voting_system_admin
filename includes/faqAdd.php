<?php
include_once 'dbConn.php';
include_once 'afunctions.php';

if (isset($_POST['faq-question']) && isset($_POST['faq-answer'])) {
    $question = validate($_POST['faq-question']);
    $answer = validate($_POST['faq-answer']);

    $sql = "INSERT INTO faq (question, answer) VALUES ('$question','$answer');";
    mysqli_query($conn, $sql);

    header("Location: ../faq.php?entry=Successfully Created FAQ");
} else {
    header("Location: ../faq.php?error=Error Cannot Create FAQ");
    exit();
}
