<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Monthly Payment Report | GNHS PTA Payment System - Admin</title>
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
            <h3>Monthly Payments of Students</h3>
            <div id="print">

                <table class="table table-bordered my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Student Name</th>
                            <th>Grade Level</th>
                            <th>Reference No.</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Date (M/D/Y)</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $payments = mysqli_query($cxn, "SELECT * FROM payments WHERE month(uploaded_on) = MONTH(NOW())");
                        $payments_query = mysqli_num_rows($payments);

                        if ($payments_query > 0) {
                            $i = 0;
                            while ($p = mysqli_fetch_assoc($payments)) {
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
                                    <td><?php echo $remarks; ?></td>
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