<?php
include 'db_connect.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Overview - GNHS PTA Payment System - Treasurer</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container d-flex flex-column p-0"><a class="navbar-brand text-break d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span class="text-start"><br><br>GNHS PTA&nbsp;<br>Payment System<br>Treasurer<br>dashboard</span></div>
                </a>
                <hr class="sidebar-divider my-4">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link active" href="treas.php"><i class="fas fa-tachometer-alt"></i><span>Overview</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php"><i class="fas fa-search"></i><span>Search</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewstudents.php"><i class="fas fa-users"></i><span>Registered Students</span></a>
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0"><strong>Overview</strong></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Received payments</span></div>
                                            <?php
                                            $total_pay = mysqli_query($cxn, "SELECT SUM(amount_paid) AS total_pay FROM payments");
                                            $tp = $total_pay->fetch_assoc();

                                            ?>
                                            <div class="text-dark fw-bold h5 mb-0"><span>&#8369;<?php echo $tp["total_pay"]; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>No. of Students Paid</span></div>
                                            <?php
                                            $total_students = mysqli_query($cxn, "SELECT * FROM payments");
                                            $ts = mysqli_num_rows($total_students);
                                            ?>
                                            <div class="text-dark fw-bold h5 mb-0"><span>
                                                    <?php echo $ts; ?>
                                                </span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-money-bill-alt fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>payments made<br></span></div>
                                            <?php
                                            $total_students = mysqli_query($cxn, "SELECT * FROM payments");
                                            $ts = mysqli_num_rows($total_students);
                                            $ps = ROUND(($ts / 1012) * 100, 2);
                                            ?>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span>
                                                            <?php echo $ps; ?>%
                                                        </span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-check fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Pending payments</span></div>
                                            <?php
                                            $total_students = mysqli_query($cxn, "SELECT * FROM payments WHERE remarks='PENDING'");
                                            $pending = mysqli_num_rows($total_students);

                                            ?>
                                            <div class="text-dark fw-bold h5 mb-0"><span>
                                                    <?php echo $pending; ?>
                                                </span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-bell fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-7 col-xxl-7">
                            <div class="card shadow mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Payment History</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Student Name</th>
                                                    <th>Reference No.</th>
                                                    <th>Payment Method</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $payments = mysqli_query($cxn, "SELECT * FROM payments ORDER BY uploaded_on asc LIMIT 10");
                                                $payments_query = mysqli_num_rows($payments);

                                                if ($payments_query > 0) {
                                                    $i = 0;
                                                    while ($p = mysqli_fetch_array($payments)) {
                                                        $first_name = $p['first_name'];
                                                        $last_name = $p['last_name'];
                                                        $grade_level = $p['grade_level'];
                                                        $ref_no = $p['ref_no'];
                                                        $payment_method = $p['payment_method'];
                                                        $date = strtotime($p['uploaded_on']);
                                                        $pay_date = date("m/d/y", $date);

                                                ?>
                                                        <tr>
                                                            <td><?php echo $pay_date; ?></td>
                                                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                                                            <td><?php echo $ref_no; ?></td>
                                                            <td><?php echo $payment_method; ?></td>

                                                        </tr>

                                                <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    echo "<tr>
                                                        <td>No record found.</td>
                                                        </tr>";
                                                };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-5">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Authorized Users</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Added by</th>
                                                    <th>Access Level</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $users = mysqli_query($cxn, "SELECT * FROM users LIMIT 10");
                                                $users_query = mysqli_num_rows($users);

                                                if ($users_query > 0) {
                                                    $i = 0;
                                                    while ($u = mysqli_fetch_assoc($users)) {
                                                        $first_name = $u['first_name'];
                                                        $last_name = $u['last_name'];
                                                        $username = $u['username'];
                                                        $added_by = $u['added_by'];
                                                        $access_level = $u['access_level'];


                                                        $i++;

                                                ?>
                                                        <tr>
                                                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                                                            <td><?php echo $username; ?></td>
                                                            <td><?php echo $added_by; ?></td>
                                                            <td><?php echo $access_level; ?></td>

                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                    echo "<tr>
                                                    <td>No record found.</td>
                                                    </tr>";
                                                };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © GNHS PTA Payment System - Admin Dashboard 2023</span></div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>