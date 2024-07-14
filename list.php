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
    <style>
        @media (max-width: 768px) {

            /* CSS rules for mobile devices */
            #login {
                width: 90vw;
                background-color: rgba(206, 206, 206, 0.405);
                border-radius: 6vh;
                padding: 3vh;
                padding-bottom: 1vh;

            }

            #login input {
                border-radius: 10vh;
            }
        }

        @media (min-width: 768px) {

            /* CSS rules for desktop devices */
            #login {
                background-color: rgba(206, 206, 206, 0.405);
                border-radius: 10vh;
                width: 27vw;
                padding: 6vh 2vw;
                padding-bottom: 1vh;
            }

            #login input {
                border-radius: 10vh;

            }

        }

        /*navbar*/

        .navbar.bg-dark {
            background-color: #000000;
            /* Black color */
        }

        nav li {
            font-size: 2.5vh;
        }

        #loginbtn {
            margin-top: -0.8vh;
        }

        .carousel {
            max-width: 100vw;
            /* Set the maximum width */
            margin: auto;
            /* Center the carousel */
        }

        .carousel-item img {
            max-height: 91vh;

            object-fit: cover;
            /* Set the maximum height for carousel images */
        }

        #logo {
            object-fit: contain;
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
            #product img:hover {
                transition: 500ms;
            }

            #product img {
                width: 50vw;
                height: 30vh;
                margin-right: 10vw;
                object-fit: cover;
                margin-bottom: 1vh;
                transition: 500ms;
            }


            #product {
                width: 44vw;
                margin: 3vw;
                box-shadow: 0 0 1vh black;
                border-radius: 5vh;
                object-fit: contain;
                overflow: hidden;
            }

            .details h2 {
                font-size: 2vh;
                text-align: center;
                text-decoration: dotted;
                color: black;
            }




            #pro {
                width: 45vw;
                margin-left: -2vw;
                margin-right: 5vw;
            }

            .price {
                color: black;
                text-decoration: underline;
            }


        }

        @media (min-width: 768px) {

            #contain {
                display: flex;
            }

            #product img {
                width: 50vw;
                height: 50vh;
                margin-right: 10vw;
                object-fit: cover;
                margin-bottom: 1vh;
                transition: 500ms;
            }

            #product img:hover {
                width: 70vw;
                transform: scale(1.1);
                margin-bottom: 3vh;

            }


            #product {
                width: 22vw;
                height: 56vh;
                margin: 4vh 0;
                margin-left: 1vw;
                background-color: rgb(0, 0, 0);
                color: white;
                object-fit: contain;
                overflow: hidden;
                border-radius: 10%;
                transition: 500ms;
                position: relative;
            }

            #product:hover {
                box-shadow: 0 0 5vh black;
                transition: 500ms;
                border-radius: 3%;
                height: 62vh;
            }

            .details h1 {
                font-size: 3vh;
                text-align: center;
                text-decoration: none;
                color: rgb(255, 255, 255);
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
    <nav id="nav" class="navbar navbar-expand-lg bg-black" data-bs-theme="dark">
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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" aria-current="page" href="list.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-disabled="true" href="login.php"><button type="button"
                                class="btn btn-outline-success" id="loginbtn">Login</button></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <h1 class="display-2 text-center mt-5">Explore</h1>
    <p class="text-center">Our wide range of collection</p>

    <div class="data">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "real_estate";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT COUNT(*) as total FROM property";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_entries = $row['total'];

        $sql = "SELECT * FROM property";
        $result = $conn->query($sql);

        echo '<div class="container-fluid">';
        echo '<div id="contain" class="row">';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div id="pro" class="col-sm-6 col-md 1 col-lg-3">';
                echo '<a id="link" href="property.php?property_id=' . $row["property_id"] . '">';
                echo '<div id="product" >';
                echo '<img class="image" src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/><br>';
                echo '<div class="details">';
                echo "<h1 id='price' class='display-5'>Price: <span  id='formattedPrice_" . $row["property_id"] . "'></span></h1>";
                echo "<script>document.getElementById('formattedPrice_" . $row["property_id"] . "').innerText = formatIndianCurrency(" . $row['price'] . ");</script>";
                echo '<p>Material: cotton | One-day delivery | S M L XL</p>';
                echo '</div>';
                echo '</div>';
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        echo '</div>';
        echo '</div>';
        $conn->close();

        ?>

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