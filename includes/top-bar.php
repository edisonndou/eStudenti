<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <?php
           // READ USERS
           $user_name = $_COOKIE['user_email'];
           $sql = "SELECT * FROM `users` WHERE email='$user_name'";
           $result = $mysqli->query($sql);
           $topBars = [];
    
        if($result->num_rows) {
        while($topBar = $result->fetch_assoc()) {
        $topBars[] = $topBar;
        }
        } else {
        // echo "Table is empty!";
        }

        ?>
        <!-- Nav Item - User Information -->
        <?php if(count($topBars )): ?>
        <li class="nav-item dropdown no-arrow">
            <?php foreach($topBars as $topBar): ?>
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $topBar['first_name'] ?>
                    <?= $topBar['last_name'] ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profili
                </a>
                <a class="dropdown-item" href="password.php">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                    Fjalëkalimi
                </a>
                <div class="dropdown-divider"></div>
                <?php if(isset($_COOKIE['user_email'])) {
                    echo '<a class="dropdown-item" href="?action=logout"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Shkyqu</a>';
                    }?>
                </a>
            </div>
            <?php endforeach; ?>
        </li>
        <?php endif; ?>
    </ul>
</nav>