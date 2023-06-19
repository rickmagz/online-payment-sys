<?php
session_start();
include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Generate Reports | GNHS PTA Payment System - Admin</title>
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
                    <div class="sidebar-brand-text mx-3"><span class="text-start"><br><br>GNHS PTA&nbsp;<br>Payment System<br>Treasurer<br>dashboard</span></div>
                </a>
                <hr class="sidebar-divider my-4">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link " href="treas.php"><i class="fas fa-tachometer-alt"></i><span>Overview</span></a>
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
                        <a class="nav-link active" href="printData.php"><i class="fas fa-print"></i><span>Generate Report</span></a>
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
                <div class="container-fluid" style="max-width: 50%;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <g>
                                <circle cx="60" cy="50" r="4" fill="#5699d2">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.67s"></animate>
                                    <animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.67s"></animate>
                                </circle>
                                <circle cx="60" cy="50" r="4" fill="#5699d2">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="-0.33s"></animate>
                                    <animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="-0.33s"></animate>
                                </circle>
                                <circle cx="60" cy="50" r="4" fill="#5699d2">
                                    <animate attributeName="cx" repeatCount="indefinite" dur="1s" values="95;35" keyTimes="0;1" begin="0s"></animate>
                                    <animate attributeName="fill-opacity" repeatCount="indefinite" dur="1s" values="0;1;1" keyTimes="0;0.2;1" begin="0s"></animate>
                                </circle>
                            </g>
                            <g transform="translate(-15 0)">
                                <path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#1d3f72" transform="rotate(90 50 50)"></path>
                                <path d="M50 50L20 50A30 30 0 0 0 80 50Z" fill="#1d3f72">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform>
                                </path>
                                <path d="M50 50L20 50A30 30 0 0 1 80 50Z" fill="#1d3f72">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;-45 50 50;0 50 50" keyTimes="0;0.5;1"></animateTransform>
                                </path>
                            </g>
                        </svg>
                    </span>
                    <h4 class="card-title text-center">Generate Report from Database</h4><br />
                </div>
                <div class="container-fluid mt-3" style="max-width: 85%;">
                    <div class="row">
                        <div class="col">
                            <a href="student_rep.php" target="_blank" class="text-decoration-none">
                                <div class="card shadow text-center">
                                    <div class="card-body">
                                        <i class="far fa-user fa-lg"></i><br>
                                        Student Data
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="monthly_rep.php" class="text-decoration-none" data-toggle="modal" data-target="#monthlyreport">
                                <div class="card shadow text-center">
                                    <div class="card-body">
                                        <i class="fas fa-file-invoice fa-lg"></i><br>
                                        Monthly Payment Report
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="yearly_rep.php" class="text-decoration-none" data-toggle="modal" data-target="#yearlyreport">
                                <div class="card shadow text-center">
                                    <div class="card-body">
                                        <i class="fas fa-file-invoice fa-lg"></i><br>
                                        Yearly Payment Report
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <?php
            $jan = 1;
            $feb = 2;
            $mar = 3;
            $apr = 4;
            $may = 5;
            $jun = 6;
            $jul = 7;
            $aug = 8;
            $sep = 9;
            $oct = 10;
            $nov = 11;
            $dec = 12;
            ?>

            <!--Monthly Report Modal -->
            <div class="modal fade" id="monthlyreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Select Month</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid mt-3">
                                <div class="row">
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $jan; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    January
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $feb; ?>" class="text-decoration-none" target="_blank">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    February
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $mar; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    March
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $apr; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    April
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="container-fluid mt-3">
                                <div class="row">
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $may; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    May
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $jun; ?>" class="text-decoration-none" target="_blank">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    June
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $jul; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    July
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $aug; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    August
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="container-fluid mt-3">
                                <div class="row">
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $sep; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    September
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $oct; ?>" class="text-decoration-none" target="_blank">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    October
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $nov; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    November
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="monthly_rep.php?id=<?php echo $dec; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    December
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <?php
            $year23 = 2023;
            $year24 = 2024;
            $year25 = 2025;
            $year26 = 2026;

            ?>

            <!--Yearly Report Modal -->
            <div class="modal fade" id="yearlyreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Select Year</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid mt-3">
                                <div class="row">
                                    <div class="col">
                                        <a href="yearly_rep.php?id=<?php echo $year23; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    2023
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="yearly_rep.php?id=<?php echo $year24; ?>" class="text-decoration-none" target="_blank">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    2024
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="yearly_rep.php?id=<?php echo $year25; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    2025
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="yearly_rep.php?id=<?php echo $year26; ?>" target="_blank" class="text-decoration-none">
                                            <div class="card shadow text-center">
                                                <div class="card-body">
                                                    2026
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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