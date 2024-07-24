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

        table {
            max-width: 100%;
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
                        <a href="admin products.php" class="list-group-item">Products</a>
                        <a href="#" class="list-group-item" data-bs-toggle="collapse"
                            data-bs-target="#orders-collapse">Orders</a>
                        <div class="collapse" id="orders-collapse">
                            <a href="admin orders a.php" class="list-group-item">Active</a>
                            <a href="admin orders d.php" class="list-group-item">Delivered</a>
                        </div>
                        <a href="#" class="list-group-item active">Customers</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <h1>Dashboard</h1>
                    <p>Welcome to the Clothing Brand Admin dashboard.</p>
                    <?php
                    // Connect to database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "lazy_wear";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query to retrieve all customers
                    $sql = "SELECT id, first_name, last_name, phone, email FROM customer";
                    $result = $conn->query($sql);

                    // Close connection
                    $conn->close();
                    ?>

                    <!-- Customer List Table -->
                    <div class="container mt-5">
                        <h2>Customer List</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["first_name"]; ?></td>
                                        <td><?php echo $row["last_name"]; ?></td>
                                        <td><?php echo $row["phone"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td>
                                            <a href="delete user.php?id=<?php echo $row["id"]; ?>"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <h1 class="display-1 text-center mt-5">Unautorized visit.</h1>
    <?php endif; ?>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>