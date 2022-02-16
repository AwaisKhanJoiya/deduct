<?php
if (!isset($_COOKIE["logged_in"])) {
    header('location: ../index.php');
}

if ($_COOKIE["logged_in"] !== "admin") {
    header('location: index.php');
}
include('inc/header.php');
include('../inc/db.php');


if (isset($_POST["submit"])) {
    $monthly_payment = $_POST['monthly_payment'];
    $total_coverage = $_POST['total_coverage'];
    if ($_POST['submit'] == "Update") {
        $id = $_GET["id"];
        $sql = "UPDATE packages SET `monthly_payment` = '$monthly_payment', `total_coverage` = '$total_coverage' WHERE `id` = '$id'";
    } else {
        $sql = "INSERT INTO packages (`monthly_payment`, `total_coverage`) VALUES ('$monthly_payment', '$total_coverage')";
    }
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location: view_levels.php');
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
                    <h1>Enter Amount in USD</h1>
                    <form class="user" method="POST" style="width: 90%;">
                        <?php
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                            $sql = "SELECT * FROM packages WHERE `id` = '$id'";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $monthly_payment = $row['monthly_payment'];
                                $total_coverage = $row['total_coverage'];

                        ?>
                        <div class="form-group">
                            <label for="monthly_payment">Monthly Payment</label>
                            <input type="number" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Payment (Monthly)" name="monthly_payment"
                                value="<?php echo $monthly_payment ?>" step=".01" required>
                        </div>
                        <div class="form-group">
                            <label for="coverage">Total Coverage</label>
                            <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Total Coverage" name="total_coverage" value="<?php echo $total_coverage ?>"
                                step=".01" required>
                        </div>

                        <input type="submit" value="Update" name="submit" class="btn btn-primary btn-user btn-block">
                        <?php
                            }
                        } else {
                            ?>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Payment (Monthly)" name="monthly_payment" step=".01" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Total Coverage" name="total_coverage" step=".01" required>
                        </div>

                        <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-user btn-block">


                        <?php
                        }
                        ?>
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