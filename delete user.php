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

$sql = "SELECT * FROM orders WHERE customer_id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Delete the user's orders
    $sql = "DELETE FROM orders WHERE customer_id = '$id'";
    $conn->query($sql);

    // Delete the user's order items
    $sql = "DELETE FROM order_items WHERE order_id IN (SELECT id FROM orders WHERE customer_id = '$id')";
    $conn->query($sql);
}


$sql = "DELETE FROM customer WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location: admin customers.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

?>