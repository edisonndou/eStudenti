<?php
include "config.php";
if(isset ($_POST ['submit'])){
    $name_surname=$_POST ['name_surname'];
    $course_name=$_POST ['course_name'];
    $price=$_POST ['price'];
    $description=$_POST ['description'];
    $course_for=$_POST ['course_for'];
    $city=$_POST ['city'];

    $sql="INSERT INTO add_courses (name_surname, course_name, price , description , course_for, city) VALUES ('$name_surname','$course_name','$price','$description','$course_for', '$city')";

    if($mysqli->query($sql)){
        header("Location:AddCourses.php");
    }else{
        echo $mysql->error; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>eStudenti | Shto Kurse </title>
</head>

<body class="bg-light fw-bold">

    <?php include "includes/sidebar.php"; ?>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="mb-5 border-bottom">
                    <p>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseWidthExample" aria-expanded="true"
                            aria-controls="collapseWidthExample">
                            <i class="bi bi-bar-chart-steps"></i>
                        </button>
                    </p>
                </div>
            </div>
        </div>

        <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="mb-3">
                        <label for="validationDefault01" class="form-label">Emri dhe Mbiemri Postuesit</label>
                        <input type="text" class="form-control" id="validationDefault01" name="name_surname" required>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault02" class="form-label">Emri i Kursit</label>
                        <input type="text" class="form-control" id="validationDefault02" name="course_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault02" class="form-label" name="name">Cmimi i Kursit në €</label>
                        <input type="number" class="form-control" id="validationDefault02" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault02" class="form-label">Përshkrimi</label>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                                name="description" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault04" class="form-label">Lloji i Kursit </label>
                        <select class="form-select" id="validationDefault04" name="course_for" required>
                            <option selected disabled value="">Kurs për</option>
                            <option>Web Developer</option>
                            <option>Gjuhë Të Huaja</option>
                            <option>Matematikë</option>
                            <option>Të tjera</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault04" class="form-label">Qyteti</label>
                        <select class="form-select" id="validationDefault04" name="city" required>
                            <option selected disabled value="">Qyteti juaj</option>
                            <option>Prishtinë</option>
                            <option>Prizren</option>
                            <option>Gjilan</option>
                            <option>Ferizaj</option>
                            <option>Gjakovë</option>
                            <option>Pejë</option>
                            <option>Mitrovicë</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                                Agree to terms and conditions
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary mt-3" name="submit" type="submit">Submit form</button>
                    </div>
                </div>
        </form>

        <div class="col-sm-6 col-md-12 col-lg-6 mt-5">
            <div class="gif"><img
                    src="https://www.careerguide.com/career/wp-content/uploads/2021/07/OnlineInstruction.gif" alt="">
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>