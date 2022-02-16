<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-text mx-3">Deducts</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        View Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php
    if ($_COOKIE["logged_in"] == "admin") {

    ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Levels</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Levels:</h6>
                <a class="collapse-item" href="view_levels.php">View/Edit Levels</a>
                <a class="collapse-item" href="edit_level.php">Add New Level</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="view_requests.php">
            <i class="fas fa-user"></i>
            <span>View Requests</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="view_users.php">
            <i class="fas fa-user"></i>
            <span>View Users</span>
        </a>
    </li>
    <?php } else {
    ?>
    <li class="nav-item">
        <a class="nav-link" href="send_request.php">
            <i class="fas fa-user"></i>
            <span>Send Request</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="view_messages.php">
            <i class="fas fa-user"></i>
            <span>View Messages</span>
        </a>
    </li>

    <?php
    }
    ?>
    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>Upgrade</strong> your package to get more coverage!</p>
        <a class="btn btn-success btn-sm" href="../pricing.php">Upgrade now</a>
    </div>

</ul>