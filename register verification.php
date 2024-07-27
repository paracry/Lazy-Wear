<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lazy_wear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate user input
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
    $_SESSION['error'] = "Please fill in all required fields.";
    header("Location: register.php");
    exit();
}

if (!preg_match("/^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$/", $fname)) {
    $_SESSION['fname_error'] = "Invalid first name format. Only letters are allowed.";
}

if (!preg_match("/^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$/", $lname)) {
    $_SESSION['lname_error'] = "Invalid last name format. Only letters are allowed.";
}

if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['email_error'] = "An account already exists with this email.";
    } else {
        $_SESSION['user_email'] = $email;
        unset($_SESSION['email_error']);
    }
} else {
    $_SESSION['email_error'] = "Invalid email format. Please enter a valid email address.";

    // Handle invalid email input
}


if (!preg_match('/^\d{10}$/', $phone)) {
    $_SESSION['phone_error'] = "Invalid phone number format. Please enter a valid phone number.";
}

if ($password != $confirm_password) {
    $_SESSION['password_error'] = "Password and confirm password do not match";
}

if (isset($_SESSION['fname_error']) || isset($_SESSION['lname_error']) || isset($_SESSION['email_error']) || isset($_SESSION['phone_error']) || isset($_SESSION['password_error'])) {
    header("Location: register.php");
    exit();
}

// Prepare and execute the registration query
$stmt = $conn->prepare("INSERT INTO `customer` (`first_name`, `last_name`, `email`, `phone`, `password`, `code`, `verified`) VALUES (?, ?, ?, ?, ?, ?, 'no')");
$stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $hashedPassword, $verificationCode);

$fname = ucwords($fname);
$lname = ucwords($lname);
$email = $email;
$phone = $phone;
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$verificationCode = bin2hex(random_bytes(16)); // Generate a secure verification code

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "New record created successfully";
    session_destroy();
    session_start();
    header("Location: login.php");
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();

?>