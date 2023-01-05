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

if(isset ($_POST ['submit'])){
    $course_name=$_POST ['course_name'];
    $course_description=$_POST ['course_description'];
    $category_id=$_POST ['category_id']; 
    $price=$_POST ['price'];
    $city=$_POST ['city'];
    $presence=$_POST ['presence'];

    $sql="INSERT INTO courses (course_name, course_description, category_id, price , city, presence ) VALUES ('$course_name','$course_description','$category_id','$price' ,'$city' ,'$presence')";

    if($mysqli->query($sql)){
        header("Location:courses.php");
    }else{
        echo $mysql->error; 
    }
}


// READ CATEGORIES
$sql = "SELECT * FROM `categories`";
$result = $mysqli->query($sql);
$categories = [];

if($result->num_rows) {
    while($category = $result->fetch_assoc()) {
        $categories[] = $category;
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

    <title>E-Studenti - Shto kurse</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Shto kurse</h1>
                    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                                <label class="form-label">Emri i Kursit</label>
                                <input type="text" class="form-control" name="course_name" required>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                                <label class="form-label">Lloji i Kursit </label>
                                <?php if(count($categories )): ?>
                                <select class="form-control" name="category_id">
                                    <option selected disabled>Kategoria</option>
                                    <?php foreach($categories as $category): ?>
                                    <option value="<?= $category['id']; ?>"><?= $category['cetogory_name']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                                <label class="form-label">Çmimi i Kursit</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                                <label class="form-label">Qyteti</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-12 col-lg-12">
                                <label class="form-label">Pjesëmarrja</label>
                                <select class="form-control" name="presence" required>
                                    <option value="Fizike">Fizike</option>
                                    <option value="Online">Online</option>
                                </select>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-12 col-lg-12">
                                <label class="form-label">Përshkrimi</label>
                                <div class="form-floating">
                                    <textarea id="editor" name="course_description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-12 col-lg-12">
                                <button class="btn btn-primary mt-3" name="submit" type="submit">Posto</button>
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