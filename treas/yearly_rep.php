<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Yearly Payment Report | GNHS PTA Payment System - Admin</title>
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
$data = $_GET['id'];

switch ($data) {
    case '2023':
        $year = "2023";
        break;
    case '2024':
        $year = "2024";
        break;
    case '2025':
        $year = "2025";
        break;
    case '2026':
        $year = "2026";
        break;
    default:
        $year = "<<fetch_year error!>>";
}

$getPaymentRecord = mysqli_query($cxn, "SELECT * FROM payments WHERE year(uploaded_on) = $data");
$paymentsrecord_query = mysqli_num_rows($getPaymentRecord);

$getYearlyAmount = "SELECT SUM(amount_paid) FROM payments WHERE year(uploaded_on) = $data";
$result = $cxn->query($getYearlyAmount);
$sum = $result->fetch_assoc()['SUM(amount_paid)'];
?>

<body>
    <div id="wrapper">
        <div class="container-fluid mt-3" style="max-width: 85%;">
            <h2>GNHS PTA Payment System</h2>
            <h3><?php echo $year; ?> PTA Payment Report</h3>

            <div id="print">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Number of Students Paid</h5>
                                <h3 class="card-text">
                                    <?php echo $paymentsrecord_query; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Funds</h5>
                                <h3 class="card-text">&#8369;<?php echo $sum; ?>.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid mt-3" style="max-width: 85%;">
        <button class="btn btn-outline-primary" onclick="printDiv()" id="printbtn">Print</button>
        <a href="javascript:window.close()" class="btn btn-outline-secondary" id="printbtn"><i class="fa fa-reply" aria-hidden="true"></i>Close</a>
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