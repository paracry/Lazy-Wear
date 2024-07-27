<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

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
            margin-top: -0.7vh;
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


        @media (max-width: 768px) {

            #product img {
                width: 53vw;
                height: 30vh;
                margin-left: -5vw;
                object-fit: cover;
                margin-bottom: 1vh;
                transition: 500ms;
            }


            #product {
                width: 50vw;

                object-fit: contain;
                overflow: hidden;
                background-color: #000000;
                color: whitesmoke;
                border: solid 1vw white;
            }

            .details {
                font-size: 1.65vh;
                text-align: center;
                text-decoration: dotted;
                color: whitesmoke;
            }

            #price {
                font-size: 3vh;
            }

            #link {
                text-decoration: none !important;
            }



        }

        @media (min-width: 768px) {

            #product img {
                width: 25vw;
                height: 60vh;
                margin-left: -3vw;
                object-fit: cover;
                margin-bottom: 1vh;
                transition: 500ms;
            }


            #product {
                width: 22vw;
                height: 66vh;
                margin: 2.2vh 0;
                margin-left: 2.2vw;

                background-color: rgb(0, 0, 0);
                color: white;
                object-fit: contain;
                overflow: hidden;
                border-radius: 10%;
                border: none;
                transition: 500ms;
                position: relative;
            }

            #product:hover {
                box-shadow: 0 0 5vh black;
                transition: 500ms;
                border-radius: 3%;
                height: 70vh;
            }

            .details {
                font-size: 2vh;
                text-align: center;
                text-decoration: none;
                color: rgb(255, 255, 255);
            }

            #price {
                font-size: 3vh;
            }

            .details p {
                text-align: center;
            }

            #link {
                text-decoration: none !important;
            }
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

    <h1 class="display-5 text-center mt-5 mb-5"><?php echo $_SESSION['username']; ?>'s Wishlist</h1>

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

    $user_id = $_SESSION['user_id'];


    $sql = "SELECT COUNT(*) as total FROM wishlist";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_entries = $row['total'];

    $sql = "SELECT * FROM product p, product_images i WHERE p.id=i.id;";

    if ($result->num_rows > 0) {
        $img = mysqli_fetch_assoc($result);
    }


    $sql = "SELECT * FROM product p, wishlist w WHERE p.id = w.product_id AND w.customer_id = $user_id";
    $result = $conn->query($sql);

    echo '<div class="container-fluid">';
    echo '<div class="row">';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql = "SELECT * FROM product_images WHERE id=" . $row['id'] . ";";
            $r = $conn->query($sql);
            if ($r->num_rows > 0) {
                $img = mysqli_fetch_assoc($r);
            }
            echo '<div id="product" class="col-sm-6 col-md-4 col-lg-3">';
            echo '<a id="link" href="product.php?id=' . $row["id"] . '">';
            echo '<img class="image" src="' . ($img["img1"]) . '"/><br>';
            echo '<div class="details">';
            echo "<h1 id='price' class='display-5'>Price: <span  id='formattedPrice_" . $row["id"] . "'></span></h1>";
            echo "<script>document.getElementById('formattedPrice_" . $row["id"] . "').innerText = formatIndianCurrency(" . $row['price'] . ");</script>";
            echo '<p>Material: ' . ucwords($row["material"]) . ' | Color: ' . ucwords($row["color"]) . ' | S . M . L . XL</p>';
            echo '</div>';
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<h1 class='display-6 text-center mb-5'>is empty :(</h1>";
    }
    echo '</div>';
    echo '</div>';
    $conn->close();



    ?>


    <center>
        <p>The best is yet to come...</p>
        <a href='list.php'><button class='btn btn-outline-dark mt-5 mb-5'>Explore our wide range of
                collections</button></a>
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