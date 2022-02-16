<?php
if (isset($_COOKIE["logged_in"])) {
    setcookie("logged_in", '', time() - 3600, '/deduct');
    header("location: ../index.php");
}