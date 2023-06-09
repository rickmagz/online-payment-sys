<?php
session_start();
include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>System Users | GNHS PTA Payment System - Admin</title>
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
                        <a class="nav-link" href="addnewstudent.php"><i class="fas fa-user"></i><span>Add New Student</span></a><a class="nav-link " href="addnewuser.php"><i class="fas fa-user"></i><span>Add New User</span></a><a class="nav-link " href="viewstudents.php"><i class="fas fa-users"></i><span>Registered Students</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="viewusers.php"><i class="fas fa-user-tie"></i><span>System Users</span></a>
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
                    <div class="row">
                        <div class="col-md-7 col-lg-8 col-xl-9 col-xxl-9">
                            <h3 class="text-dark" style="padding-top: 8px;margin-bottom: 16px;">
                                <strong>System Users</strong>
                            </h3>
                        </div>
                        <div class="col-md-5 col-lg-4 col-xl-3 col-xxl-3 offset-xl-2 offset-xxl-1" style="margin: 0px;margin-top: 12px;padding-top: 0px;padding-right: 0px;padding-left: 20px; padding-bottom:10px;" id="filters">
                            <span class="fs-6 fw-bold text-dark" style="padding: 0px;margin: 0px;padding-right: 5px;">
                                Filter by
                            </span>
                            <select class="border rounded border-1 border-secondary" style="padding-right: 0px;width: 175px;" name="fetchval" id="fetchval">
                                <option value="Select Filter" selected disabled>Select Filter</option>
                                <option value="Admin">Admin</option>
                                <option value="Treasurer">Treasurer</option>
                                <option value="Registration Date">Registration Date</option>
                                <option value="Last Name">Last Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>ID No.</th>
                                            <th>Access Level</th>
                                            <th>Added by</th>
                                            <th>Added on</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $users = mysqli_query($cxn, "SELECT * FROM users ORDER BY added_on asc");
                                        $users_query = mysqli_num_rows($users);

                                        if ($users_query > 0) {
                                            $i = 0;
                                            while ($u = mysqli_fetch_assoc($users)) {
                                                $id = $u['id'];
                                                $t_id = $u['teacher_id'];
                                                $first_name = $u['first_name'];
                                                $last_name = $u['last_name'];
                                                $username = $u['username'];
                                                $added_by = $u['added_by'];
                                                $added = strtotime($u['added_on']);
                                                $added_on = date("F d, Y; h:i A", $added);
                                                $access_level = $u['access_level'];


                                                $i++;

                                        ?>
                                                <tr class="user<?php echo $id ?>">
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $first_name; ?></td>
                                                    <td><?php echo $last_name; ?></td>
                                                    <td><?php echo $username; ?></td>
                                                    <td><?php echo $t_id; ?></td>
                                                    <td><?php echo $access_level; ?></td>
                                                    <td><?php echo $added_by; ?></td>
                                                    <td><?php echo $added_on; ?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm modifybtn" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                                                        <a type="button" class="btn btn-danger btn-sm" href="deleteuser.php?id=<?php echo $id; ?>">Delete</a>
                                                    </td>
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
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modify Modal -->
            <div class="modal fade" id="modifybtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modify System User Info</h5>
                        </div>
                        <div class="modal-body">
                            <form action="viewusers.php" method="POST" id="modifyusers">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
                                    <label>Entry No.</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">
                                    <label>First Name</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">
                                    <label>Last Name</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                                    <label>Username</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="idno" placeholder="Enter ID no." name="idno">
                                    <label>ID No.</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <select class="form-select" name="access_level" id="access_level" required>
                                        <optgroup label="Select Access Level">
                                            <option value="Admin">Admin</option>
                                            <option value="Treasurer">Treasurer</option>
                                        </optgroup>
                                    </select>
                                    <label>Access Level</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" href="viewusers.php" role="button">Close</a>
                            <button type="submit" name="modifyusers" form="modifyusers" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Modal -->



            <?php
            if (isset($_POST['modifyusers'])) {
                $id = $_POST['id'];
                $t_id = $_POST['idno'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $username = $_POST['username'];
                $access_level = $_POST['access_level'];
                $added_by = $_SESSION['first_name'];

                $update_user = mysqli_query($cxn, "UPDATE users SET first_name='$first_name',last_name='$last_name',username='$username',teacher_id='$t_id',access_level='$access_level',added_by='$added_by',added_on=now() WHERE id='$id'") or die("Error in query: $update_user." . mysqli_error($cxn));

                echo "<script type='text/javascript'> alert('Successfully Modified!'); location.href = 'viewusers.php'; </script>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!--Modify Modal AJAX Code -->
    <script>
        $(document).ready(function() {
            $('.modifybtn').on('click', function() {
                $('#modifybtn').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#first_name').val(data[1]);
                $('#last_name').val(data[2]);
                $('#username').val(data[3]);
                $('#idno').val(data[4]);
                $('#access_level').val(data[5]);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fetchval").on('change', function() {
                var value = $(this).val();

                $.ajax({
                    url: "fetchusers.php",
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
</body>

</html>