<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Daily Payment Report | GNHS PTA Payment System - Admin</title>
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
<?php
$data = $_GET['gradelevel'];

switch ($data) {
    case '7':
        $grade_level = "Grade 7";
        break;
    case '8':
        $grade_level = "Grade 8";
        break;
    case '9':
        $grade_level = "Grade 9";
        break;
    case '10':
        $grade_level = "Grade 10";
        break;
    case '11':
        $grade_level = "Grade 11";
        break;
    case '12':
        $grade_level = "Grade 12";
        break;
    default:
        $grade_level = "<<fetch_gradelevel error!>>";
}
$today = date("Y-m-d");
$time = date_default_timezone_set('Asia/Manila');
$datestamp = date('m/d/Y h:i:s a', time());

$getGradeLevel = mysqli_query($cxn, "SELECT * FROM payments WHERE grade_level = '$grade_level' ORDER BY uploaded_on desc");
$paymentrecord_today = mysqli_num_rows($getGradeLevel);

$getDailyTotalAmount = "SELECT SUM(amount_paid) FROM payments";
$res = $cxn->query($getDailyTotalAmount);
$total = $res->fetch_assoc()['SUM(amount_paid)'];
?>

<body>
    <span>Date Printed: <?php echo $datestamp; ?></span>
    <div id="wrapper">
        <div class="container-fluid mt-3" style="max-width: 85%; text-align: center;">
            <h2><strong>GNHS PTA Payment System</h2>
            <h3>Daily Payment Report</strong></h3>
            <h4>Grade <?php echo $data; ?></h4>
            <h5>Total Accepted Amount: &#8369; <?php echo $total; ?>.00<br>(as of <?php echo $today; ?>)</h5>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover table-bordered my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Student Name</th>
                            <th>Reference No.</th>
                            <th>Payment Method</th>
                            <th>Date (M/D/Y)</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($paymentrecord_today > 0) {
                            $i = 0;
                            while ($gr = mysqli_fetch_assoc($getGradeLevel)) {
                                $id = $gr['id'];
                                $lrn = $gr['lrn'];
                                $first_name = $gr['first_name'];
                                $last_name = $gr['last_name'];
                                $ref_no = $gr['ref_no'];
                                $payment_method = $gr['payment_method'];
                                $date = strtotime($gr['uploaded_on']);
                                $pay_date = date("m/d/Y", $date);
                                $remarks = $gr['remarks'];
                        ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                                    <td><?php echo $ref_no; ?></td>
                                    <td><?php echo $payment_method; ?></td>
                                    <td><?php echo $pay_date; ?></td>
                                    <td><?php echo $remarks; ?></td>
                                </tr>

                        <?php
                                $i++;
                            }
                        } else {
                            echo "<tr>
                            <td colspan='6'>No record found.</td>
                            </tr>";
                        }

                        $cxn->close();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="container-fluid mt-3" style="max-width: 85%;">
        <button class="btn btn-outline-primary" onclick="printDiv()" id="printbtn">Print</button>
        <a href="javascript:window.close()" class="btn btn-outline-secondary" id="printbtn"><i class="fa fa-reply" aria-hidden="true"></i>Close</a>
    </div>

    <script>
        function printDiv() {
            var div = document.getElementsByTagName("print");
            window.print(div.innerHTML);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</body>

</html>