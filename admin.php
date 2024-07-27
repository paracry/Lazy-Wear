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

        $query = "SELECT COUNT(*) as total FROM product";

        // Execute the query
        $result = $conn->query($query);

        // Get the result
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $itemtotal = $row["total"];
        } else {
            echo "0 results";
        }

        $query = "SELECT COUNT(*) as total FROM customer";

        // Execute the query
        $result = $conn->query($query);

        // Get the result
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usertotal = $row["total"];
        } else {
            echo "0 results";
        }

        $query = "SELECT COUNT(*) as total FROM orders";

        // Execute the query
        $result = $conn->query($query);

        // Get the result
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $orderstotal = $row["total"];
        } else {
            echo "0 results";
        }

        $query = "SELECT COUNT(*) as total FROM orders WHERE status='pending'";

        // Execute the query
        $result = $conn->query($query);

        // Get the result
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $orderspending = $row["total"];
        } else {
            echo "0 results";
        }

        $query = "SELECT COUNT(*) as total FROM orders WHERE status='delivered'";

        // Execute the query
        $result = $conn->query($query);

        // Get the result
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $orderdelivered = $row["total"];
        } else {
            echo "0 results";
        }


        // Close the connection
        $conn->close();
        ?>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Dashboard</a>
                        <a href="admin products.php" class="list-group-item">Products</a>
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
                    <h1>Dashboard</h1>
                    <p>Welcome to the Clothing Brand Admin dashboard.</p>
                    <a href='https://www.free-counters.org/'>free Hit Counter</a>
                    <script type='text/javascript'
                        src='https://www.freevisitorcounters.com/auth.php?id=c723dfbdf3656a73fca1e64c4df7b0bb84850fac'></script>
                    <script type="text/javascript"
                        src="https://www.freevisitorcounters.com/en/home/counter/1207570/t/6"></script>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Products</h5>
                                    <p class="card-text"><?php echo $itemtotal; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders</h5>
                                    <p class="card-text"><?php echo $orderstotal; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Active Orders</h5>
                                    <p class="card-text"><?php echo $orderspending; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Delivered Orders</h5>
                                    <p class="card-text"><?php echo $orderdelivered; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Customers</h5>
                                    <p class="card-text"><?php echo $usertotal; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
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