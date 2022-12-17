<!-- nav -->
<div style="min-height: 120px;" id="sidebar">
    <div class="collapse collapse-horizontal" id="collapseWidthExample">
        <div class="card card-body bg-light" style="width: 300px;">

            <nav class="nav flex-column bg-light">
                <!-- profile -->
                <img src="http://www.incontropordenone.it/wp-content/uploads/2014/07/studenti.png" class="pe-4" alt=""
                    style="width: 300px;">
                <div class="profile mt-5">
                    <img src="assets/person.png" alt="" style="width:30%;">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Admin
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        <a class="nav-link active mt-5 ps-2" aria-current="page" href="Home.php">Ballina</a>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed bg-light fw-bold shadow-none border-none" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true"
                        aria-controls="flush-collapseOne">
                        Kurse
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse bg-light"
                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a class="nav-link add_course fw-bold" href="AddCourses.php">Shto Kurse + </a>
                        <a class="nav-link" href="Courses.php">Shiko Kurset ! </a></div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed bg-light fw-bold shadow-none" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true"
                        aria-controls="flush-collapseTwo">
                        Punë
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse bg-light"
                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a class="nav-link add_course fw-bold" href="AddJob.php">Shto Punë +</a>
                        <a class="nav-link" href="Jobs.php">Shiko Punët !</a>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed bg-light fw-bold shadow-none" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true"
                        aria-controls="flush-collapseThree">
                        CV
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse bg-light"
                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a class="nav-link add_course" href="ShareCV.php">Posto CV +</a>
                        <a class="nav-link" href="StudentsCV.php">Shiko CV e Studentëve !</a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <!-- card -->
        <div class="card text-center bg-light" style="width: 18rem;">
            <i class="bi bi-exclamation-octagon"></i>
            <div class="card-body">
                <h5 class="card-title fw-bold">Lajmërim</h5>
                <!-- Button trigger modal -->
                <p class="card-text">Për kontaktime private klikoni butonin e mëposhtëm .</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Click Me!
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Kontakti</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Numri Personal : 045 548 747 <br>
                        Email : ndouedison02@gmail.com<br>
                        LinkedIn : edisonndou<br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </nav>

    </div>
</div>
</div>