<?php

session_start();
if (isset($_SESSION['user_id'])) {
    // User is logged in
    $userloggedIn = true;
    $user_id = $_SESSION['user_id'];
} else {
    $userloggedIn = false;
}

if (isset($_GET['size'])) {
    $size = $_GET['size'];
    $product_id = $_GET['id'];
    if ($size == "") {
        $_SESSION['size_error'] = "<p style='color:red; margin-bottom: -1.5vh; margin-top: 0.5vh;'>Please Select a size.</p>";
        header("location: product.php?id=$product_id");
    } else {
        echo "<h1>" . $size . "</h1>";
        unset($_SESSION['size_error']);

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

        $sql = "INSERT INTO `cart` (`customer_id`, `product_id`, `size`, `quantity`) VALUES ('$user_id', '$product_id', '$size', 1 )";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: product.php?id=$product_id");

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}