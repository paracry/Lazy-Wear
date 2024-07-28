<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Questions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Security Questions</h1>
                <p class="text-danger">Please answer the following questions carefully. These answers will be used to
                    verify your identity in case you forget your password. If you forget your answers, you will not be
                    able to access your account.</p>
                <form action="save answer php.php" method="post">
                    <div class="mb-3">
                        <label for="question1" class="form-label">What is your favorite hobby?</label>
                        <input type="text" id="question1" name="question1" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="question2" class="form-label">What is the name of your favorite book?</label>
                        <input type="text" id="question2" name="question2" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="question3" class="form-label">What is the name of your favorite childhood
                            friend?</label>
                        <input type="text" id="question3" name="question3" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Answers</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>