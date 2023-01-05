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
$user_name = $_COOKIE['user_email'];
$sql = "SELECT * FROM `users` WHERE email='$user_name'";
$result = $mysqli->query($sql);
$results = [];

if($result->num_rows) {
 while($row = $result->fetch_assoc()) {
 $results[] = $row;
}
} else {
// echo "Table is empty!";
}

//UPDATE
if(isset ($_POST ['update'])){
    $sql="UPDATE users SET first_name='" . $_POST['first_name'] . "', last_name= '" . $_POST['last_name'] . "' WHERE email='" . $_COOKIE['user_email'] . "'";

    if($mysqli->query($sql)){
        header("Location:profile.php");
    }else{
        echo $mysql->error; 
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

    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <?php include 'includes/sidebar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include 'includes/top-bar.php'; ?>

                <div class="container-fluid">
                    <?php if(count($results )): ?>
                    <?php foreach($results as $row): ?>

                    <form class="row card shadow" action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
                        <h4
                            class="m-0 font-weight-bold text-primary card-header d-flex flex-row align-items-center justify-content-between">
                            Ndrysho të dhënat personale</h4>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="mb-3 mt-2">
                                <label class="form-label text-primary"><b>Emri</b></label>
                                <input type="text" class="form-control" value="<?= $row['first_name'] ?>"
                                    name="first_name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"><b>Mbiemri</b></label>
                                <input type="text" class="form-control" value="<?= $row['last_name'] ?>"
                                    name="last_name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary"><b>Email</b></label>
                                <input type="text" class="form-control" value="<?= $row['email'] ?>" name="email"
                                    disabled>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" name="update" type="submit">Ndrysho</button>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>

                    <?php endif; ?>

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

    <!-- Tiny Editor -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
        });
    </script>

</body>

</html>