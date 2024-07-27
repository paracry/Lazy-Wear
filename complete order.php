<?php
// update_status.php

// Get the order ID from the URL parameter
$order_id = $_GET['order_id'];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "lazy_wear");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the order status to "Delivered"
$sql = "UPDATE orders SET status = 'Delivered' WHERE order_id = '$order_id'";
if (!$conn->query($sql)) {
    die("Error updating order status: " . $conn->error);
}

// Close the database connection
$conn->close();

// Redirect to the orders page
header("Location: orders.php");
exit;
?>