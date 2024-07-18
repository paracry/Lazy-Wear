<?php

session_start();
if (isset($_SESSION['user_id'])) {
    // User is logged in
    $userloggedIn = true;
    $user_id = $_SESSION['user_id'];
} else {
    $userloggedIn = false;
}
    $product_id = $_GET['id'];

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

    $sql = "DELETE FROM `wishlist` WHERE customer_id='$user_id' AND product_id='$product_id'";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: product.php?id=$product_id");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>