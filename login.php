<?php include('inc/db.php');
include('inc/c.php');
session_start();
?>
<?php
if (isset($_POST["signin"])) {
    $email = $_POST["email"];
    $password = $_POST["pass"];
    if ($email == $username && $password == $pass) {
        if (setcookie("logged_in", "admin", time() + (86400 * 10))) {
            header("location: admin/index.php");
        }
    } else {
        $sql = "SELECT * FROM users WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) != "0") {
                $row = mysqli_fetch_assoc($result);
                $hash = $row['password'];
                $id = $row['user_id'];
                if (password_verify($password, $hash)) {
                    // Set Login Cookie for 10 days

                    if (setcookie("logged_in", "$id", time() + (86400 * 10), "", "", false)) {
                        header("location: admin/index.php");
                    }
                } else {
                    $_SESSION["error"] = "Invalid Credentials";
                }
            } else {
                $_SESSION["error"] = "Invalid Credentials";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Deduct - Sign In</title>

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
                <div class="signin-content">
                    <div class="signin-image">
                        <figure>
                            <img src="images/signin-image.jpg" alt="sing up image" />
                        </figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
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
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
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