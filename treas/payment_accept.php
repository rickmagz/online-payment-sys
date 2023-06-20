<?php
include 'db_connect.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $accept_payment = mysqli_query($cxn, "UPDATE payments SET remarks='ACCEPTED' WHERE id='$id'");

    echo "<script type='text/javascript'> alert('Payment Accepted!'); location.href = 'payments.php'; </script>";
}

$cxn->close();
