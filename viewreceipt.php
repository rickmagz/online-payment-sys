<?php
session_start();
include 'db_connect.php';

$data = $_GET['id'];
$getStudentData = mysqli_query($cxn, "SELECT * FROM payments WHERE ref_no='$data'") or die("Error in query: $getStudentData." . mysqli_error($cxn));

if ($getStudentData) {
    $sd = mysqli_fetch_assoc($getStudentData);
    $first_name = $sd['first_name'];
    $last_name = $sd['last_name'];
    $lrn = $sd['lrn'];
    $grade_level = $sd['grade_level'];
    $method = $sd['payment_method'];
    $ref_no = $sd['ref_no'];
    $amount = $sd['amount_paid'];
    $remarks = $sd['remarks'];
    $date = strtotime($sd['uploaded_on']);
    $regdate = date("m/d/Y; h:i A", $date);
    $time = date_default_timezone_set('Asia/Manila');
    $datestamp = date('m/d/Y h:i:s a', time());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Receipt | GNHS PTA Payment System - Admin</title>
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
        <div class="container mt-2" style="max-width: 45%;">
            <div id="print">
                <div class="text-center">
                    <h4>Guimbal National High School PTA Payment</h4>
                    <h3>Official Receipt</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Customer Information</h5>
                        <ul class="list-unstyled">
                            <li>Name: <strong><?php echo $first_name;?> <?php echo $last_name;?></strong></li>
                            <li>LRN: <?php echo $lrn;?></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>Invoice Information</h5>
                        <ul class="list-unstyled">
                            <li>Reference Number: <?php echo $ref_no;?></li>
                            <li>Print Date: <?php echo $datestamp;?></li>
                        </ul>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Paid Fee/s</th>
                            <th></th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PTA Fee</td>
                            <td></td>
                            <td>&#8369;<?php echo $amount;?>.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
                <p class="m-0">Payment Received: <?php echo $regdate;?></p>
                <p class="m-0">Payment Status: <?php echo $remarks;?></p>
                <p class="m-0">Payment Method: <?php echo $method;?></p>
                <p class="m-0">Signature: _________________________</p>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3" style="max-width: 85%;">
        <button class="btn btn-dark btn-sm" onclick="printDiv()" id="printbtn">Print</button>
        <a href="javascript:window.close()" class="btn btn-secondary btn-sm" id="printbtn">Close</a>
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