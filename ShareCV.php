<?php
include "config.php";
if(isset ($_POST ['submit'])){
    $name_surname=$_POST ['name_surname'];
    $age=$_POST ['age'];
    $city=$_POST ['city'];
    $advanced_in=$_POST ['advanced_in'];
    $experience=$_POST ['experience'];
    $cv=$_POST ['cv'];

    $sql="INSERT INTO students_cv (name_surname, age, city , advanced_in , experience, cv) VALUES ('$name_surname','$age','$city','$advanced_in','$experience', '$cv')";

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
    <title>eStudenti | CV </title>
</head>

<body class="bg-light fw-bold">

    <!-- nav -->
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
        <div class="row">
            
            <div class="col-sm-12 col-md-12 col-lg-6">
            <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label for="validationDefault01" class="form-label">Emri dhe Mbiemri</label>
                    <input type="text" class="form-control" id="validationDefault01" name="name_surname" required>
                </div>
                <div class="mb-3">
                    <label for="validationDefault04" class="form-label">Mosha</label>
                    <select class="form-select" id="validationDefault04" name="age" required>
                        <option selected disabled value="">Mosha juaj</option>
                        <option value="18-20 vjeçar/e">18-20 vjeçar/e</option>
                        <option value="20-22 vjeçar/e">20-22 vjeçar/e</option>
                        <option value="22-25 vjeçar/e">22-25 vjeçar/e</option>
                        <option value="25-30 vjeçar/e">25-30 vjeçar/e</option>
                        <option value="Më i/e moshuar">Më i/e moshuar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="validationDefault04" class="form-label">Qyteti</label>
                    <select class="form-select" id="validationDefault04" name="city" required>
                        <option selected disabled value="">Qyteti juaj</option>
                        <option value="Prishtinë">Prishtinë</option>
                        <option value="Prizren">Prizren</option>
                        <option value="Gjilan">Gjilan</option>
                        <option value="Ferizaj">Ferizaj</option>
                        <option value="Gjakovë">Gjakovë</option>
                        <option value="Pejë">Pejë</option>
                        <option value="Mitrovicë">Mitrovicë</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="validationDefault04" class="form-label">I Zhvilluar në</label>
                    <select class="form-select" id="validationDefault04" name="advanced_in" required>
                        <option selected disabled value="">Përcakto Degën</option>
                        <option value="Programim">Programim</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Assistent">Assistent</option>
                        <option value="Të Tjera">Të Tjera</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="validationDefault04" class="form-label">Përvoja</label>
                    <select class="form-select" id="validationDefault04" name="experience" required>
                        <option selected disabled value="">Përcakto</option>
                        <option value="0-1 Vit">0-1 Vit</option>
                        <option value="1-2 Vite">1-2 Vite</option>
                        <option value="2-3 Vite">2-3 Vite</option>
                        <option value="4-5 Vite">4-5 Vite</option>
                        <option value="5+ Vite">5+ Vite</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="validationDefault01" class="form-label">Posto CV tuaj! (.pdf)</label>
                    <input type="file" accept=".pdf" class="form-control" id="validationDefault01" name="cv" required>
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
        
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div><img
                        src="https://images.squarespace-cdn.com/content/v1/5ac64f5e8ab722b3d5dd16e6/1602268940724-VPO3JC25WTMECFEGH0B8/resume-icon.gif"
                        alt=""></div>
                    </form>
            </div>
        </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>