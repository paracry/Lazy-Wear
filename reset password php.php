<?php
session_start();
$conn = new mysqli("localhost", "root", "", "lazy_wear");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match!';
        header('Location: reset password.php');
        exit;
    }

    // Assuming you have an email session variable
    $email = $_SESSION['email'];

    $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE customer SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Password updated successfully!";
            session_destroy();
            session_start();
            $_SESSION['registered']="Password changed successfully<br>Login to continue.";
            header("Location: login.php");
        } else {
            echo "Error updating password!";
        }
    } else {
        echo "Error: Email not found!";
    }
}