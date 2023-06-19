<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Treasurer Login | GNHS PTA Payment System Treasurer Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
</head>

<body class="bg-gradient-primary" style="background: url(&quot;assets/img/gate.jpg&quot;) center / cover no-repeat;opacity: 1;filter: blur(0px);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 col-xxl-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;assets/img/gnhs-admin.jpg&quot;) center / contain no-repeat;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Enter Treasurer Credentials</h4>
                                    </div>
                                    <form class="user" action="index.php" method="post">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="text" id="exampleInputText" aria-describedby="textHelp" placeholder="Enter Username..." name="username" required="">
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required="">
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit" name="login">Login</button>
                                        <hr><a class="btn btn-danger d-block btn-user w-100" role="button" href="index.php">Back to Homepage</a>
                                    </form>
                                </div>
                            </div>

                            <?php
                            if (isset($_POST['login'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $query = mysqli_query($cxn, "SELECT * FROM users WHERE username='$username' AND teacher_id='$password' AND access_level='Treasurer'");

                                if (mysqli_num_rows($query) > 0) {
                                    $row = mysqli_fetch_assoc($query);
                                    $_SESSION['first_name'] = $row['first_name'];
                                    $_SESSION['last_name'] = $row['last_name'];
                                    $_SESSION['lrn_id'] = $row['teacher_id'];
                                    $_SESSION['username'] = $row['username'];
                                    header("location: treas.php");
                                } else {
                                    echo '<script type="text/javascript"> alert("Invalid Credentials!")</script>';
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>