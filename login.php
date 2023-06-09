<?php session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Login | GNHS PTA Online Payment System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" data-aos="fade" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">GNHS | PTA Online Payment System</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="index.php">home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">how to pay</a></li>
                </ul><a class="btn btn-primary" role="button" href="login.php">PAY NOW</a>
            </div>
        </div>
    </nav>
    <section>
        <div id="main-wrapper" class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-lg-6">
                                    <div class="login-card p-5">
                                        <div class="mb-3">
                                            <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                        </div>

                                        <h6 class="h5 mb-0">Hello there!</h6>
                                        <p class="text-muted mt-2 mb-3">Enter your email address and password to access
                                            student panel.</p>

                                        <form action="login.php" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="email" required autofocus>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                                            </div>
                                            <button type="submit" class="btn btn-theme" name="login">Log In</button>
                                        </form>

                                    </div>
                                </div>

                                <?php
                                    if(isset($_POST['login'])){
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                        $query = mysqli_query($cxn, "SELECT * FROM student WHERE email='$email' AND lrn_id='$password'");

                                        if(mysqli_num_rows($query)>0){
                                            $row = mysqli_fetch_assoc($query);
                                            $_SESSION['first_name'] = $row['first_name'];
                                            $_SESSION['last_name']= $row['last_name'];
                                            $_SESSION['lrn_id'] = $row['lrn_id'];
                                            $_SESSION['email'] = $row['email'];
                                            $_SESSION['id'] = $row['id'];
                                            header("location: student-portal.php");
                                        }
                                        else{
                                            echo '<script type="text/javascript"> alert("Invalid Credentials!")</script>';
                                        }
                                    }

                                ?>


                                <div class="col-lg-6 d-none d-lg-inline-block">
                                    <div class="account-block rounded-right">
                                        <div class="overlay rounded-right"></div>
                                        <div class="account-testimonial">
                                            <h4 class="text-white mb-4">Paying has never been this harder!</h4>
                                            <p class="lead text-white">"Best mode of payment I made for a long time. Can
                                                only recommend it for other users."</p>
                                            <p>- Anonymous</p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->


                    <!-- end row -->

                </div>
                <!-- end col -->
            </div>
            <!-- Row -->
        </div>
    </section>

    
    <?php
    
    ?>


    <footer class="visible">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5"><span class="copyright">©2023 GNHS PTA Online Payment System&nbsp;</span>
                </div>
                <div class="col-md-3 offset-md-4 offset-lg-3 offset-xl-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/Bootstrap-4---Payment-Form.js"></script>
</body>

</html>