<?php
// delete_order.php

// Get the order ID from the URL parameter
$order_id = $_GET['order_id'];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "lazy_wear");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete the order items
$sql = "DELETE FROM order_items WHERE order_id = '$order_id'";
if (!$conn->query($sql)) {
    die("Error deleting order items: " . $conn->error);
}

// Delete the order
$sql = "DELETE FROM orders WHERE order_id = '$order_id'";
if (!$conn->query($sql)) {
    die("Error deleting order: " . $conn->error);
}

// Close the database connection
$conn->close();

// Redirect to the orders page
header("Location: admin orders a.php");
exit;
?>