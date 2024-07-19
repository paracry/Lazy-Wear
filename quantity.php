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


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $size = $_GET['size'];
    if (isset($_GET['value'])) {
        $value = $_GET['value'];

        if ($value == "increase") {
            $sql = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = $product_id AND customer_id=$user_id AND size='$size'";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Location: cart.php");

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } elseif ($value == "decrease") {
            $sql = "UPDATE cart SET quantity = quantity - 1 WHERE product_id = $product_id AND customer_id=$user_id AND size='$size'";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                $checkZeroQuantity = "SELECT * FROM cart WHERE product_id = $product_id AND customer_id = $user_id AND quantity = 0 AND size='$size'";
                $result = $conn->query($checkZeroQuantity);

                if ($result->num_rows > 0) {
                    $deleteZeroQuantity = "DELETE FROM cart WHERE product_id = $product_id AND customer_id = $user_id AND quantity = 0 AND size='$size'";
                    if ($conn->query($deleteZeroQuantity) === TRUE) {
                        echo "Entry with zero quantity deleted successfully";
                        header("Location: cart.php");
                    } else {
                        echo "Error deleting entry: " . $conn->error;
                    }
                }
                header("Location: cart.php");

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>