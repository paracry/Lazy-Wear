<?php
session_start();
$customer_id = $_SESSION["user_id"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lazy_wear";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$street = $_POST['street'];
$pincode = $_POST['pincode'];
$area = $_POST['area'];
$district = $_POST['district'];
$city = $_POST['city'];
$state = $_POST['state'];

$stmt = $conn->prepare("INSERT INTO `address` (`customer_id`, `pincode`, `street`, `area`, `district`, `city`, `state`) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssss", $customer_id, $pincode, $street, $area, $district, $city, $state);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "New record created successfully";
    header("location: cart.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>