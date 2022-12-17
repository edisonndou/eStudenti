<?php 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | e-commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body class="bg-light">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <img src="http://www.incontropordenone.it/wp-content/uploads/2014/07/studenti.png" alt="">

                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="username" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                    <a href="login.php" class="btn btn-sm btn-link">Login</a>
                </form>
            </div>
        </div>
    </div>
    <style scoped>
        img {
            width: 100%;
        }
    </style>
</body>

</html>