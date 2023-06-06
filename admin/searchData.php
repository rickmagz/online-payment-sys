<?php
session_start();
include 'db_connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search Info | GNHS PTA Payment System - Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>
</head>
<body id="page-top">
    <div id="wrapper">
        
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php
                $data = $_GET['id'];
                $getStudentData = mysqli_query($cxn, "SELECT * FROM student WHERE lrn_id='$data'") or die("Error in query: $getStudentData." . mysqli_error($cxn));

                if ($getStudentData) {
                    $sd = mysqli_fetch_assoc($getStudentData);
                    $first_name = $sd['first_name'];
                    $last_name = $sd['last_name'];
                    $lrn = $sd['lrn_id'];
                    $grade_level = $sd['grade_level'];
                    $email = $sd['email'];
                    $address = $sd['address'];
                    $pg = $sd['pg_name'];
                    $date = strtotime($sd['date_created']);
                    $regdate = date("F d, Y; h:i A", $date);

                ?>
                    <div class="container-fluid" style="max-width: 85%;" id="print">
                        <div class="card shadow">
                            <div class="card-body">
                                <h3 class="card-title mb-3">Student Information</h3>
                                <div class="row">
                                    <div class="col-sm-3">Learners' Reference Number</div>
                                    <div class="col-sm-8"><?php echo $lrn; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Student Name</div>
                                    <div class="col-sm-8"><?php echo $first_name; ?> <?php echo $last_name; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Grade Level</div>
                                    <div class="col-sm-8"><?php echo $grade_level; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Present Address</div>
                                    <div class="col-sm-8"><?php echo $address; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">E-mail Address</div>
                                    <div class="col-sm-8"><?php echo $email; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Parent/Guardian Name</div>
                                    <div class="col-sm-8"><?php echo $pg; ?></div>
                                </div>

                            <?php
                        }

                            ?>
                            <hr />
                            <h3 class="card-title mb-3">Payment Records</h3>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-responsive table-hover table-borderless my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Reference No.</th>
                                            <th>Payment Method</th>
                                            <th>Payment Date</th>
                                            <th>Proof of Payment</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $getStudentPaymentData = mysqli_query($cxn, "SELECT * FROM payments WHERE lrn='$data'") or die("Error in query: $getStudentPaymentData." . mysqli_error($cxn));
                                        $query = mysqli_num_rows($getStudentPaymentData);

                                        if ($query > 0) {
                                            $i = 0;
                                            while ($p = mysqli_fetch_assoc($getStudentPaymentData)) {
                                                $ref_no = $p['ref_no'];
                                                $payment_method = $p['payment_method'];
                                                $remarks = $p['remarks'];
                                                $date = strtotime($p['uploaded_on']);
                                                $pay_date = date("F d, Y; h:i A", $date);

                                        ?>
                                                <tr>
                                                    <td><?php echo $ref_no; ?></td>
                                                    <td><?php echo $payment_method; ?></td>
                                                    <td><?php echo $pay_date; ?></td>
                                                    <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                                                    <td><?php echo $remarks; ?></td>
                                                </tr>

                                        <?php
                                                $i++;
                                            }
                                        } else {
                                            echo "<tr>
                          <td colspan='3'>No record found.</td>
                      </tr>";
                                        };

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <a href="javascript:window.print()" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            <a href="javascript:window.close()" class="btn btn-secondary btn-sm"><i class="fa fa-reply" aria-hidden="true"></i> Back to Search</a>
                            </div>
                        </div>
                    </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © GNHS PTA Payment System - Admin Dashboard 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('.userinfo').click(function() {
                var userid = $(this).data('id');
                $.ajax({
                    url: 'viewattachment.php',
                    type: 'post',
                    data: {
                        userid: userid
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('#empModal').modal('show');
                    }
                });
            });
        });
    </script>

    <!-- #########################    Proof of Payment Modal    ####################################################-->
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Proof of Payment</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="searchData.php?id=<?php echo $lrn; ?>" role="button">Close</a>
                </div>
            </div>
        </div>
    </div>
    <!-- #########################    End of Modal    ####################################################-->

</body>

</html>