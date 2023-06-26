<?php
include 'db_connect.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $time = date_default_timezone_set('Asia/Manila');
    $datestamp = date('Y-m-d H:i:s', time());
    $deny_payment = mysqli_query($cxn, "UPDATE payments SET remarks='DENIED', uploaded_on='$datestamp'  WHERE id='$id'");

    echo "<script type='text/javascript'> alert('Payment DENIED!'); location.href = 'payments.php'; </script>";
}

$cxn->close();
