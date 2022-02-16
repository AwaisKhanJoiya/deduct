<?php
if (!isset($_COOKIE["logged_in"])) {
    header('location: ../index.php');
}

if ($_COOKIE["logged_in"] == "admin") {
    header('location: index.php');
}
include('inc/header.php');
include('../inc/db.php');


if (isset($_POST["submit"])) {
    $user_id = $_COOKIE['logged_in'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $subject = mysqli_real_escape_string($conn, $subject);
    $description = mysqli_real_escape_string($conn, $description);
    $sql = "INSERT INTO requests (`user_id`, `subject`,`description`) VALUES ($user_id, '$subject', '$description')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Request Submitted. We will solve your problem soon")</script>';
    } else {
        echo '<script>alert("We are facing some error. Please try later")</script>';
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
                    <h1>Write your Problem</h1>
                    <form class="user" method="POST" style="width: 90%;">

                        <div class="form-group">
                            <label for="monthly_payment">Subject</label>
                            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="coverage">Description</label>
                            <textarea class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Description" name="description" required></textarea>
                        </div>

                        <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-user btn-block">
                        <hr>

                    </form>

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