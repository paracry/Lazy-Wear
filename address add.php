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
$area = $_POST['area'];
$district = $_POST['district'];
$city = $_POST['city'];
$state = $_POST['state'];

$sql = "INSERT INTO `address` (`customer_id`, `street`, `area`, `district`, `city`, `state`) VALUES ('$customer_id' , '$street', '$area', '$district', '$city', '$state')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("location: checkout.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>