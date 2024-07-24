<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Brand Admin</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .list-group-item {
            font-size: 18px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 18px;
        }

        .card-text {
            font-size: 16px;
        }

        @media (max-width: 768px) {

            img {
                width: 20vw;
                height: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            th,
            td {
                padding: 1vw;
                text-align: center;
                border-bottom: 1px solid #ddd;

            }

            th {
                background-color: #f2f2f2;
                color: #333;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            #quantity {
                text-decoration: none;
            }

            .sticky-row {
                color: whitesmoke;
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: black;
                /* Add your desired background color */
                padding: 2vh;
                border: none;
                text-align: center;
                font-size: 3vh;
                transition: 500ms;
                /* Adjust padding as needed */
            }

            .sticky-row:hover {
                color: whitesmoke;
                background: black;
                transition: 500ms;
            }

        }

        @media (min-width: 768px) {

            img {
                height: 20vh;
                width: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            th,
            td {
                padding: 8px;
                text-align: center;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
                color: #333;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            #quantity {
                text-decoration: none;
            }

            .sticky-row {
                color: whitesmoke;
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: black;
                /* Add your desired background color */
                padding: 2vh;
                border: none;
                text-align: center;
                font-size: 3vh;
                transition: 500ms;
                /* Adjust padding as needed */
            }

            .sticky-row:hover {
                color: whitesmoke;
                background: black;
                transition: 500ms;
            }

        }
    </style>
</head>

<body>
    <?php session_start(); ?>
    <?php if (isset($_SESSION['lol'])): ?>
        <nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Lazy Wear Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin products.php">Products</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Orders
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="ordersDropdown">
                                <li><a class="dropdown-item" href="admin orders a.php">Active</a></li>
                                <li><a class="dropdown-item" href="admin orders d.php">Delivered</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin customers.php">Customers</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="admin.php" class="list-group-item">Dashboard</a>
                        <a href="admin products.php" class="list-group-item active">Products</a>
                        <a href="#" class="list-group-item" data-bs-toggle="collapse"
                            data-bs-target="#orders-collapse">Orders</a>
                        <div class="collapse" id="orders-collapse">
                            <a href="admin orders a.php" class="list-group-item">Active</a>
                            <a href="admin orders d.php" class="list-group-item">Delivered</a>
                        </div>
                        <a href="admin customers.php" class="list-group-item">Customers</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <h1 class="display-5 mt-3">Products</h1>
                    <a href="product upload.php"><button class="btn btn-outline-success mt-1 mb-3">Add Product</button></a>
                    <?php
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

                    $itemtotal = 0;
                    $total = 0;


                    $sql = "SELECT * FROM product";
                    $result = $conn->query($sql);

                    echo '<div class="container-fluid">';
                    echo '<div class="row">';
                    if ($result->num_rows > 0) {

                        echo "    <table>";
                        echo "<tr>";
                        echo "    <th>Id</th>";
                        echo "    <th>Image</th>";
                        echo "    <th>Name</th>";
                        echo "    <th>Item Price</th>";
                        echo "    <th>Edit</th>";
                        echo "    <th>Delete</th>";
                        echo "</tr>";
                        while ($row = $result->fetch_assoc()) {
                            $sql = "SELECT * FROM product_images WHERE id=" . $row['id'];
                            $r = $conn->query($sql);
                            if ($r->num_rows > 0) {
                                $img = mysqli_fetch_assoc($r);
                            }

                            $sql = "SELECT * FROM product WHERE id=" . $row['id'];
                            $re = $conn->query($sql);
                            if ($re->num_rows > 0) {
                                $product = mysqli_fetch_assoc($re);
                            }

                            echo '<a id="link" href="product.php?id=' . $row["id"] . '">';
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "    <td><a id='link' href='product.php?id=" . $row["id"] . "'><img src='" . ($img["img1"]) . "' alt='Item 1'></td></a>";
                            echo "    <td>" . ($product["name"]) . "</td>";
                            echo "    <td>₹" . ($product["price"]) . "/-</td>";
                            echo "    <td><button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#editModal" . $row["id"] . "'>Edit</button>";
                            echo "    <td><button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteModal" . $row["id"] . "'>Delete</button>";

                            echo "</tr>";
                            echo "";

                            // Modal for editing
                            echo "<div class='modal fade' id='editModal" . $row["id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                            echo "  <div class='modal-dialog'>";
                            echo "    <div class='modal-content'>";
                            echo "      <div class='modal-header'>";
                            echo "        <h5 class='modal-title' id='exampleModalLabel'>Edit Product</h5>";
                            echo "        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                            echo "      </div>";
                            echo "      <div class='modal-body'>";
                            echo "        <form action='edit product.php' method='post'>";
                            echo "          <div class='mb-3'>";
                            echo "            <label for='name' class='form-label'>Id</label>";
                            echo "              <input type='number' class='form-control' name='id' value='" . $row["id"] . "'>";
                            echo "          </div>";
                            echo "          <div class='mb-3'>";
                            echo "            <label for='name' class='form-label'>Name</label>";
                            echo "            <input type='text' class='form-control' id='name' name='name' placeholder='" . $product["name"] . "'>";
                            echo "          </div>";
                            echo "          <div class='mb-3'>";
                            echo "            <label for='price' class='form-label'>Price</label>";
                            echo "            <input type='number' class='form-control' id='price' name='price' placeholder='" . $product["price"] . "'>";
                            echo "          </div>";
                            echo "          <div class='mb-3'>";
                            echo "            <label for='price' class='form-label'>Color</label>";
                            echo "            <input type='text' class='form-control' id='color' name='color' placeholder='" . $product["color"] . "'>";
                            echo "          </div>";
                            echo "          <div class='mb-3'>";
                            echo "            <label for='price' class='form-label'>Material</label>";
                            echo "            <input type='text' class='form-control' id='material' name='material' placeholder='" . $product["material"] . "'>";
                            echo "          </div>";
                            echo "          <div class='mb-3'>";
                            echo "            <label for='price' class='form-label'>Description</label>";
                            echo "            <input type='text' class='form-control' id='description' name='description' placeholder='" . $product["description"] . "'>";
                            echo "          </div>";
                            echo "          <button type='submit' class='btn btn-primary'>Save Changes</button>";
                            echo "        </form>";
                            echo "      </div>";
                            echo "    </div>";
                            echo "  </div>";
                            echo "</div>";

                            // Modal for deleting
                            echo "<div class='modal fade' id='deleteModal" . $row["id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                            echo "  <div class='modal-dialog'>";
                            echo "    <div class='modal-content'>";
                            echo "      <div class='modal-header'>";
                            echo "        <h5 class='modal-title' id='exampleModalLabel'>Delete Product</h5>";
                            echo "        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                            echo "      </div>";
                            echo "      <div class='modal-body'>";
                            echo " <p>Are you sure you want to delete this product</p>";
                            echo "      <a id='delete' href='delete product.php?id=$row[id]'><button type='button' class='btn btn-outline-danger'>Confirm</button></a>";
                            echo "      </div>";
                            echo "    </div>";
                            echo "  </div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='container-fluid text-center mt-5 mb-5'>";
                        echo "<h1 class='display-3 text-center mt-5 mb-5'>No products yet :(</h1>";
                    } ?>
                </div>
            </div>
        </div>

    <?php else: ?>
        <h1 class="display-1 text-center">Unautorized visit.</h1>
    <?php endif; ?>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>