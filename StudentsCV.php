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
  <title>eStudenti | CV </title>
</head>

<body class="bg-light fw-bold">
  <?php include "includes/sidebar.php"; ?>
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="mb-5 border-bottom">
          <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseWidthExample" aria-expanded="true" aria-controls="collapseWidthExample">
              <i class="bi bi-bar-chart-steps"></i>
            </button>
          </p>
        </div>
      </div>
      <div class="row">
        <?php $stm= $pdo->query('SELECT * FROM students_cv'); while($row=$stm->fetch()){?>
        <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title d-block fw-bold"><?php echo $row['name_surname']; ?></h3>
              <div class="d-block mb-3">
                <h5><?php echo 'Mosha '.$row['age'];?></h5>
                <h5>Eksperienca :<?php echo $row['advanced_in']; ?></h5>
                <h5>Përvoja :<?php echo $row['experience']; ?></h5>
              </div>
              <div class="d-grid gap-2">
                <a href="ViewCV.php?id=<?php echo $row['id']; ?>" class="btn btn-primary text-uppercase fw-bold">Shiko
                  Më Shumë</a>
                <a href="?id=<?php echo $row['id']; ?>" class="btn btn-warning text-uppercase fw-bold">Regjistro</a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>