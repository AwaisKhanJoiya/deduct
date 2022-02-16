<?php
    $db_name = "deduct";
    $username = "root";
    $password = "";
    $host = "localhost";

    $conn = mysqli_connect($host, $username, $password, $db_name);
    if(!$conn){
        echo "Connecion Failed with Database";
    }
?>