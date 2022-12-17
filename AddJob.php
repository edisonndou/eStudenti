<?php
include "config.php";
if(isset ($_POST ['submit'])){
    $name_surname=$_POST ['name_surname'];
    $company_name=$_POST ['company_name'];
    $free_position=$_POST ['free_position'];
    $description=$_POST ['description'];
    $salary=$_POST ['salary'];
    $city=$_POST ['city'];
    $category=$_POST ['category'];

    $sql="INSERT INTO add_jobs (name_surname, company_name, free_position , description , salary, city , category) VALUES ('$name_surname','$company_name','$free_position','$description','$salary', '$city' , '$category')";

    if($mysqli->query($sql)){
        header("Location:AddJob.php");
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
    <title>eStudenti | Shto Punë </title>
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
        <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="mb-3">
                        <label for="validationDefault01" class="form-label">Emri dhe Mbiemri Postuesit</label>
                        <input type="text" class="form-control" id="validationDefault01" name="name_surname" required>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault02" class="form-label">Emri i Kompanisë</label>
                        <input type="text" class="form-control" id="validationDefault02" name="company_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault02" class="form-label">Pozita të lira </label>
                        <input type="number" class="form-control" id="validationDefault02" name="free_position"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault02" class="form-label">Përshkrimi</label>
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                                name="description" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault04" class="form-label">Paga Fillestare</label>
                        <select class="form-select" id="validationDefault04" name="salary" required>
                            <option selected disabled>Përcakto Pagën</option>
                            <option value="300-400 €">300-400 €</option>
                            <option value="400-500 €">400-500 €</option>
                            <option value="500-600 €">500-600 €</option>
                            <option value="Sipas Marrëveshjes">Sipas Marrëveshjes</option>
                            <option value="Sipas Përvojës">Sipas Përvojës</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault04" class="form-label">Kategoria</label>
                        <select class="form-select" id="validationDefault04" name="category" required>
                            <option selected disabled>Përcakto Kategorinë</option>
                            <option value="Programim">Programim</option>
                            <option value="Freelancer">Freelancer</option>
                            <option value="Assistent">Assistent</option>
                            <option value="Të Tjera">Të Tjera</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="validationDefault04" class="form-label">Qyteti</label>
                        <select class="form-select" id="validationDefault04" name="city" required>
                            <option selected disabled>Qyteti juaj</option>
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
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="gif mt-5"><img
                    src="https://i.pinimg.com/originals/01/32/31/01323190cd6933de96287a5804fd636a.gif" alt=""></div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>