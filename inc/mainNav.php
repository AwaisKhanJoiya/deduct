<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href="#home"><img style="height: 80px;" src="assets/img/deduct-logo.png"
                alt="Deduct"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-lg-3" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-lg-3" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-lg-3" href="#pricing">Pricing</a>
                </li>
                <?php
                if (isset($_COOKIE["logged_in"])) {
                    echo '
                    
           <li class="nav-item">
                    <a class="nav-link me-lg-3" href="inc/logout.php">Logout</a>

                </li>
          
          </ul>
          <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
              data-bs-target="#feedbackModal">
              <span class="d-flex align-items-center">
                  <a href="admin/index.php" class="small btn-white">Dashboard</a>
              </span>
          </button>
          ';
                } else {
                    echo '
           <li class="nav-item">
                    <a class="nav-link me-lg-3" href="login.php">Login</a>

                </li>
            </ul>
            <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
                data-bs-target="#feedbackModal">
                <span class="d-flex align-items-center">
                    <a href="signup.php" class="small btn-white">Register Now</a>
                </span>
            </button>
          ';
                }
                ?>
        </div>
    </div>
</nav>