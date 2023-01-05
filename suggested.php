<?php 
session_start();

include 'config.php';

if(isset($_COOKIE['is_logged_in'])) {
} else {
    header("Location: login.php");
}

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
if(isset ($_POST ['submit_course'])){
    $course_name=$_POST ['course_name'];
    $price=$_POST ['price'];
    $description=$_POST ['description']; 
    $category=$_POST ['category'];
    $tel=$_POST ['tel'];  

    $sql="INSERT INTO suggested_course (course_name, price, description, category ,tel) VALUES ('$course_name','$price','$description', '$category' ,'$tel')";

    if($mysqli->query($sql)){
        header("Location:dashboard.php");
    }else{
        echo $mysql->error; 
    }
}

if(isset ($_POST ['submit_job'])){
    $job_name=$_POST ['job_name'];
    $salary=$_POST ['salary'];
    $description=$_POST ['description']; 
    $category=$_POST ['category']; 
    $tel=$_POST ['tel'];  

    $sql="INSERT INTO suggested_jobs (job_name, salary, description, category, tel) VALUES ('$job_name','$salary','$description' ,'$category','$tel')";

    if($mysqli->query($sql)){
        header("Location:dashboard.php");
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

    <title>E-Studenti - Sygjerimet</title>

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

                    <h1 class="h3 mb-4 text-gray-800">Sygjerimet</h1>

                    <!-- Suggested Courses -->
                    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1"
                                role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Kurset</a>
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse show " id="multiCollapseExample1">
                                    <div class="card card-body mb-3">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Emri i Kursit</label>
                                                            <input type="text" class="form-control" name="course_name"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Kategoria</label>
                                                            <input type="text" class="form-control" name="category"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Çmimi i Kursit</label>
                                                            <input type="number" class="form-control" name="price"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Numri tel.</label>
                                                            <input type="text" class="form-control" name="tel"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Përshkrimi</label>
                                                            <div class="form-floating">
                                                                <textarea id="editor" name="description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <button class="btn btn-primary" type="submit"
                                                                name="submit_course">Ruaj</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Suggested Jobs -->
                    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">

                        <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                data-target="#multiCollapseExample2" aria-expanded="false"
                                aria-controls="multiCollapseExample2">Punët</button>
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse show" id="multiCollapseExample2">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Emri i Kompanisë</label>
                                                            <input type="text" class="form-control" name="job_name"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Rroga fillestare</label>
                                                            <input type="number" class="form-control" name="salary"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Numri tel.</label>
                                                            <input type="text" class="form-control" name="tel"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Kategoria</label>
                                                            <input type="text" class="form-control" name="category"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Përshkrimi</label>
                                                            <div class="form-floating">
                                                                <textarea id="editor" name="description"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <button class="btn btn-primary"
                                                                name="submit_job">Ruaj</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <b>Edison Ndou</b></span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Tiny Editor -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
        });
    </script>

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