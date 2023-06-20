<?php
include 'db_connect.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $deny_payment = mysqli_query($cxn, "UPDATE payments SET remarks='DENIED' WHERE id='$id'");

    echo "<script type='text/javascript'> alert('Payment DENIED!'); location.href = 'payments.php'; </script>";
}

$cxn->close();
