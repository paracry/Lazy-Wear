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


$sql = "SELECT * FROM product_images WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = mysqli_fetch_assoc($result);
}

for ($i = 1; $i <= 10; $i++) {
    $file_path = $user['img' . $i];
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo 'File deleted successfully.';
        } else {
            echo 'Unable to delete the file.';
        }
    } else {
        echo 'File not found.';
    }
}

$conn->begin_transaction();

$sql = "DELETE FROM product_images WHERE id = $id";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}





$sql = "DELETE FROM product WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    $conn->commit();
    header("location: admin products.php");
} else {
    echo "Error deleting record: " . $conn->error;
    $conn->rollback();
}

?>