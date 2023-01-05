<?php
session_start();

include "config.php";

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

if(isset ($_POST ['submit'])){
    $company_name=$_POST ['company_name'];
    $category=$_POST ['category_id'];
    $business=$_POST ['business'];
    $expiration_date=$_POST ['expiration_date'];
    $salary=$_POST ['salary'];
    $description=$_POST ['description'];
    $phone=$_POST ['phone'];
    $title=$_POST ['title'];
    $country=$_POST ['country'];
    $city=$_POST ['city'];

    $sql="INSERT INTO announcements (company_name, category, business , expiration_date , salary, description ,phone ,title ,country ,city) VALUES ('$company_name','$category','$business','$expiration_date','$salary', '$description' ,'$phone' ,'$title','$country','$city')";

    if($mysqli->query($sql)){
        header("Location:jobs.php");
    }else{
        echo $mysql->error; 
    }
}
// READ CATEGORIES
$sql = "SELECT * FROM `job_categories`";
$result = $mysqli->query($sql);
$job_categories = [];

if($result->num_rows) {
    while($job_category = $result->fetch_assoc()) {
        $job_categories[] = $job_category;
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

    <title>E-Studenti - Shto punë</title>

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
        <?php include './includes/sidebar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include './includes/top-bar.php'; ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Shto punë</h1>

                    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 row">
                                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                    <label for="validationDefault01" class="form-label">Titulli i Postimit</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="title"
                                        required>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                    <label for="validationDefault01" class="form-label">Emri i Kompanisë</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="company_name"
                                        required>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                    <label class="form-label">Kategoria</label>
                                    <?php if(count($job_categories)): ?>
                                    <select class="form-control" name="category_id" required>
                                        <option selected disabled></option>
                                        <?php foreach($job_categories as $job_category): ?>
                                        <option value="<?= $job_category['id']; ?>">
                                            <?= $job_category['category_name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                    <label for="validationDefault04" class="form-label">Orari i Punës</label>
                                    <select class="form-control" id="validationDefault04" name="business" required>
                                        <option selected disabled></option>
                                        <option value="Orar i plotë">Orar i plotë</option>
                                        <option value="Orar i pjesshëm">Orar i pjesshëm</option>
                                        <option value="Praktikë">Praktikë</option>
                                        <option value="Me marrëveshje">Me marrëveshje</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                    <label for="validationDefault02" class="form-label">Data e skadimit</label>
                                    <input type="date" class="form-control" id="validationDefault02"
                                        name="expiration_date" required>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                                    <label for="validationDefault02" class="form-label">Paga fillestare €</label>
                                    <input type="number" class="form-control" id="validationDefault02" name="salary"
                                        required>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <label class="form-label">Shteti</label>
                                    <select class="form-control" name="country" required>
                                        <option selected disabled></option>
                                        <option value="Kosovë">Kosovë</option>
                                        <option value="Shqipëri">Shqipëri</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <label class="form-label">Qyteti</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="city"
                                        required>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label for="validationDefault01" class="form-label">Numri i telefonit</label>
                                    <input type="tel" class="form-control" id="validationDefault01" name="phone"
                                        required>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <label class="form-label">Përshkrimi</label>
                                    <div class="form-floating">
                                        <textarea id="editor" name="description"></textarea>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <button class="btn btn-primary mt-3" name="submit" type="submit">Posto</button>
                                </div>
                            </div>
                    </form>

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

    <!-- Tiny Editor -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea#editor',
        });
    </script>

</body>

</html>