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
// READ COURSE
$id = $_GET['id'];
$sql = "SELECT t01.id, t01.business, t01.expiration_date, t01.country, t01.created , t01.city, t01.company_name, t01.description, t01.category, t01.title, t01.salary FROM announcements t01 WHERE t01.id='$id'";
$result = $mysqli->query($sql);
$results = [];

if($result->num_rows) {
    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
} else {
    // echo "Table is empty!";
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

    <?php if(count($results )): ?>
    <?php foreach($results as $row): ?>
    <title>E-Studenti - <?= $row['title'] ?></title>
    <?php endforeach; ?>
    <?php endif; ?>

    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .card-body p img {
            width: 20% !important;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'includes/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'includes/top-bar.php'; ?>
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <?php if(count($results )): ?>
                            <?php foreach($results as $row): ?>
                            <div class="row border bg-white mb-2 p-3">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <h5 class="text-uppercase text-primary"><b><?= $row['title'] ?></h3></b>
                                        <h6>Kategoria : <b><?= $row['category'] ?></b></h6>
                                        <h6>Shteti : <b><?= $row['country'] ?></b></h6>
                                        <h6>Kompania : <b><?= $row['company_name'] ?></b></h6>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <h6>Data e Postimit : <b><?= $row['created'] ?></b></h6>
                                    <h6>Data e Skadimit : <b><?= $row['expiration_date'] ?></b></h6>
                                    <h6>Orari i Punës : <b><?= $row['business'] ?></b></h6>
                                    <h6>Qyteti : <b><?= $row['city'] ?></b></h6>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <hr>
                                    <h3 class="text-center text-uppercase">Përshkrimi</h3>
                                    <h6><b><?= $row['description'] ?></b></h6>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
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

</body>

</html>