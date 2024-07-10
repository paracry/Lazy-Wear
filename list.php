<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

        #foot-img{
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
            #product img{
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

            .price{
                color: black;
                text-decoration: underline;
            }


        }

        @media (min-width: 768px) {
            #product img {
                width: 25vw;
                height: auto;
            }

            #product {
                width: 25vw;
                margin: 3.5vw;
            }

            .details h2 {
                font-size: 2vh;
                text-align: center;
                text-decoration: none;
                color: black;
        }


        /*footer*/
        #footer {
            color: whitesmoke;
        }

        #foot-img{
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
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
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <h1 class="display-2 text-center mt-5">Products</h1>

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

        echo '<h2 class="available">' . $total_entries . ' Properties available to buy in India</h2><br>';

        $sql = "SELECT * FROM property";
        $result = $conn->query($sql);

        echo '<div class="container-fluid">';
        echo '<div class="row">';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div id="pro" class="col-sm-6 col-md 4 col-lg-3">';
                echo '<a href="property.php?property_id=' . $row["property_id"] . '">';
                echo '<div id="product" >';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/><br>';
                echo '<div class="details">';
                echo "<h2 class='price'>Price: <span  id='formattedPrice_" . $row["property_id"] . "'></span></h2>";
                echo "<script>document.getElementById('formattedPrice_" . $row["property_id"] . "').innerText = formatIndianCurrency(" . $row['price'] . ");</script>";
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
                        <a href="#">Home</a><br>
                        <a href="#">About</a><br>
                        <a href="#">Products</a><br>
                        <a href="#">Login</a><br>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>