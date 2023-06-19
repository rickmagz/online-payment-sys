<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registered Students Report | GNHS PTA Payment System - Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>
</head>
<style>
    @media print {
        #printbtn {
            display: none;
        }
    }
</style>

<body>
    <div id="wrapper">
        <div class="container-fluid mt-3" style="max-width: 85%;">
            <h2>GNHS PTA Payment System</h2>
            <h3>List of Registered Students</h3>
            <div id="print">

                <table class="table table-bordered my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>LRN</th>
                            <th>Grade Level</th>
                            <th>E-mail Address</th>
                            <th>Address</th>
                            <th>Parent Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $students = mysqli_query($cxn, "SELECT * FROM student ORDER BY id asc") or die("Error in query: $students ." . mysqli_error($cxn));
                        $students_query = mysqli_num_rows($students);

                        if ($students_query > 0) {
                            while ($s = mysqli_fetch_array($students)) {
                                $id = $s['id'];
                                $lrn = $s['lrn_id'];
                                $first_name = $s['first_name'];
                                $last_name = $s['last_name'];
                                $email = $s['email'];
                                $grade_level = $s['grade_level'];
                                $address = $s['address'];
                                $pg_name = $s['pg_name'];

                                $i++;
                        ?>
                                <tr class="student<?php echo $id; ?>">
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $first_name; ?></td>
                                    <td><?php echo $last_name; ?></td>
                                    <td><?php echo $lrn; ?></td>
                                    <td><?php echo $grade_level; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $pg_name; ?></td>
                                </tr>

                        <?php
                            }
                        } else {
                            echo "<tr>
                                    <td>No record found.</td>
                                </tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>

        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <div class="container-fluid mt-3" style="max-width: 85%;">
        <button class="btn btn-outline-primary" onclick="printDiv()" id="printbtn">Print</button>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        function printDiv() {
            var div = document.getElementsByTagName("print");
            window.print(div.innerHTML);
        }
    </script>

</body>

</html>