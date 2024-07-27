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

// Query to retrieve user data
$sql = "SELECT * FROM customer WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = mysqli_fetch_assoc($result);
    $hashedPassword = $user['password']; // Retrieve the hashed password from the database

    // Verify the password using password_verify()
    if (password_verify($password, $hashedPassword)) {
        echo "Password is correct. Login successful!";

        session_destroy();
        session_start();
        $_SESSION['username'] = $user['first_name'];
        $_SESSION['user_id'] = $user['id'];
        echo $_SESSION['user_id'] . $_SESSION['username'];
        if ($user['lol'] == "ad123min") {
            $_SESSION['lol'] = $user['id'];
            header("Location:  admin.php");
        } else {
            header("location: home.php");
        }
    } else {
        $_SESSION['login_error'] = "Invalid password. Please try again.";
        header("location: login.php");
    }
} else {
    $_SESSION['login_error'] = "User not found. Please check your credentials.";
    header("location: login.php");
}

$conn->close();
?>