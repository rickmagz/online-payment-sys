<?php
session_start();
include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search | GNHS PTA Payment System - Admin</title>
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
                <div class="container-fluid" style="max-width: 50%;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <g transform="translate(50 50)">
                                <g transform="scale(0.8)">
                                    <g transform="translate(-50 -50)">
                                        <g>
                                            <animateTransform attributeName="transform" type="translate" repeatCount="indefinite" dur="1s" values="-20 -20;20 -20;0 20;-20 -20" keyTimes="0;0.33;0.66;1"></animateTransform>
                                            <path fill="#5699d2" d="M44.19 26.158c-4.817 0-9.345 1.876-12.751 5.282c-3.406 3.406-5.282 7.934-5.282 12.751 c0 4.817 1.876 9.345 5.282 12.751c3.406 3.406 7.934 5.282 12.751 5.282s9.345-1.876 12.751-5.282 c3.406-3.406 5.282-7.934 5.282-12.751c0-4.817-1.876-9.345-5.282-12.751C53.536 28.033 49.007 26.158 44.19 26.158z"></path>
                                            <path fill="#1d3f72" d="M78.712 72.492L67.593 61.373l-3.475-3.475c1.621-2.352 2.779-4.926 3.475-7.596c1.044-4.008 1.044-8.23 0-12.238 c-1.048-4.022-3.146-7.827-6.297-10.979C56.572 22.362 50.381 20 44.19 20C38 20 31.809 22.362 27.085 27.085 c-9.447 9.447-9.447 24.763 0 34.21C31.809 66.019 38 68.381 44.19 68.381c4.798 0 9.593-1.425 13.708-4.262l9.695 9.695 l4.899 4.899C73.351 79.571 74.476 80 75.602 80s2.251-0.429 3.11-1.288C80.429 76.994 80.429 74.209 78.712 72.492z M56.942 56.942 c-3.406 3.406-7.934 5.282-12.751 5.282s-9.345-1.876-12.751-5.282c-3.406-3.406-5.282-7.934-5.282-12.751 c0-4.817 1.876-9.345 5.282-12.751c3.406-3.406 7.934-5.282 12.751-5.282c4.817 0 9.345 1.876 12.751 5.282 c3.406 3.406 5.282 7.934 5.282 12.751C62.223 49.007 60.347 53.536 56.942 56.942z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>
                    <h4 class="card-title text-center">Looking for something?</h4><br />
                    <form action="search.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="search" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </span>
                    </form>
                </div>
            </div>
            <div class="container-fluid mt-3" id="searchresult" style="max-width: 85%;">
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-hover table-borderless my-0">
                            <thead>
                                <tr>
                                    <th>LRN</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Grade Level</th>
                                    <th>Address</th>
                                    <th>E-Mail Address</th>
                                </tr>
                            </thead>
                            <?php
                            if (isset($_POST['search'])) {
                                $search = $_POST['search'];

                                $search_query = mysqli_query($cxn, "SELECT * FROM student WHERE id LIKE '%$search%' or lrn_id LIKE '%$search%' or first_name LIKE '%$search%' or last_name LIKE '%$search%' or email LIKE '%$search%' ORDER BY id asc") or die("Error in query: $search_query." . mysqli_error($cxn));

                                if ($search_query) {
                                    if (mysqli_num_rows($search_query) > 0) {
                                        while ($r = mysqli_fetch_assoc($search_query)) {
                                            echo '
                                    <tbody>
                                        <tr>
                                            <td>' . $r['lrn_id'] . '</td>
                                            <td>' . $r['first_name'] . '</td>
                                            <td>' . $r['last_name'] . '</td>
                                            <td>' . $r['grade_level'] . '</td>
                                            <td>' . $r['address'] . '</td>
                                            <td>' . $r['email'] . '</td>                            
                                            <td> <a type="button" class="btn btn-primary btn-sm" href="searchData.php?id=' . $r['lrn_id'] . '" target="_blank">View More Info</a></td>                            
                                        </tr>
                                    </tbody>
                                ';
                                        }
                                    } else {
                                        echo '
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2>Data not found!</h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                    ';
                                    }
                                }
                            }

                            ?>


                        </table>
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