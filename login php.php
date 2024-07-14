<?php
session_start();
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lazy_wear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check user existence
$sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "User exists in the database. Login successful!";

    $user = mysqli_fetch_assoc($result);
    session_destroy();
    session_start();
    $_SESSION['username'] = $user['first_name'];
    $_SESSION['user_id'] = $user['id'];
    echo $_SESSION['user_id'] . $_SESSION['username'];
    header("Location:  home.php");

} else {
    $_SESSION['login_error'] = "User not found. Please check your credentials.";
    header("location: login.php");
}

$conn->close();
?>