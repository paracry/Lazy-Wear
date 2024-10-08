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

        table {
            height: 40vh;
        }

        td,
        th {
            text-align: center;
            /* center horizontally */
            vertical-align: middle;
            /* center vertically */
        }




        /*footer*/
        #footer {
            color: whitesmoke;
        }

        #foot-img {
            filter: invert();
            height: 10vh;
            width: auto;
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
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
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
    <div class="container-fluid">
        <h2 class="display-4 text-center mt-5">Orders</h2>
        <table class="table table-bordered">
            <?php
            $conn = new mysqli("localhost", "root", "", "lazy_wear");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM orders WHERE customer_id=" . $_SESSION['user_id'];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { ?>
                <thead>
                    <tr style="color:white; background-color:black;">
                        <th scope="col" style="color:white; background-color:black;">Order ID</th>
                        <th scope="col" style="color:white; background-color:black;">Order Date</th>
                        <th scope="col" style="color:white; background-color:black;">Total</th>
                        <th scope="col" style="color:white; background-color:black;">Status</th>
                        <th scope="col" style="color:white; background-color:black;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = $result->fetch_assoc()) {
                        $sql = "SELECT * FROM customer WHERE id=" . $row['customer_id'];
                        $r = $conn->query($sql);
                        $customer = $r->fetch_assoc()
                            ?>
                        <tr>
                            <td><a
                                    href="order details customer.php?order_id=<?php echo $row['order_id']; ?>"><?php echo $row['order_id']; ?></a>
                            </td>
                            <td><?php echo $row['order_date']; ?></td>
                            <td>₹<?php echo number_format($row['total'], 2, '.', ','); ?>/-</td>
                            <td><?php echo $row['status']; ?></td>
                            <?php if ($row['status'] == "pending"): ?>
                                <td>
                                    <button type='button' class='btn btn-outline-danger' data-bs-toggle="modal"
                                        data-bs-target="#cancelModal<?php echo $row['order_id']; ?>">Cancel Order</button>
                                </td>
                            <?php else: ?>
                                <td><a href="order details customer.php?order_id=<?php echo $row['order_id']; ?>"><button
                                            type='button' class='btn btn-outline-info'>View order</button></a>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php
                        // Modal for canceling
                        echo "<div class='modal fade' id='cancelModal" . $row['order_id'] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        echo "  <div class='modal-dialog'>";
                        echo "    <div class='modal-content'>";
                        echo "      <div class='modal-header'>";
                        echo "        <h5 class='modal-title' id='exampleModalLabel'>Cancel Order</h5>";
                        echo "        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                        echo "      </div>";
                        echo "      <div class='modal-body'>";
                        echo " <p>Are you sure you want to cancel this order?</p>";
                        echo "      </div>";
                        echo "      <div class='modal-footer'>";
                        echo "        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
                        echo "        <a href='cancel order.php?order_id=" . $row['order_id'] . "'><button type='button' class='btn btn-danger'>Confirm</button></a>";
                        echo "      </div>";
                        echo "    </div>";
                        echo "  </div>";
                        echo "</div>";
                    }
            } else {
                ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            <h1 class="display-5">No orders yet!</h1><br><a href="list.php"><button
                                    class="btn btn-outline-dark">Make some now!</button> </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <center>
        <div id="footer" class="container-fluid mt-5 bg-black">
            <div class="row">
                <div class="col-sm-1 col-md-6 col-lg-6 mb-5  mt-5">
                    <div id="foot-contact">
                        <img id="foot-img" src="images/support.png" alt="...">
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
                        <img id="foot-img" src="images/box.png" alt="...">
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