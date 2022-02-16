<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <?php
        if ($_COOKIE["logged_in"] !== "admin") {
            $user_id = $_COOKIE["logged_in"];
            $sql = "SELECT * FROM messages WHERE `user_id` = $user_id LIMIT 3";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $message_id = $row['message_id'];
                    $subject = $row['subject'];
                    $description = $row['description'];

        ?>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alert Messages
                </h6>
                <a class="dropdown-item d-flex align-items-center"
                    href="view_message.php?message_id=<?php echo $message_id ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-bold"><?php echo $subject ?></span>
                    </div>
                </a>

                <a class="dropdown-item text-center small text-gray-500" href="view_messages.php">Show All Alerts</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>
        <?php    }
            }
        } ?>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php
                if (isset($_COOKIE["logged_in"])) {
                    $user_id = $_COOKIE["logged_in"];
                    if ($user_id == 'admin') {
                        echo '
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                    ';
                    } else {
                        $sql = "SELECT * FROM users WHERE `user_id` = '$user_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        echo '
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $name . '</span>
                    ';
                    }
                }
                ?>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php
                if ($_COOKIE["logged_in"] !== "admin") {
                    echo '
                        <a class="dropdown-item" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        ';
                }
                ?>
                <a class="dropdown-item" href="../inc/logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>