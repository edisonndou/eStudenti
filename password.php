<?php 
session_start();

include 'config.php';

if(isset($_GET['action'])) {
    if($_GET['action'] === "logout") {
        # delete sessions
        unset($_SESSION['user_email']);
        unset($_SESSION['is_logged_in']);
        session_destroy();

        # delete cookies
        setcookie("user_email", null, -1);
        setcookie("is_logged_in", null, -1);

        header("Location: login.php");
    }
}

// Change password
$sql = "SELECT t01.id, t01.password FROM users t01";
$result = $mysqli->query($sql);
$results = [];

if($result->num_rows) {
    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
} else {
    // echo "Table is empty!";
}

$user_email = $_COOKIE["user_email"];

if(count($_POST)>0) {
    $result = mysqli_query($mysqli,"SELECT * FROM users WHERE email='" . $user_email . "'");
    $row = mysqli_fetch_array($result);

    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    
    if(password_verify($currentPassword, $row['password'])) {
        mysqli_query($mysqli," UPDATE users SET password=' " . $newPassword . "' WHERE email='" . $user_email . "' ");
        $message = "Password Changed Sucessfully";
        $row['password']=password_hash($newPassword, PASSWORD_BCRYPT);
    } 
    else {
        $message = "Password is not correct";
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

    <title>E-Studenti - Profili</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'includes/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'includes/top-bar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid mt-3">
                    <div><?php if(isset($message)) { echo $message; } ?></div>
                    <form class="row card shadow" action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
                        <h4
                            class="m-0 font-weight-bold text-primary card-header d-flex flex-row align-items-center justify-content-between">
                            Ndrysho passwordin</h4>
                        <div class="col-sm-12 col-md-12 col-lg-12 py-5">
                            <div class="mb-3">
                                <label class="form-label text-primary"><b>Old Password</b></label>
                                <input type="text" class="form-control" name="currentPassword">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"><b>New Password</b></label>
                                <input type="text" class="form-control" name="newPassword">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"><b>Confirm Password</b></label>
                                <input type="text" class="form-control" name="confirmPassword">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Ndrysho</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <b>Edison Ndou</b></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>