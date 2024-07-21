<?php


session_start();

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lazy_wear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$namepattern = "/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/";



$fname = $_POST['fname'];

if (preg_match("/^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$/", $fname)) {
    $_SESSION['user_fname'] = $_POST['fname'];
    unset($_SESSION['fname_error']);
} else {
    $_SESSION['fname_error'] = "Invalid first name format. Only letters are allowed.(Example:Alex)";
}

$lname = $_POST['lname'];

if (
    preg_match("/^[a-zA-Z]+(?:[-'\\s][a-zA-Z]+)*$/", $lname)
) {
    $_SESSION['user_lname'] = $_POST['lname'];
    unset($_SESSION['lname_error']);
} else {
    $_SESSION['lname_error'] = "Invalid last name format. Only letters are allowed.(Example:Barns)";
}

$email = $_POST['email'];
if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $result = $conn->query($sql);

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

$phone = $_POST['phone'];
if (preg_match('/^\d{10}$/', $phone)) {
    $_SESSION['user_phone'] = $phone;
    unset($_SESSION['phone_error']);
} else {
    $_SESSION['phone_error'] = "Invalid phone number format. Please enter a valid phone number.";
    // Handle invalid phone number input
}

$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password != $confirm_password) {
    $_SESSION['password_error'] = "Password and confirm password do not match";
} else {
    unset($_SESSION['password_error']);
}



if (isset($_SESSION['fname_error']) || isset($_SESSION['lname_error']) || isset($_SESSION['email_error']) || isset($_SESSION['phone_error']) || isset($_SESSION['password_error'])) {
    header("Location: register.php");
    exit();
} else {
    $fname = $conn->real_escape_string(ucwords($fname));
    $lname = $conn->real_escape_string(ucwords($lname));

    $email = $conn->real_escape_string($email);
    $phone = $conn->real_escape_string($phone);
    $password = $conn->real_escape_string($password);

    $verificationCode = md5(uniqid(rand(), true));



    $sql = "INSERT INTO `customer` (`first_name`, `last_name`, `email`, `phone`, `password`, `code`, `verified`) VALUES ('$fname', '$lname', '$email', '$phone', '$password', '$verificationCode', 'no')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        session_destroy();
        session_start();
        
        
        $to = $email;
        $subject = 'Email Verification';
        $message = 'Click the following link to verify your email: http://localhost/Lazy%20Wear/Lazy-Wear/verify%20email.php/verify email.php?code=' . $verificationCode;
            $headers = 'From: connectlazywear@gmail.com';
            mail($to, $subject, $message, $headers);
            
            if (mail($to, $subject, $message, $headers)) {
                $_SESSION['registered'] = "A verification email is sent to your email address, please follow the link to comeplete your registration";
                header("Location: login.php");
        } else {
            echo 'Email sending failed. Check your server configuration.';
        }



    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}


?>