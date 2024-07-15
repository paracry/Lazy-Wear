<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Registered Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Inventory
                            </a>
                        </li>
                    </ul>
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
            ?>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div id="inventory">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Color</th>
                                <th scope="col">Material</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sql = "SELECT * FROM product";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
;
                                echo '<tr>';
                                echo '<th scope="row">'.$row["id"].'</th>';
                                echo '<td scope="col">' . $row["name"] . '</td>';
                                echo '<td scope="col">' . $row["price"] . '</td>';
                                echo '<td scope="col">' . $row["color"] .'</td>';
                                echo '<td scope="col"> '. $row["material"] .'</td>';
                                echo "</tr>";
                                echo "</thead>";


                            }
                        }
                        ?>
                        </tbody>
                    </table>";
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>