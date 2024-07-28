<?php

session_start();

$conn = new mysqli("localhost", "root", "", "lazy_wear");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['question1']) && isset($_POST['question2']) && isset($_POST['question3'])) {
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];

    $stmt = $conn->prepare("INSERT INTO forget (email, question1, question2, question3) VALUES (?,?, ?, ?)");
    $stmt->bind_param("ssss", $_SESSION['email'], $question1, $question2, $question3);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Answers saved successfully!";
        header("location: login.php");
    } else {
        echo "Error saving answers!";
    }
}