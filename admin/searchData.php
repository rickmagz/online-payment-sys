<?php
session_start();
include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search Info | GNHS PTA Payment System - Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>
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
                    <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="search.php"><i class="fas fa-search"></i><span>Search</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="addnewstudent.php"><i class="fas fa-user"></i><span>Add New Student</span></a><a class="nav-link" href="addnewuser.php"><i class="fas fa-user"></i><span>Add New User</span></a>
                        <a class="nav-link" href="viewstudents.php"><i class="fas fa-users"></i><span>Registered Students</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="viewusers.php"><i class="fas fa-user-tie"></i><span>System Users</span></a><a class="nav-link" href="payments.php"><i class="fas fa-money-bill"></i><span>Payment History</span></a></li>
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
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>

                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group">
                                            <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary py-0" type="button">
                                                    <i class="fas fa-search"></i></button>
                                            </div>
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
                <?php
                $data = $_GET['id'];
                $getStudentData = mysqli_query($cxn, "SELECT * FROM student WHERE lrn_id='$data'") or die("Error in query: $getStudentData." . mysqli_error($cxn));

                if ($getStudentData) {
                    $sd = mysqli_fetch_assoc($getStudentData);
                    $first_name = $sd['first_name'];
                    $last_name = $sd['last_name'];
                    $lrn = $sd['lrn_id'];
                    $grade_level = $sd['grade_level'];
                    $email = $sd['email'];
                    $address = $sd['address'];
                    $pg = $sd['pg_name'];
                    $date = strtotime($sd['date_created']);
                    $regdate = date("F d, Y; h:i A", $date);

                ?>
                    <div class="container-fluid" style="max-width: 85%;">
                        <div class="card shadow">
                            <div class="card-body">
                                <h3 class="card-title mb-3">Student Information</h3>
                                <div class="row">
                                    <div class="col-sm-3">Learners' Reference Number</div>
                                    <div class="col-sm-8"><?php echo $lrn; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Student Name</div>
                                    <div class="col-sm-8"><?php echo $first_name; ?> <?php echo $last_name; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Grade Level</div>
                                    <div class="col-sm-8"><?php echo $grade_level; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Present Address</div>
                                    <div class="col-sm-8"><?php echo $address; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">E-mail Address</div>
                                    <div class="col-sm-8"><?php echo $email; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Parent/Guardian Name</div>
                                    <div class="col-sm-8"><?php echo $pg; ?></div>
                                </div>

                            <?php
                        }

                            ?>
                            <hr />
                            <h3 class="card-title mb-3">Payment Records</h3>
                            <table class="table table-hover table-borderless my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Reference No.</th>
                                        <th>Payment Method</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getStudentPaymentData = mysqli_query($cxn, "SELECT * FROM payments WHERE lrn='$data'") or die("Error in query: $getStudentPaymentData." . mysqli_error($cxn));
                                    $query = mysqli_num_rows($getStudentPaymentData);

                                    if ($query > 0) {
                                        $i = 0;
                                        while ($p = mysqli_fetch_assoc($getStudentPaymentData)) {
                                            $ref_no = $p['ref_no'];
                                            $payment_method = $p['payment_method'];
                                            $date = strtotime($p['uploaded_on']);
                                            $pay_date = date("F d, Y; h:i A", $date);

                                    ?>
                                            <tr>
                                                <td><?php echo $ref_no; ?></td>
                                                <td><?php echo $payment_method; ?></td>
                                                <td><?php echo $pay_date; ?></td>
                                            </tr>

                                    <?php
                                            $i++;
                                        }
                                    } else {
                                        echo "<tr>
                          <td colspan='3'>No record found.</td>
                      </tr>";
                                    };

                                    ?>
                                </tbody>
                            </table>


                            <br>
                            <a href="javascript:window.print()" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                            <a href="javascript:window.close()" class="btn btn-secondary btn-sm"><i class="fa fa-reply" aria-hidden="true"></i> Back to Search</a>
                            </div>
                        </div>
                    </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © GNHS PTA Payment System - Admin Dashboard 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>

</body>

</html>