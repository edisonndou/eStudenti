<?php 
session_start();
include "config.php";
function is_email($email) {
    if(preg_match("/[\w\.\_\-]+\@gmail.(com|net)/i", $email) == 0) 
        return false;
    return true;
}

$errors = [];

if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if( isset($email) && !empty($email) && isset($password) && !empty($password) ) {
        if(is_email($email)) {
            $sql = "SELECT * FROM users t01 INNER JOIN roles t02 ON t01.role_id=t02.id WHERE email='$email'";
            if($result = $mysqli->query($sql)) {
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if(password_verify($password, $row['password'])) {
                        $_SESSION['user_email'] = $email;
                        $_SESSION['is_logged_in'] = true;
                        $_SESSION['role'] = $row['role_name'];
                        setcookie("user_email", $_SESSION['user_email'], time()+12000);
                        setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+12000);
    
                        header("Location: dashboard.php");
                    } else {
                        $errors[] = "Password is incorrect!";
                    }
                } else {
                    $errors[] = "User doesn't exist!";
                }
            } else {
                $errors[] = "Login failed!";
            }
        } else {
            $errors[] = "Email is not valid!";
        }
    } else {
        $errors[] = "All fields are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Studenti - Login</title>

    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <?php
                    if(count($errors)) {
                ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors as $error): ?>
                        <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php   
                    }
                ?>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"
                                style="background-image: url('https://images.unsplash.com/photo-1491841550275-ad7854e35ca6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80')">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Kyçuni në llogarinë tuaj!</h1>
                                    </div>
                                    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Shëno emailin...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="exampleInputPassword"
                                                placeholder="Shëno passwordin...">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Me mbaj
                                                    mend</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block"
                                            name="login_btn">Kyçu</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Keni harruar fjalëkalimin?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Regjistrohuni!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>