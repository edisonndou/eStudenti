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
$sql = "SELECT t01.id, t01.business, t01.expiration_date, t01.business, t01.country, t01.created , t01.city, t01.company_name, t01.description, t01.category, t01.title, t01.salary FROM announcements t01";
$result = $mysqli->query($sql);
$results = [];

if($result->num_rows) {
    while($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
} else {
    // echo "Table is empty!";
}

// DELETE
if(isset($_GET['id'])) {
    $sql = "DELETE FROM `announcements` WHERE `id`=".$_GET['id'];
    
    if($mysqli->query($sql)) {
         header("Location: jobs.php?status=1");
    } else {
         header("Location: jobs.php?status=0");
            //echo "Error: " .$mysqli->error;
    }
}
// Read sorts
$sql = "SELECT DISTINCT t01.country FROM announcements t01";
$result = $mysqli->query($sql);
$countries = [];

if($result->num_rows) {
    while($country = $result->fetch_assoc()) {
        $countries[] = $country;
    }
} else {
    // echo "Table is empty!";
}
$sql = "SELECT DISTINCT t01.city FROM announcements t01";
$result = $mysqli->query($sql);
$cities = [];

if($result->num_rows) {
    while($city = $result->fetch_assoc()) {
        $cities[] = $city;
    }
} else {
    // echo "Table is empty!";
}
$sql = "SELECT DISTINCT t01.category FROM announcements t01";
$result = $mysqli->query($sql);
$categories = [];

if($result->num_rows) {
    while($category = $result->fetch_assoc()) {
        $categories[] = $category;
    }
} else {
    // echo "Table is empty!";
}
$sql = "SELECT DISTINCT t01.company_name FROM announcements t01";
$result = $mysqli->query($sql);
$companies = [];

if($result->num_rows) {
    while($company = $result->fetch_assoc()) {
        $companies[] = $company;
    }
} else {
    // echo "Table is empty!";
}
$sql = "SELECT DISTINCT t01.business FROM announcements t01";
$result = $mysqli->query($sql);
$businesses = [];

if($result->num_rows) {
    while($business = $result->fetch_assoc()) {
        $businesses[] = $business;
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

    <title>E-Studenti - Shpalljet e Punës</title>

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

                    <?php if(isset($_GET['status'])): ?>
                    <?php if($_GET['status'] == 1): ?>
                    <p class="bg-primary text-white fw-bold text-center p-3 rounded">
                        <strong>Notice:</strong> User was deleted successfully.
                        <a href="?action=close" class="text-white">Close</a>
                    </p>
                    <?php else: ?>
                    <p>
                        <strong>Error:</strong> Something want wrong!
                    </p>
                    <?php endif; ?>
                    <?php endif ?>

                </div>
                <div class="container-fluid">
                    <input type="text" class="form-control mb-3" id="myInput" onkeyup="myFunction()"
                        placeholder="Kërko punë...">
                    <form>
                        <ul id="myUL" class="col-sm-12 col-md-12 col-lg-12">
                            <?php if(count($results )){ ?>
                            <?php foreach($results as $row): ?>
                            <li class="row border bg-white mb-2 p-3">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <a href="view-job.php?id=<?= $row['id'] ?>" class="text-uppercase">
                                        <h5><b><?= $row['title'] ?></h3></b>
                                    </a>
                                    <h6>Kategoria : <b><?= $row['category'] ?></b></h6>
                                    <h6>Shteti : <b><?= $row['country'] ?></b></h6>
                                    <h6>Kompania : <b><?= $row['company_name'] ?></b></h6>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <br>
                                    <h6>Qyteti : <b><?= $row['city'] ?></b></h6>
                                    <h6>Orari i Punës : <b><?= $row['business'] ?></b></h6>
                                    <h6>Data e Skadimit : <b><?= $row['expiration_date'] ?></b></h6>
                                </div>
                                <?php if($_SESSION['role'] == 'Administrator') { ?>
                                <a href="?id=<?= $row['id'] ?>" class="btn btn-danger text-end">Delete</a>
                                <?php } ?>
                            </li>
                            <?php endforeach; ?>
                            <?php } else { 
                                    echo "Nuk ka asnjë të dhënë !";
                                } ?>
                        </ul>
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

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>