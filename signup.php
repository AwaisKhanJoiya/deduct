<?php include('inc/db.php');
session_start();
?>
<?php
if (isset($_POST["signup"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $c_pass = $_POST["re_pass"];
  $name = mysqli_real_escape_string($conn, $name);
  $email = mysqli_real_escape_string($conn, $email);

  $agree_term = $_POST["agree-term"];

  if ($agree_term == true) {


    $sql = "SELECT * FROM users WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      if (mysqli_num_rows($result) != '0') {
        $_SESSION["error"] = "Account already exists";
      } else {
        if ($pass === $c_pass) {
          $pass = password_hash($pass, PASSWORD_DEFAULT);
          $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            $_SESSION["success"] = "Account has been created successfully. Please login now";
            header("location: login.php");
          } else {
            $_SESSION["error"] = "Account do not created please try again";
          }
        } else {
          $_SESSION["error"] = "Passwords do not match";
        }
      }
    }
  } else {
    $_SESSION["error"] = "Please check terms agreement";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Deduct - Sign up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link href="css/styles.css" rel="stylesheet" />

</head>

<body>
    <?php include('inc/navbar.php') ?>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php
            if (isset($_SESSION["error"])) {
              $error = $_SESSION["error"];
              echo '
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Failed!</strong> ' . $error . '
                      </div>    
                  ';
              unset($_SESSION['error']);
            }
            ?>

                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"
                                    required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in
                                    <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure>
                            <img src="images/signup-image.jpg" alt="sing up image" />
                        </figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>