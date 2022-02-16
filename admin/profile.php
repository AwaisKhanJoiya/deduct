<?php
if (!isset($_COOKIE["logged_in"])) {
    header('location: ../index.php');
    session_start();
}
include('inc/header.php');
include('../inc/db.php');
?>

<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $phone_number = mysqli_real_escape_string($conn, $phone_number);
    $address = $_POST["address"];
    $address = mysqli_real_escape_string($conn, $address);
    $dob = $_POST["dob"];
    $dob = mysqli_real_escape_string($conn, $dob);
    $state = $_POST["state"];
    $state = mysqli_real_escape_string($conn, $state);
    $security_code = $_POST["security_code"];
    $security_code = mysqli_real_escape_string($conn, $security_code);
    $proxy_number = $_POST["proxy_number"];
    $proxy_number = mysqli_real_escape_string($conn, $proxy_number);
    $user_id = $_COOKIE["logged_in"];
    $sql = "UPDATE users SET `name` = '$name', `email` = '$email', `phone` = '$phone_number', `address` = '$address', `date` = '$dob', `state` = '$state', `security_code` = '$security_code', `proxy_number` = '$proxy_number' WHERE `user_id` = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "Account updated successfully";
    } else {
        $_SESSION["error"] = "Accound does not updated. Please try again";
    }
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('inc/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('inc/navbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Your Profile</h1>
                        <?php
                        if (isset($_SESSION["success"])) {
                            $success = $_SESSION["success"];
                            echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> ' . $success . '
                        </div>
                        ';
                            unset($_SESSION['success']);
                        }
                        if (isset($_SESSION["error"])) {
                            $error = $_SESSION["error"];
                            echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Failed!</strong> ' . $error . '
                        </div>
                        ';
                            unset($_SESSION['error']);
                        }
                        ?>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        $user_id = $_COOKIE['logged_in'];
                        $sql = "SELECT * FROM users WHERE `user_id` = '$user_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['name'];
                        $email = $row['email'];
                        ?>

                        <form class="user" method="POST" style="width: 90%;">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                    placeholder="Full Name" name="name" value="<?php echo $name ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address" name="email" value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Phone Number" name="phone_number">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Your Address" name="address">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Your Date of Birth" name="dob">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="State of Residence" name="state">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Enter Security Code Word" name="security_code">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Proxy Contact Number" name="proxy_number">
                            </div>
                            <input type="submit" value="Update" name="submit"
                                class="btn btn-primary btn-user btn-block">
                            <hr>

                        </form>
                    </div>

                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Deduct 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>