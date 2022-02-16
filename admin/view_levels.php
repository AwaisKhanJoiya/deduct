<?php
if (!isset($_COOKIE["logged_in"])) {
    header('location: ../index.php');
}
if ($_COOKIE["logged_in"] !== "admin") {
    header('location: index.php');
}
include('inc/header.php');
include('../inc/db.php');
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
                    <table class="w-100">
                        <thead>
                            <th>Level No.</th>
                            <th>Payment (Monthly)</th>
                            <th>Total Coverage</th>
                            <th>Edit</th>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM packages";
                        $result = mysqli_query($conn, $sql);
                        $level = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $monthly_payment = $row['monthly_payment'];
                            $coverage = $row['total_coverage'];
                            $id = $row['id'];
                            echo '
                        <tbody>
                            <td>' . $level . '</td>
                            <td>$' . $monthly_payment . '</td>
                            <td>$' . $coverage . '</td>
                            <td><a href="edit_level.php?id=' . $id . '">Edit Now</a></td>
                        </tbody>    
                            ';
                            $level++;
                        }
                        ?>

                    </table>

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