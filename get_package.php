<?php
if (!isset($_COOKIE["logged_in"])) {
    header('location: login.php');
}
if ($_COOKIE["logged_in"] == "admin") {
    header('location: index.php');
}
if (isset($_GET["package_level"])) {
    include('inc/db.php');
    include('config.php');
    $package_level = $_GET['package_level'];
    $package_id = $_GET['package_id'];
    $user_id = $_COOKIE['logged_in'];
    $query = "SELECT * FROM users WHERE `user_id` = $user_id";
    $rslt = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($rslt);
    $email = $row['email'];
    $sql = "SELECT * FROM packages WHERE `id` = $package_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $monthly_payment = $row['monthly_payment'];
        $total_coverage = $row['total_coverage'];


?>
<?php include('inc/db.php');
        include('inc/c.php');
        session_start();
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Deduct - Buy Package</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />

    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    /> -->
    <!-- Main css -->
    <link href="css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php include('inc/navbar.php') ?>

    <div class="main">
        <section class="sign-in">
            <div class="container">
                <h1>You are going to buy that package</h1>
                <div class="package_detail">
                    <p>Level: <?php echo $package_level ?></p>
                    <p>Monthly Payment: $<?php echo $monthly_payment ?></p>
                    <p>Total Coverage: $<?php echo $total_coverage ?></p>
                    <form action="inc/buy_package.php" method="POST">
                        <input type="hidden" value="<?php echo $monthly_payment ?>" name="monthly_payment">
                        <input type="hidden" value="<?php echo $package_level ?>" name="package_level">
                        <input type="hidden" value="<?php echo $package_id ?>" name="package_id">
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?php echo $published_key ?>"
                            data-amount="<?php echo str_replace(",", "", $monthly_payment) * 100 ?>"
                            data-name="level <?php echo $package_level ?>" data-currency="usd"
                            data-email="<?php echo $email ?>">
                        </script>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php }
} else {
    header('location: index.php');
}
?>