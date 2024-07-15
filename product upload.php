<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="product upload php.php" enctype="multipart/form-data">
                    <h2>Product Details</h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="productName" name="title"
                            placeholder="Product Name">
                        <label for="productName">Product Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="description" rows="3" name="description"
                            placeholder="Description"></textarea>
                        <label for="description">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                        <label for="price">Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="categoryOptions" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unisex">Unisex</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Color Select" name="color">
                            <option selected>Select Color</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="lavender">Lavender</option>
                            <option value="beige">Beige</option>
                            <option value="sage green">Sage Green</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" name="material">
                            <option selected>Select Material</option>
                            <option value="cotton">Cotton</option>
                            <option value="polyester">Polyester</option>
                        </select>
                    </div>

                    <h2>Images</h2>
                    <div>
                        <input type="file" name="images[]" multiple>
                        <label for="highQualityImages">High-quality Images</label><br>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Upload Images</button>
                </form>
            </div>
        </div>
    </div>





    <script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>