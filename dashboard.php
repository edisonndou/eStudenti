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

// READ COURSE
$sql = "SELECT t01.id, t01.course_name, t01.description, t01.price, t01.category ,t01.tel FROM suggested_course t01";
$result = $mysqli->query($sql);
$courses = [];

if($result->num_rows) {
    while($course = $result->fetch_assoc()) {
        $courses[] = $course;
    }
} else {
    // echo "Table is empty!";
}

// READ JOBS
$sql = "SELECT t01.id, t01.job_name, t01.description, t01.salary, t01.category ,t01.tel FROM suggested_jobs t01";
$result = $mysqli->query($sql);
$jobs = [];

if($result->num_rows) {
    while($job = $result->fetch_assoc()) {
        $jobs[] = $job;
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

    <title>E-Studenti - Dashboard</title>

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

                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    <?php if($_SESSION['role'] == 'Administrator') { ?>
                    <!-- USERS -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Gjithsej përdorues</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) FROM `users`");
                                                $row = $result->fetch_row();
                                                echo $row[0];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Courses -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Gjithsej kurse</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) FROM `courses`");
                                                $row = $result->fetch_row();
                                                echo $row[0];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Jobs -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Gjithsej
                                                pozita të hapura
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                $result = $mysqli->query("SELECT COUNT(*) FROM `announcements`");
                                                $row = $result->fetch_row();
                                                echo $row[0];
                                                ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Suggested -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Kurse të sygjeruara </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $result = $mysqli->query("SELECT COUNT(*) FROM `suggested_course`");
                                                $row = $result->fetch_row();
                                                echo $row[0];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Raporti regjistrimit sipas muajve</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="top_x_div" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header-->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistikë lidhur me kategoritë e
                                        kurseve</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?> 
                </div>
                <?php if($_SESSION['role'] == 'Users' OR $_SESSION['role'] =='Administrator') { ?>
                <div class="container-fluid">
                    <!-- Suggested Course -->
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kurset e Sygjeruara</h6>
                        </div>
                        <div class="row">
                        <?php if(count($courses )): ?>
                        <?php foreach($courses as $course): ?>
                        <div class="card-body col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?= $course['course_name']?></b></h5>
                                    <p class="dropdown-divider"></p>
                                    <p class="card-text">Kategoria : <b><?= $course['category']?></b></p>
                                    <p class="card-text">Çmimi : <b><?= $course['price'] .'€'?></b></p>
                                    <p class="card-text">Tel. : <b><?= $course['tel']?></b></p>
                                    <a href="suggested-courses.php?id=<?=$course['id'] ?>" class="btn btn-primary">Shiko pse</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                    <!-- Suggested Jobs -->
                    <div class="card shadow mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Punët e Sygjeruara</h6>
                        </div>
                        <div class="row">
                        <?php if(count($jobs )): ?>
                        <?php foreach($jobs as $job): ?>
                        <div class="card-body col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?= $job['job_name']?></b></h5>
                                    <p class="dropdown-divider"></p>
                                    <p class="card-text">Kategoria : <b><?= $job['category']?></b></p>
                                    <p class="card-text">Paga fillestare : <b><?= $job['salary'] .'€'?></b></p>
                                    <p class="card-text">Tel. : <b><?= $job['tel']?></b></p>
                                    <a href="suggested-job.php?id=<?=$job['id'] ?>" class="btn btn-primary">Shiko pse</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
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

    <!-- Google Charts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- Kategoria diagram -->
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['gjithsej', 'roli'], <?php $query = "SELECT t02.cetogory_name, COUNT(t02.cetogory_name) AS TotalCategory FROM courses t01 INNER JOIN categories t02 ON t01.category_id=t02.id GROUP BY t02.cetogory_name";
                $res = mysqli_query($mysqli, $query);
                while ($data = mysqli_fetch_array($res)) {
                    $cetogory_name = $data['cetogory_name'];
                    $TotalCategory = $data['TotalCategory']; ?> ['<?php echo $cetogory_name;?>', <?php echo $TotalCategory; ?> ], <?php  } ?>
            ]);

            var options = {
                pieSliceText: 'label',
                legend: 'none',
                legend: {
                    position: 'bottom',
                    alignment: 'start'
                },
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>

    <!-- // Raporti diagram -->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Muaji', 'Gjithësej'], <?php
                $query =
                "SELECT date_format(t01.created, '%M') AS Month, COUNT(id) AS Total FROM users t01 GROUP BY date_format(t01.created, '%M')";
                $res = mysqli_query($mysqli, $query);
                while ($data = mysqli_fetch_array($res)) {
                    $Month = $data['Month'];
                    $Total = $data['Total']; ?> ['<?php echo $Month;?>', <?php echo $Total; ?> ], <?php } ?>
            ]);

            var options = {
                legend: {
                    position: 'none'
                },
                bar: {
                    groupWidth: "100%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
</body>

</html>