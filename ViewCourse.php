<?php
$pdo=new PDO('mysql:host=localhost; dbname=e-studenti; charset=utf8mb4' , 'root' , '' , []);
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>eStudenti | Kurset </title>
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
            <div class="row">
                <?php $stm= $pdo->query("SELECT * FROM add_courses WHERE id=".$_GET['id']); while($row=$stm->fetch()){?>
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <h2 class="fw-bold text-underline" style="text-decoration : underline ;">
                        <?php echo $row['course_name']; ?></h2>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 bg-primary bg-opacity-50 text-center pt-2">
                    <h5 class="fw-bold">Cmimi :
                        <?php echo $row['price'] . '€'; ?></h5>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 bg-primary bg-opacity-50 text-center pt-2">
                    <h5 class="fw-bold">Qyteti :
                        <?php echo $row['city'] ;?></h5>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h4 class="fw-bold">Përshkrimi : </h4>
                    <h5><?php echo $row['description']; ?></h5>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h5 class="fw-bold">Kategoria :
                        <?php echo $row['course_for']; ?></h5>
                </div>

                <?php } ?>

                <!-- accordation -->
                <div class="accordion mt-5" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button shadow-none fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Syllabusi
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li>
                                        HTML
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                    crossorigin="anonymous">
                </script>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>

</html>