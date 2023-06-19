<?php
session_start();
include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Payments History | GNHS PTA Payment System - Admin</title>
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
                        <a class="nav-link active" href="payments.php"><i class="fas fa-money-bill"></i><span>Payment History</span></a>
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
                    <div class="row">
                        <div class="col-md-7 col-lg-8 col-xl-9 col-xxl-9">
                            <h3 class="text-dark" style="padding-top: 8px;margin-bottom: 16px;">
                                <strong>Payment History</strong>
                            </h3>
                        </div>
                        <div class="col-md-5 col-lg-4 col-xl-3 col-xxl-3 offset-xl-2 offset-xxl-1" style="margin: 0px;margin-top: 12px;padding-top: 0px;padding-right: 0px;padding-left: 20px; padding-bottom:10px;" id="filters">
                            <span class="fs-6 fw-bold text-dark" style="padding: 0px;margin: 0px;padding-right: 5px;">
                                Filter by
                            </span>
                            <select class="border rounded border-1 border-secondary" style="padding-right: 0px;width: 175px;" name="fetchpay" id="fetchpay">
                                <option value="Select Filter" selected disabled>Select Filter</option>
                                <option value="Grade Level">Grade Level</option>
                                <option value="Payment Method">Payment Method</option>
                                <option value="Last Name (A-Z)">Last Name (A-Z)</option>
                                <option value="Date (Asc)">Date (Asc)</option>
                                <option value="Date (Desc)">Date (Desc)</option>
                            </select>
                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#fetchpay").on('change', function() {
                                var value = $(this).val();

                                $.ajax({
                                    url: "fetchpayments.php",
                                    type: "POST",
                                    data: 'request=' + value,
                                    beforeSend: function() {
                                        $(".table").html(`<span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="206px" height="206px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                        <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#1d3f72" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.8181818181818181s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                        </circle>
                                        </svg>
                                        </span>`);
                                    },
                                    success: function(data) {
                                        $(".table").html(data);
                                    }
                                });
                            });
                        });
                    </script>

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Student Name</th>
                                            <th>Grade Level</th>
                                            <th>Reference No.</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Date (M/D/Y)</th>
                                            <th>Proof of Payment</th>
                                            <th>Remarks</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $payments = mysqli_query($cxn, "SELECT * FROM payments");
                                        $payments_query = mysqli_num_rows($payments);

                                        if ($payments_query > 0) {
                                            $i = 0;
                                            while ($p = mysqli_fetch_array($payments)) {
                                                $id = $p['id'];
                                                $lrn = $p['lrn'];
                                                $first_name = $p['first_name'];
                                                $last_name = $p['last_name'];
                                                $grade_level = $p['grade_level'];
                                                $ref_no = $p['ref_no'];
                                                $amount_paid = $p['amount_paid'];
                                                $payment_method = $p['payment_method'];
                                                $date = strtotime($p['uploaded_on']);
                                                $pay_date = date("m/d/Y; h:i A", $date);
                                                $remarks = $p['remarks'];


                                        ?>
                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                                                    <td><?php echo $grade_level; ?></td>
                                                    <td><?php echo $ref_no; ?></td>
                                                    <td><?php echo $payment_method; ?></td>
                                                    <td>&#8369;<?php echo $amount_paid; ?></td>
                                                    <td><?php echo $pay_date; ?></td>
                                                    <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                                                    <td><?php echo $remarks; ?></td>


                                                    <td>
                                                        <form action="payments.php" method="POST" id="accept">
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        </form>

                                                        <button class="btn btn-primary btn-sm" type="submit" name="accept" form="accept"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</button>

                                                        <?php
                                                        if (isset($_POST['id'])) {
                                                            $id = $_POST['id'];
                                                            $accept_payment = mysqli_query($cxn, "UPDATE payments SET remarks='ACCEPTED' WHERE id='$id'");

                                                            echo "<script type='text/javascript'> alert('Payment Accepted!'); location.href = 'payments.php'; </script>";
                                                        }
                                                        ?>
                                                    </td>


                                                    <td>
                                                        <form action="payment_denied.php" method="POST" id="deny">
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        </form>

                                                        <button class="btn btn-danger btn-sm" type="submit" name="deny" form="deny"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</button>

                                                    </td>
                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        } else {
                                            echo "<tr>
                                                    <td colspan='9'>No record found.</td>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('.userinfo').click(function() {
                var userid = $(this).data('id');
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {
                        userid: userid
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('#empModal').modal('show');
                    }
                });
            });
        });
    </script>

    <!-- #########################    Proof of Payment Modal    ####################################################-->
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Proof of Payment</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                </div>
            </div>
        </div>
    </div>
    <!-- #########################    End of Modal    ####################################################-->
</body>

</html>