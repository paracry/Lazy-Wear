<?php
$id = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lazy_wear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "DELETE FROM customer WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location: admin customers.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

?>