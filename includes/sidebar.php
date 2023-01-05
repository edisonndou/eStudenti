<!-- Sidebar -->
<?php
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <div style="position: -webkit-sticky; position: sticky;top: 0;">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">e-Studenti</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-mask"></i>
                <span>Dashboard</span></a>
        </li>
        <?php if($_SESSION['role'] == 'Administrator') { ?>
        <li class="nav-item">
            <a class="nav-link" href="suggested.php">
                <i class="fas fa-fw fa-lock"></i>
                <span>Të sygjeruarat</span></a>
        </li>
        <?php } ?>
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Vizito
        </div>

        <li class="nav-item">
            <a class="nav-link" href="courses.php">
                <i class="fas fa-fw fa-book"></i>
                <span>Kurset</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="jobs.php">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Punët</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Veprimet e lejuara
        </div>

        <li class="nav-item">
            <a class="nav-link" href="add-courses.php">
                <i class="fas fa-fw fa-book"></i>
                <span>Shto Kurset</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="add-announcements.php">
                <i class="fas fa-fw fa-briefcase"></i>
                <span>Shto Punët</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-block">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </div>
</ul>