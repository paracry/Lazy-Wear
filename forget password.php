<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Forgot Password</h1>
                <p>Please answer the following questions to verify your identity:</p>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form action="forget password php.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="question1" class="form-label">What is your favorite hobby?</label>
                        <input type="text" id="question1" name="question1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="question2" class="form-label">What is the name of your favorite book?</label>
                        <input type="text" id="question2" name="question2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="question3" class="form-label">What is the name of your favorite childhood
                            friend?</label>
                        <input type="text" id="question3" name="question3" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>