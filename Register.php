<?php 
session_start();
include "config.php";
function is_email($email) {
    if(preg_match("/[\w\.\_\-]+\@gmail.(com|net)/i", $email) == 0) 
        return false;

    return true;
}

$errors = [];

if(isset($_POST['register_btn'])) {
    $first_name = $mysqli->escape_string($_POST['first_name']);
    $last_name = $mysqli->escape_string($_POST['last_name']);
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string($_POST['password']);
    $confirm_password = $mysqli->escape_string($_POST['confirm_password']);

    if(isset($email) && !empty($email) && isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password) && !empty($first_name) && !empty($last_name) ) {
        if(is_email($email)) {
            if(strlen($password)>=8){
            if($password === $confirm_password) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $confirm_password = password_hash($confirm_password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `role_id`) VALUES ('$first_name', '$last_name', '$email', '$password', '2')";
                if($mysqli->query($sql)) {
                    $_SESSION['user_email'] = $email;
                    $_SESSION['is_logged_in'] = true;
                    setcookie("user_email", $_SESSION['user_email'], time()+120);
                    setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+120);
                    header("Location: dashboard.php");
                } else {
                    $errors[] = "Registration faild!";
                }
            } else {
                $errors[] = "Password and Confirm password doesn't match!";
            }
        }else{
            $errors[] = "Passwordi duhet të ketë 8 ose me shumë karaktere!";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Studenti - Reg</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"
                                style="background-image: url('https://images.unsplash.com/photo-1491841550275-ad7854e35ca6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80')">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Mirë se erdhët!</h1>
                                        <?php 
                                        if(count($errors)) {
                                        foreach($errors as $error) {
                                        echo "<div class='alert alert-danger' role='alert'>";
                                        echo "<ul class='mb-0'>";
                                        echo "<li>$error</li>";
                                        echo "</ul>";
                                        echo "</div>";
                                        }}            
                                    ?>
                                    </div>
                                    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                                        <div class="form-group">
                                            <label for="first_name" class="form-label">Emri</label>
                                            <input type="text" class="form-control form-control-user" name="first_name"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Shëno emrin...">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name" class="form-label">Mbiemri</label>
                                            <input type="text" class="form-control form-control-user" name="last_name"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Shëno mbiemrin...">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Emaili</label>
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Shëno emailin...">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Passwordi</label>
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="exampleInputPassword"
                                                placeholder="Sheno passwordin...">
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="form-label">Konfirmo</label>
                                            <input type="password" name="confirm_password"
                                                placeholder="Konfirmo passwordin..." class="form-control" require>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block"
                                            name="register_btn">Regjistrohu</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Posedoj llogari!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>