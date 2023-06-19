<?php
session_start();
include 'db_connect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $accept_payment = mysqli_query($cxn, "UPDATE payments SET remarks='DENIED' WHERE id='$id'");

    echo "<script type='text/javascript'> alert('Payment DENIED!'); location.href = 'payments.php'; </script>";
}
