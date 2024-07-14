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
                <form>
                    <h2>Product Details</h2>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="productName" placeholder="Product Name">
                        <label for="productName">Product Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="description" rows="3" placeholder="Description"></textarea>
                        <label for="description">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="price" placeholder="Price">
                        <label for="price">Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="categoryOptions">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unisex">Unisex</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Color Select">
                            <option selected>Select Color</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="lavender">Lavender</option>
                            <option value="beige">Beige</option>
                            <option value="sage green">Sage Green</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Material</option>
                            <option value="cotton">Cotton</option>
                            <option value="polyester">Polyester</option>
                        </select>
                    </div>

                    <h2>Images</h2>
                    <div>
                        <input type="file" class="form-control-file" id="highQualityImages">
                        <label for="highQualityImages">High-quality Images</label><br>
                    </div>

                </form>
            </div>
        </div>
    </div>





    <script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>