<?php
session_start();
include 'db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register Student | GNHS PTA Payment System - Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container d-flex flex-column p-0"><a class="navbar-brand text-break d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-start">GNHS PTA&nbsp;<br>Payment System<br>Admin dashboard</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link " href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Overview</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php"><i class="fas fa-search"></i><span>Search</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="addnewstudent.php"><i class="fas fa-user"></i><span>Add New Student</span></a><a class="nav-link" href="addnewuser.php"><i class="fas fa-user"></i><span>Add New User</span></a><a class="nav-link" href="viewstudents.php"><i class="fas fa-users"></i><span>Registered Students</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewusers.php"><i class="fas fa-user-tie"></i><span>System Users</span></a>
                        <a class="nav-link" href="payments.php"><i class="fas fa-money-bill"></i><span>Payment History</span></a>
                        <a class="nav-link" href="printData.php"><i class="fas fa-print"></i><span>Generate Report</span></a>
                    </li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Hello,
                                            <?php echo $_SESSION['first_name']; ?>!
                                        </span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar5.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                            &nbsp;Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-lg-12 col-xl-12 col-xxl-12">
                            <div class="p-5">
                                <h1 class="text-dark mb-4"><strong>Add New Student</strong></h1>
                                <form class="user" action="addnewstudent.php" method="post" id="addstudent">
                                    <div class="row mb-3">
                                        <div class="col-sm-6 col-xl-6 col-xxl-4 mb-3 mb-sm-0">
                                            <label>Learners Reference No.</label>
                                            <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Enter Learners Reference Number" name="lrn" required="" autofocus="" style="height: 50px; border-radius: 10px; padding: 10px;">
                                        </div>
                                        <div class="col-sm-6 col-xxl-4">
                                            <label>E-mail Address</label>
                                            <input class="form-control form-control-user" type="email" id="exampleLastName" placeholder="Enter E-mail Address" name="email" required="" style="height: 50px; border-radius: 10px; padding: 10px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 col-xxl-4 mb-3 mb-sm-0">
                                            <label>First Name</label>
                                            <input class="form-control form-control-user" type="text" id="exampleFirstName-1" placeholder="Enter First Name" name="first_name" required="" style="height: 50px; border-radius: 10px; padding: 10px;">
                                        </div>
                                        <div class="col-sm-6 col-xxl-4">
                                            <label>Last Name</label>
                                            <input class="form-control form-control-user" type="text" id="exampleLastName-5" placeholder="Enter Last Name" name="last_name" required="" style="height: 50px; border-radius: 10px; padding: 10px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 col-xxl-4 mb-3 mb-sm-0">
                                            <label>Address</label>
                                            <input class="form-control form-control-user" type="text" id="exampleFirstName-1" placeholder="Enter Address" name="address" required="" style="height: 50px; border-radius: 10px; padding: 10px;">
                                        </div>
                                        <div class="col-sm-6 col-xxl-4">
                                            <label>Parent/Guardian Name</label>
                                            <input class="form-control form-control-user" type="text" id="exampleLastName-5" placeholder="Enter Parent/Guardian Name" name="pg_name" required="" style="height: 50px; border-radius: 10px; padding: 10px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 col-xl-6 col-xxl-4">
                                            <label>Grade Level</label>
                                            <select class="form-select form-select-sm" style="height: 50px; border-radius: 10px; padding: 10px;" name="grade_level" required>
                                                <optgroup label="Select Grade Level">
                                                    <option value="Grade 7" selected>Grade 7</option>
                                                    <option value="Grade 8">Grade 8</option>
                                                    <option value="Grade 9">Grade 9</option>
                                                    <option value="Grade 10">Grade 10</option>
                                                    <option value="Grade 11">Grade 11</option>
                                                    <option value="Grade 12">Grade 12</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-md-5 col-lg-4 col-xl-4 col-xxl-2 offset-xl-0 align-items-center align-content-center">
                                        <button class="btn btn-primary" type="submit" name="submit" form="addstudent">Add Student</button>
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php

            if (isset($_POST['submit'])) {
                $lrn = $_POST['lrn'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $grade_level = $_POST['grade_level'];
                $address = $_POST['address'];
                $pg_name = $_POST['pg_name'];

                $check_lrn = mysqli_query($cxn, "SELECT * FROM student WHERE lrn_id='$lrn'") or die("Error in query: $check_lrn." . mysqli_error($cxn));

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script type='text/javascript'> alert('Email not valid. Try again.'); location.href='addnewstudent.php'; </script>";
                } elseif ($check_lrn->num_rows > 1) {
                    echo "<script type='text/javascript'> alert('LRN already registered.'); location.href='addnewstudent.php'; </script>";
                } else {
                    $query = mysqli_query($cxn, "INSERT INTO student(lrn_id,first_name,last_name,email,grade_level,address,pg_name) VALUES('$lrn','$first_name','$last_name','$email','$grade_level','$address','$pg_name')") or die("Error in query: $query." . mysqli_error($cxn));
                    echo "<script type='text/javascript'> alert('Successfully Added New Student!'); location.href = 'addnewstudent.php'; </script>";
                }
            }

            ?>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © GNHS PTA Payment System - Admin Dashboard 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>