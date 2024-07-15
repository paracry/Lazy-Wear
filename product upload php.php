<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lazy_wear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$gender = $_POST['gender'];
$color = $_POST['color'];
$material = $_POST['material'];

$conn->begin_transaction();
$sql = "INSERT INTO `product` (`name`, `description`, `price`, `gender`, `color`, `material`) VALUES ('$name', '$description', '$price', '$gender', '$color', '$material')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully form 1";
    $product_id = mysqli_insert_id($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO `product_images` (`id`) VALUES ('$product_id')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully form 1";
}

// File upload and processing
$upload_dir = 'uploads/'; // directory to store the uploaded images
$allowed_ext = array('jpg', 'jpeg', 'png', 'webp'); // allowed file extensions

if (!empty($_FILES['images'])) {
    $images = $_FILES['images'];
    for ($i = 0; $i < count($images['name']); $i++) {
        $j = $i + 1;
        $image_name = $product_id . "_" . $j . '.' . pathinfo($images['name'][$i], PATHINFO_EXTENSION);
        $image_tmp = $images['tmp_name'][$i];
        $image_size = $images['size'][$i];
        $image_error = $images['error'][$i];

        if ($image_error === 0) {
            if (in_array(strtolower(pathinfo($images['name'][$i], PATHINFO_EXTENSION)), $allowed_ext)) {
                move_uploaded_file($image_tmp, $upload_dir . $image_name);
                echo "Image $image_name uploaded successfully!<br>";
                $filepath[$j] = $upload_dir . $image_name;
                $sql = "UPDATE product_images SET `img" . $j . "` = '$filepath[$j]' WHERE id = $product_id";
                if ($conn->query($sql) === TRUE) {
                    echo "New record in db created successfully form 1";
                    $conn->commit();
                } else {
                    $conn->rollback();
                }
            } else {
                echo "Error: Only JPG, JPEG, and PNG files are allowed.<br>";
                $conn->rollback();
            }
        } else {
            echo "Error: " . $image_error . "<br>";
            $conn->rollback();
        }
    }
} else {
    echo "No images selected.";
    $conn->rollback();
}




$conn->close();
?>