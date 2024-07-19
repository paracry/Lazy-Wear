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
            margin-top: -0.7vh;
        }


        .carousel {
            width: 50vw;
            height: 91vh;
            /* Set the maximum width */
            margin;
            /* Center the carousel */
        }

        .carousel-item img {
            height: 91vh;

            object-fit: cover;
            /* Set the maximum height for carousel images */
        }

        #product_details {
            margin-left: 2vw;
        }

        .size-option {
            display: inline-block;
            padding: 2vh 4vw;
            margin: 1vh 0.411vw;
            cursor: pointer;
            transition: 300ms;
            border: solid 0.1vh black;
        }

        .size-option:hover {
            background-color: black;
            color: whitesmoke;
        }

        .size-option.selected {
            background-color: black;
            color: white;
            transition: 300ms;
        }

        #cartbtn {
            padding: 4vh 6.8vw;
        }

        #wishlistbtn {
            padding: 4vh 5.9vw;

        }

        #removewishlistbtn {
            padding: 1vh 4.4vw;

        }

        #buybtn {
            padding: 3vh 17.55vw;
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

        #footer img {
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

    <?php
    // Establish connection to MySQL database
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lazy_wear";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_GET['id'];

    $sql = "SELECT * FROM product_images where id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-6">



                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="logo" src="<?php echo $row['img1']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img2']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img3']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img4']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img5']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img6']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img7']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img8']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img9']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $row['img10']; ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM product where id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }
            ?>
            <div id="product_details" class="col-sm-12 col-md-4 col-lg-5">
                <h2 class="display-3"><?php echo ucwords($row['name']); ?></h2>
                <hr>
                <label>Price:</label>
                <h2 class="display-5">₹<?php echo $row['price']; ?>/-</h2>
                <hr>
                <form>
                    <div class="form-group mt-3">
                        <label for="size">Select Size:</label>
                        <select class="form-control" id="size" name="size" hidden required>
                            <option value="" disabled selected>Select an option</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <div class="size-options">
                        <div class="size-option" data-size="S">S</div>
                        <div class="size-option" data-size="M">M</div>
                        <div class="size-option" data-size="L">L</div>
                        <div class="size-option" data-size="XL">XL</div>
                    </div>

                    <div class="row mt-4 text-center">
                        <?php if ($userloggedIn): ?>

                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <button type="button" class="btn btn-outline-success" id="cartBtn">Add to Cart</button>
                            </div>
                            <script>
                                document.getElementById('cartBtn').addEventListener('click', function ()
                                {
                                    let selectedSize = document.getElementById('size').value;
                                    window.location.href = 'cart add.php?size=' + selectedSize + '&id=<?php echo $id; ?>';
                                });
                            </script>

                            <?php
                            $sql = "SELECT * FROM wishlist WHERE customer_id=" . $_SESSION['user_id'] . " AND product_id='$id'";
                            $result = $conn->query($sql);
                            ?>

                            <?php if ($result->num_rows > 0): ?>
                                <div class="col-sm-6 col-md-4 col-lg-6">
                                    <button type="button" class="btn btn-outline-secondary" id="removewishlistBtn">Remove from
                                        Wishlist</button>
                                    <script> document.getElementById('removewishlistBtn').addEventListener('click', function ()
                                        {
                                            window.location.href = 'wishlist remove.php?id=<?php echo $id; ?>';
                                        });</script>
                                </div>
                            <?php else: ?>

                                <div class="col-sm-6 col-md-4 col-lg-6">
                                    <button type="button" class="btn btn-outline-danger" id="wishlistBtn">Add to
                                        Wishlist</button>
                                </div>


                            <?php endif; ?>
                            <?php if (isset($_SESSION['size_error'])) {
                                echo "" . $_SESSION['size_error'] . "";
                            } ?>
                            <?php
                            $sql = "SELECT * FROM cart WHERE customer_id=" . $_SESSION['user_id'] . " AND product_id='$id'";
                            $result = $conn->query($sql);
                            ?>

                            <?php if ($result->num_rows > 0): ?>
                                <div class="col-sm-12 col-md-4 col-lg-12 mt-4">
                                    <p>An instance of this item is already present in your cart.</p>
                                    <a href="cart.php"><button type="button" class="btn btn-outline-info" id="buyBtn">View Cart</button></a>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <p style="color:red; margin-bottom:0.5vh;">You can buy or you can add this item to your
                                Wishlist/Cart once
                                you're logged in.</p>
                        <?php endif; ?>
                    </div>
                </form>


                <script>
                    $(document).ready(function ()
                    {
                        $('.size-option').click(function ()
                        {
                            $('.size-option').removeClass('selected');
                            $(this).addClass('selected');
                            $('#size').val($(this).data('size'));
                        });
                    });
                </script>
                <script>
                    document.getElementById('cartBtn').addEventListener('click', function ()
                    {
                        let selectedSize = document.getElementById('size').value;
                        window.location.href = 'cart add.php?size=' + selectedSize + '&id=<?php echo $id; ?>';
                    });

                    document.getElementById('wishlistBtn').addEventListener('click', function ()
                    {
                        let selectedSize = document.getElementById('size').value;
                        window.location.href = 'wishlist add.php?size=' + selectedSize + '&id=<?php echo $id; ?>';
                    });

                    document.getElementById('buyBtn').addEventListener('click', function ()
                    {
                        let selectedSize = document.getElementById('size').value;
                        window.location.href = 'buy.php?size=' + selectedSize + '&id=<?php echo $id; ?>';
                    });
                </script>



                <div class="row mt-4 text-center">
                    <hr>
                    <div class="col-sm-6 col-md-4 col-lg-6">
                        <label>Color:</label>
                        <h2 class="display-6"><?php echo ucwords($row['color']); ?></h2>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-6">
                        <label>Material:</label>
                        <h2 class="display-6"><?php echo ucwords($row['material']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-12 text-center">
            <hr>
            <h1 class="display-5 mt-2">Description</h1>
            <p><?php echo ucwords($row['description']); ?></p>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-12 text-center">
                <h1 class="display-6 mt-2">You might also like</h1>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM product p, product_images i WHERE p.id=i.id;";

        if ($result->num_rows > 0) {
            $img = mysqli_fetch_assoc($result);
        }


        $sql = "SELECT * FROM product WHERE id!=$id";
        $result = $conn->query($sql);

        echo '<div class="container-fluid mt-3">';
        echo '<div class="row">';
        $count = 0;
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
                $count++;

                if ($count == 4) {
                    break;
                }
            }
        } else {
            echo "no products found";
        }
        echo '</div>';
        echo '</div>';
        $conn->close();
        ?>
        <div class="col-sm-12 col-md-4 col-lg-12 text-center mt-4">
            <a href="list.php"><button class="btn btn-outline-dark">Explore more</button></a>
        </div>

    </div>

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