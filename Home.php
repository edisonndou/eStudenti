<?php
$pdo=new PDO('mysql:host=localhost; dbname=e-studenti; charset=utf8mb4' , 'root' , '' , []);
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
    <title>eStudenti | Ballina </title>
</head>

<body class="bg-light fw-bold">

    <?php include "includes/sidebar.php"; ?>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="mb-5 border-bottom">
                <p>
                    <!-- Menu -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWidthExample" aria-expanded="true"
                        aria-controls="collapseWidthExample">
                        <i class="bi bi-bar-chart-steps"></i>
                    </button>
                </p>
            </div>
            <!-- Dashboard -->
            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                <div class="card">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipOHQ9XOyrD31qSPhcOEWXHUtuqWPYOal-wCXjw=s680-w680-h510"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title d-block fw-bold">Përdorues :</h4>
                        <div class="d-block text-end mb-3">
                            <h5>lolo</h5>
                        </div>
                        <div class="d-grid gap-2">
                        <a href="ViewJobs.php" class="btn btn-primary fw-bold"><i class="bi bi-star-fill"></i>Sygjerimet!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                <div class="card">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipOHQ9XOyrD31qSPhcOEWXHUtuqWPYOal-wCXjw=s680-w680-h510"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title d-block fw-bold">Kurse :</h4>
                        <div class="d-block text-end mb-3">
                            <h5>lolo</h5>
                        </div>
                        <div class="d-grid gap-2">
                        <a href="ViewJobs.php" class="btn btn-primary text-uppercase fw-bold"><i class="bi bi-star-fill"></i> Shiko të sygjeruarat !</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                <div class="card">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipOHQ9XOyrD31qSPhcOEWXHUtuqWPYOal-wCXjw=s680-w680-h510"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title d-block fw-bold">Punë :</h4>
                        <div class="d-block text-end mb-3">
                            <h5>heiii</h5>
                        </div>
                        <div class="d-grid gap-2">
                        <a href="ViewJobs.php" class="btn btn-primary text-uppercase fw-bold"><i class="bi bi-star-fill"></i> Shiko të sygjeruarat !</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-3">
                <div class="card">
                    <img src="https://lh3.googleusercontent.com/p/AF1QipOHQ9XOyrD31qSPhcOEWXHUtuqWPYOal-wCXjw=s680-w680-h510"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title d-block fw-bold">CV :</h4>
                        <div class="d-block text-end mb-3">
                            <h5>lolo</h5>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="ViewJobs.php" class="btn btn-primary text-uppercase fw-bold"><i class="bi bi-star-fill"></i> Shiko të sygjeruarat !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- <?php $stm= $pdo->query('SELECT COUNT(t01.id) AS GjithsejPune  FROM add_jobs t01'); while($row=$stm->fetch()){?>
                <div class="col-lg-3 col-md-3 col-sm-12 border rounded"
                    style="background-color:#FFFFFF; color:#FE2E2E;">
                    <h4 class="fw-bold">Oferta Pune</h4>
                    <h1><?php echo $row
            ['GjithsejPune'];?></h1>
                </div>
                <?php } ?> -->