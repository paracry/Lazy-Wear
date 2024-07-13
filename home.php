<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        nav li {
            font-size: 2.5vh;
        }

        #login {
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


        #product {
            height: 70vh;
            width: auto;
        }

        #product img {
            height: 78vh;
            width: auto;
            object-fit: cover;
        }

        #but {
            background-color: #0000001c;
            /* Adjust the alpha value for blur intensity */
            backdrop-filter: blur(10px);
            border: none;
            transition: 500ms;
        }

        #but:hover {
            padding: 5vh 5vh;
            color: whitesmoke;
            border-radius: 50vh;
            transition: 500ms;
        }

        #but:active {
            padding: 5vh 5vh;
            color: whitesmoke;
            border-radius: 50vh;
            transition: 500ms;
        }

        #services img {
            height: 15vh;
            width: auto;
        }


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
                    <li class="nav-item">
                        <a class="nav-link active" aria-disabled="true" href="login.php"><button type="button"
                                class="btn btn-outline-success" id="login">Login</button></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img id="logo" src="images/logo.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/38_2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/38_4.webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Style is a way to say who you are without having to speak.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            <cite title="Source Title">Rachel Zoe</cite>
        </figcaption>
    </figure>


    <h1 class="display-4 text-center mt-5">New Arrivals</h1>

    <center>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-1 col-md-6 col-lg-3 mb-5">
                    <div id="product" class="card" style="width: 18rem;">
                        <img src="images/ov1.jpg" class="card-img-top" alt="...">
                        <a href="https://zzzcode.ai/answer-question"><button type="button" id="but"
                                class="btn btn-outline-light position-absolute top-50 start-50 translate-middle">Peek</button></a>

                    </div>
                </div>
                <div class="col-sm-1 col-md-6 col-lg-3 mb-5">
                    <div id="product" class="card" style="width: 18rem;">
                        <img src="images/ov2.jpg" class="card-img-top" alt="...">
                        <a href="https://zzzcode.ai/answer-question"><button type="button" id="but"
                                class="btn btn-outline-light position-absolute top-50 start-50 translate-middle">Peek</button></a>


                    </div>
                </div>
                <div class="col-sm-1 col-md-1 col-lg-3 mb-5">
                    <div id="product" class="card" style="width: 18rem;">
                        <img src="images/ov3.jpg" class="card-img-top" alt="...">
                        <a href="https://zzzcode.ai/answer-question"><button type="button" id="but"
                                class="btn btn-outline-light position-absolute top-50 start-50 translate-middle">Peek</button></a>

                    </div>
                </div>
                <div class="col-sm-1 col-md-6 col-lg-3 mb-5">
                    <div id="product" class="card" style="width: 18rem;">
                        <img src="images/ov4.jpeg" class="card-img-top" alt="...">
                        <a href="https://zzzcode.ai/answer-question"><button type="button" id="but"
                                class="btn btn-outline-light position-absolute top-50 start-50 translate-middle">Peek</button></a>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-dark" style="margin-top: -6vh;">Explore more collections</button>
        </div>
    </center>



    <div class="container-fluid text-center mt-5 ">
        <h1 class="display-4 text-center">About us</h1>
        <p>At Lazy Wear, we believe that what you wear is a reflection of who you are and who you aspire to be. Our
            mission is to offer a curated selection of clothing that not only keeps you on-trend but also helps you make
            a
            statement as you embark on your professional journey.</p>
        <button class="btn btn-outline-dark">Learn More</button>
    </div>



    <center>
        <div class="container mt-5">
            <h1 class="display-4 text-center mb-5">Our Services</h1>
            <div class="row">
                <div class="col-sm-1 col-md-6 col-lg-4 mb-5">
                    <div id="services">
                        <img src="images/support.png" class="card-img-top" alt="...">
                        <p>24/7 Online-support</p>

                    </div>
                </div>
                <div class="col-sm-1 col-md-6 col-lg-4 mb-5">
                    <div id="services">
                        <img src="images/box.png" class="card-img-top" alt="...">
                        <p>Open-Box Delivery</p>


                    </div>
                </div>
                <div class="col-sm-1 col-md-1 col-lg-4 mb-5">
                    <div id="services">
                        <img src="images/fast-delivery.png" class="card-img-top" alt="...">
                        <p>Super Fast Delivery</p>

                    </div>
                </div>
            </div>
        </div>
    </center>


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





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>