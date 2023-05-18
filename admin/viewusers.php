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
                    <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="addnewstudent.php"><i class="fas fa-user"></i><span>Add New Student</span></a><a class="nav-link" href="addnewuser.php"><i class="fas fa-user"></i><span>Add New User</span></a><a class="nav-link" href="viewstudents.php"><i class="fas fa-users"></i><span>Registered Students</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="viewusers.php"><i class="fas fa-user-tie"></i><span>System Users</span></a><a class="nav-link" href="payments.php"><i class="fas fa-money-bill"></i><span>Payment History</span></a></li>
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
                    <h3 class="text-dark mb-4"><strong>System Users</strong></h3>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
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
                                                $t_id = $u['teacher_id'];
                                                $first_name = $u['first_name'];
                                                $last_name = $u['last_name'];
                                                $username = $u['username'];
                                                $added_by = $u['added_by'];
                                                $added = strtotime($u['added_on']);
                                                $added_on = date("F d, Y; h:i A", $added);
                                                $access_level = $u['access_level'];

                                        ?>
                                                <tr>
                                                    <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                                                    <td><?php echo $username; ?></td>
                                                    <td><?php echo $t_id; ?></td>
                                                    <td><?php echo $access_level; ?></td>
                                                    <td><?php echo $added_by; ?></td>
                                                    <td><?php echo $added_on; ?></td>
                                                    <td><button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                                                        <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                                                    </td>
                                                </tr>

                                        <?php
                                                $i++;
                                            }
                                        }
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

            <!-- Modal -->
            <div class="modal fade" id="modifybtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modify User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                        <option value="Teacher">Teacher</option>
                                    </optgroup>
                                </select>
                                <label>Access Level</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>