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

                    // Get the user ID from the link
                    $user_id = $_GET['id'];

                    // Prepare the query to retrieve the user's information
                    $stmt = $conn->prepare("SELECT * FROM `customer` WHERE `id` = ?");
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Fetch the user's information
                    $user_data = $result->fetch_assoc();

                    // Prepare the query to retrieve the user's address
                    $stmt = $conn->prepare("SELECT * FROM `address` WHERE `customer_id` = ?");
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Fetch the user's address
                    $address_data = $result->fetch_assoc();

                    if (empty($address_data)) {
                        $address_message = "No address set yet.";
                    } else {
                        $address_message = "";
                        $street = $address_data['street'];
                        $pincode = $address_data['pincode'];
                        $area = $address_data['area'];
                        $district = $address_data['district'];
                        $city = $address_data['city'];
                        $state = $address_data['state'];
                    }
                    // Close the connection
                    $conn->close();
                    ?>

                    <!-- Display the user's information and address -->
                    <div class="user-profile">
                        <h2>User Profile</h2>
                        <p><strong>First Name:</strong> <?php echo $user_data['first_name']; ?></p>
                        <p><strong>Last Name:</strong> <?php echo $user_data['last_name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $user_data['email']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $user_data['phone']; ?></p>

                        <h3>Address</h3>
                        <?php if (!empty($address_message)) { ?>
                            <p><?php echo $address_message; ?></p>
                        <?php } else { ?>
                            <p><strong>Street:</strong> <?php echo $address_data['street']; ?></p>
                            <p><strong>Pincode:</strong> <?php echo $address_data['pincode']; ?></p>
                            <p><strong>Area:</strong> <?php echo $address_data['area']; ?></p>
                            <p><strong>District:</strong> <?php echo $address_data['district']; ?></p>
                            <p><strong>City:</strong> <?php echo $address_data['city']; ?></p>
                            <p><strong>State:</strong> <?php echo $address_data['state']; ?></p>
                        <?php } ?>
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