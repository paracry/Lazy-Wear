<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // User is logged in
    $userloggedIn = true;
    $user_id = $_SESSION['user_id'];
} else {
    $userloggedIn = false;
}

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


if (isset($_POST['place_order'])) {
    // Get the user's cart items
    $sql = "SELECT * FROM cart WHERE customer_id = '$user_id'";
    $result = $conn->query($sql);
    $cart_items = array();
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
    }

    // Calculate the total cost of the order
    $total = 0;
    foreach ($cart_items as $item) {
        $sql = "SELECT price FROM product WHERE id = '$item[product_id]'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total += $row['price'] * $item['quantity'];
    }

    // Insert the order into the orders table
    $sql = "INSERT INTO orders (customer_id, order_date, total, status) VALUES ('$user_id', NOW(), '$total', 'pending')";
    $conn->query($sql);
    $order_id = $conn->insert_id;

    // Insert the order items into the order_items table
    foreach ($cart_items as $item) {
        $sql = "INSERT INTO order_items (order_id, product_id, size, quantity) VALUES ('$order_id', '$item[product_id]', '$item[size]', '$item[quantity]')";
        $conn->query($sql);
    }

    // Clear the user's cart
    $sql = "DELETE FROM cart WHERE customer_id = '$user_id'";
    $conn->query($sql);

    header("Location: order placed.php");
}

?>