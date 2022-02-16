<?php
require('../config.php');
require('db.php');

if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);
    $token = $_POST['stripeToken'];
    $user_id = $_COOKIE['logged_in'];
    $monthly_payment = $_POST["monthly_payment"];
    $package_level = $_POST["package_level"];
    $package_id = $_POST["package_id"];
    $data = \Stripe\Charge::create(array(
        "amount" => str_replace(",", "", $monthly_payment) * 100,
        "currency" => "usd",
        "source" => $token,
    ));
    if ($data) {
        $query = "SELECT * FROM users WHERE `user_id` = $user_id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $user_package_id = $row['package_id'];
        $sql = "SELECT * FROM packages WHERE `id` = $user_package_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > '0') {
            $row = mysqli_fetch_assoc($result);
            $old_deductable = $row['total_coverage'];
        } else {
            $old_deductable = 0;
        }
        $sql = "UPDATE users SET `old_deductable` = '$old_deductable', `package_id` = $package_id, `package_level` = $package_level WHERE `user_id` = $user_id";
        $result = mysqli_query($conn, $sql);
        header('location: ../admin/index.php');
    }
}