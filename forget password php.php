<?php
session_start();
$conn = new mysqli("localhost", "root", "", "lazy_wear");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['question1']) && isset($_POST['question2']) && isset($_POST['question3'])) {
    $email = $_POST['email'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];

    $stmt = $conn->prepare("SELECT * FROM forget WHERE email = ? AND question1 = ? AND question2 = ? AND question3 = ?");
    $stmt->bind_param("ssss", $email, $question1, $question2, $question3);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists and answers match, redirect to password reset page
        $_SESSION['email'] = $email;
        header('Location: reset password.php');
        exit;
    } else {
        // User does not exist or answers do not match, display error message
        $_SESSION['error'] = 'Invalid email or answers. Please try again.';
        header('Location: forget password.php');
        exit;
    }
}