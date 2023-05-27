<?php
include 'db_connect.php';
if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                mysqli_query($cxn, "DELETE FROM `student` WHERE `id`='$id'") or die(mysqli_error($cxn));
                echo "<script type='text/javascript'> alert('Student Info deleted!'); location.href = 'viewstudents.php'; </script>";
            }