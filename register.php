<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">



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


        form p {
            color: red;
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
    <?php session_start(); ?>
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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="list.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-disabled="true" href="login.php"><button type="button"
                                class="btn btn-outline-success" id="loginbtn">Login</button></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <h1 class="display-2 text-center mt-5">Register</h1>

    <center>
        <div id="login" class="container mt-5">
            <form method="POST" action="register verification.php">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="fname" placeholder="Alex" required>
                    <label for="floatingInput" >First Name</label>
                    <p>
                        <?php if (isset($_SESSION['fname_error'])) {
                            echo $_SESSION['fname_error'];
                        } ?>
                    </p>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="lname" placeholder="Barn" required>
                    <label for="floatingInput" >Last Name</label>
                    <p>
                        <?php if (isset($_SESSION['lname_error'])) {
                            echo $_SESSION['lname_error'];
                        } ?>
                    </p>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" name="phone" placeholder="9366851221" required>
                    <label for="floatingInput" >Phone Number</label>
                    <p>
                        <?php if (isset($_SESSION['phone_error'])) {
                            echo $_SESSION['phone_error'];
                        } ?>
                    </p>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                        placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                    <p>
                        <?php if (isset($_SESSION['email_error'])) {
                            echo $_SESSION['email_error'];
                        } ?>
                    </p>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                        placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="confirm_password"
                        placeholder="Password" required>
                    <label for="floatingPassword">Confirm Password</label>
                    <p>
                        <?php if (isset($_SESSION['password_error'])) {
                            echo $_SESSION['password_error'];
                        } ?>
                    </p>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Login</button>
                <br><br>
                <p style="color: black;">Already registered?<a href="login.php"> Login now</a></p>
            </form>
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

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>