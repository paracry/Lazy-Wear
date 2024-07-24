<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lazy_wear";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fieldsToUpdate = array();

$id = $_POST['id'];

if (isset($_POST['price']) && !empty($_POST['price'])) {
    $price=$conn->real_escape_string($_POST['price']);
    $fieldsToUpdate[] = "price = $price";
}

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name=$conn->real_escape_string($_POST['name']);
    $fieldsToUpdate[] = "name = '$name'";
}

if (isset($_POST['material']) && !empty($_POST['material'])) {
    $material=$conn->real_escape_string($_POST['material']);
    $fieldsToUpdate[] = "material = '$material'";
}
if (isset($_POST['color']) && !empty($_POST['color'])) {
    $color=$conn->real_escape_string($_POST['color']);
    $fieldsToUpdate[] = "color = '$color'";
}
if (isset($_POST['description']) && !empty($_POST['description'])) {
    $description=$conn->real_escape_string($_POST['description']);
    $fieldsToUpdate[] = "description = '$description'";
}

if (!empty($fieldsToUpdate)) {
    $sql = "UPDATE product SET " . implode(", ", $fieldsToUpdate) . " WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "table updated successfully";
        header("Location: admin products.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo "empty form submission";
}
?>