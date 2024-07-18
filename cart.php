<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function formatIndianCurrency(price)
        {
            return '₹' + new Intl.NumberFormat('en-IN').format(price) + '/-';
        }
    </script>
    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        // User is logged in
        $userloggedIn = true;
    } else {
        $userloggedIn = false;
    }
    ?>

    <style>
        nav li {
            font-size: 2.5vh;
        }

        #navlogged {
            margin-top: 0.3vh;

        }

        #navbtn {
            margin-top: -0.8vh;
        }

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


        #footer {
            color: whitesmoke;
        }

        #footer img {
            filter: invert();
            height: 10vh;
            width: auto;
            z-index: 1;

        }

        #footer a {
            color: rgb(185, 185, 185);
            text-decoration: none;
            font-size: 2.5vh;
            transition: 500ms;
        }

        #footer a:hover {
            color: whitesmoke;
            font-size: 4vh;
            transition: 500ms;

        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Lazy Wear</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about us">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="list.php">Products</a>
                    </li>
                    <?php if ($userloggedIn): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php echo "Welcome " . $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu text-center">
                                <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                                <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                                <li><a class="dropdown-item" href="orders.php">Orders</a></li>
                                <li><a class="dropdown-item" href="logout.php"><button
                                            class="btn btn-outline-danger">Logout</button></a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-disabled="true" href="login.php"><button type="button"
                                    class="btn btn-outline-success" id="navbtn">Login</button></a>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>

    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Size</th>
            <th>Quantity</th>
        </tr>

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


        $sql = "SELECT COUNT(*) as total FROM product";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_entries = $row['total'];

        $total = 0;

        $sql = "SELECT * FROM product p, product_images i WHERE p.id=i.id;";

        if ($result->num_rows > 0) {
            $img = mysqli_fetch_assoc($result);
        }


        $sql = "SELECT * FROM cart where customer_id=" . $_SESSION['user_id'];
        $result = $conn->query($sql);

        echo '<div class="container-fluid">';
        echo '<div class="row">';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "SELECT * FROM product_images WHERE id=" . $row['product_id'];
                $r = $conn->query($sql);
                if ($r->num_rows > 0) {
                    $img = mysqli_fetch_assoc($r);
                }

                $sql = "SELECT * FROM product WHERE id=" . $row['product_id'];
                $re = $conn->query($sql);
                if ($re->num_rows > 0) {
                    $product = mysqli_fetch_assoc($re);
                }

                echo '<a id="link" href="product.php?id=' . $row["product_id"] . '">';
                echo "<tr>";
                echo "    <td><a id='link' href='product.php?id=" . $row["product_id"] . "'><img src='" . ($img["img1"]) . "' alt='Item 1'></td></a>";
                echo "    <td>" . ($product["name"]) . "</td>";
                echo "    <td>₹" . ($product["price"]) . "/-</td>";
                echo "    <td>" . ($row["size"]) . "</td>";
                echo "    <td><input type='number' value='1'></td>";
                echo "</tr>";
                echo "";
                $total = $total + ($product['price']);
            }
        }
        ?>
        <tr>
            <td></td>
            <td>Items total:</td>
            <td>₹<?php echo $total; ?>/-</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>+Delivery Charges:</td>
            <td>₹60/-</td>
            <td></td>
            <td></td>
        </tr>
        <?php $total = $total + 60; ?>
        <tr>
            <td></td>
            <td>Total:</td>
            <td>₹<?php echo $total; ?>/-</td>
            <td></td>
            <td></td>
        </tr>
        <tr class="sticky-row">
            <td style="padding-right:17.5vw; padding-left:36.5vw;">Total:</td>
            <td style="padding-right:15vw">₹<?php echo $total; ?>/-</td>
            <td><button style="padding:1vh 5vw;" class="btn btn-outline-warning">Checkout</button></td>
        </tr>
    </table>

    <center>
        <div id="footer" class="container-fluid mt-5 bg-black">
            <div class="row">
                <div class="col-sm-1 col-md-6 col-lg-6 mb-5  mt-5">
                    <div id="foot-contact">
                        <img src="images/support.png" alt="...">
                        <h1 class="display-5">Contact us</h1>
                        <p>Phone: 9366851221</p>
                        <p>Email: <a href="mailto:connectlazywear@gmail.com">connectlazywear@gmail.com</a></p>
                        <p>Instagram: <a
                                href="https://www.instagram.com/connectlazywear?igsh=MTdmZWJ6bXMwaGUzeA==">@connectlazywear</a>
                        </p>
                    </div>
                </div>
                <div class="col-sm-1 col-md-6 col-lg-6 mb-5  mt-5">
                    <div id="foot-explore">
                        <img src="images/box.png" alt="...">
                        <h1 class="display-5">Explore</h1>
                        <a href="home.php">Home</a><br>
                        <a href="list.php">Products</a><br>
                        <a href="login.php">Login</a><br>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>