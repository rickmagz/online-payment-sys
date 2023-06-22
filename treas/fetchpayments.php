<?php
sleep(1);
include 'db_connect.php';

if (isset($_POST['request'])) {
    $request = $_POST['request'];
    if ($request == 'Grade Level') {
        $query = mysqli_query($cxn, "SELECT * FROM payments ORDER BY grade_level ASC");
        $count = mysqli_num_rows($query);
?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">

                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);
                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td><a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>
                    <?php
                            }
                    ?>

                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>
    <?php
    } elseif ($request == 'Payment Method') {
        $query = mysqli_query($cxn, "SELECT * FROM payments ORDER BY payment_method ASC");
        $count = mysqli_num_rows($query);
    ?>

        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">
                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);

                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td><a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>

                    <?php
                            }
                    ?>
                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>
    <?php
    } elseif ($request == 'Last Name (A-Z)') {
        $query = mysqli_query($cxn, "SELECT * FROM payments ORDER BY last_name asc");
        $count = mysqli_num_rows($query);
    ?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">

                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);
                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td> <a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>
                    <?php
                            }
                    ?>
                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>





    <?php
    } elseif ($request == 'Date (Asc)') {
        $query = mysqli_query($cxn, "SELECT * FROM payments ORDER BY uploaded_on asc");
        $count = mysqli_num_rows($query);
    ?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">

                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);
                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td> <a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>
                    <?php
                            }
                    ?>
                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>



    <?php
    } elseif ($request == 'Date (Desc)') {
        $query = mysqli_query($cxn, "SELECT * FROM payments ORDER BY uploaded_on desc");
        $count = mysqli_num_rows($query);
    ?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">

                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);
                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td><a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>
                    <?php
                            }
                    ?>
                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>



    <?php
    } elseif ($request == 'Pending') {
        $query = mysqli_query($cxn, "SELECT * FROM payments WHERE remarks='PENDING'");
        $count = mysqli_num_rows($query);
    ?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">

                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Remarks</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);
                                $remarks = $p['remarks']
                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><?php echo $remarks; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td><a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>
                    <?php
                            }
                    ?>
                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>



    <?php
    } elseif ($request == 'Accepted') {
        $query = mysqli_query($cxn, "SELECT * FROM payments WHERE remarks='ACCEPTED'");
        $count = mysqli_num_rows($query);
    ?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">

                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Remarks</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);
                                $remarks = $p['remarks'];
                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><?php echo $remarks; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td><a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>
                    <?php
                            }
                    ?>
                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>


    <?php
    } elseif ($request == 'Denied') {
        $query = mysqli_query($cxn, "SELECT * FROM payments WHERE remarks='DENIED'");
        $count = mysqli_num_rows($query);
    ?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-hover my-0" id="dataTable">

                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Student Name</th>
                                <th>Grade Level</th>
                                <th>Reference No.</th>
                                <th>Payment Method</th>
                                <th>Amount Paid</th>
                                <th>Payment Date</th>
                                <th>Remarks</th>
                                <th>Proof of Payment</th>
                                <th>Actions</th>
                            </tr>
                        <?php
                    } else {
                        echo "No record found!";
                    }
                        ?>
                        </thead>
                        <tbody>
                            <?php
                            while ($p = mysqli_fetch_array($query)) {
                                $id = $p['id'];
                                $lrn = $p['lrn'];
                                $first_name = $p['first_name'];
                                $last_name = $p['last_name'];
                                $grade_level = $p['grade_level'];
                                $ref_no = $p['ref_no'];
                                $amount_paid = $p['amount_paid'];
                                $payment_method = $p['payment_method'];
                                $date = strtotime($p['uploaded_on']);
                                $pay_date = date("F d, Y; h:i A", $date);
                                $remarks = $p['remarks'];
                            ?>
                        </tbody>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?> <?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_method; ?></td>
                            <td>&#8369;<?php echo $amount_paid; ?></td>
                            <td><?php echo $pay_date; ?></td>
                            <td><?php echo $remarks; ?></td>
                            <td><button data-id='<?php echo $p['id']; ?>' class="userinfo btn btn-primary btn-sm"><i class="bi bi-image-fill"></i>&nbsp;See Attachment</button></td>
                            <td><a type="button" class="btn btn-primary btn-sm" href="payment_accept.php?id=<?php echo $id; ?>"><i class="bi bi-check-circle-fill"></i>&nbsp;Accept</a></td>
                            <td><a type="button" class="btn btn-danger btn-sm" href="payment_denied.php?id=<?php echo $id; ?>"><i class="bi bi-x-circle-fill"></i>&nbsp;Deny</a></td>
                        </tr>
                    <?php
                            }
                    ?>
                </table>
            </div>
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('.userinfo').click(function() {
                        var userid = $(this).data('id');
                        $.ajax({
                            url: 'ajaxfile.php',
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
                            <a class="btn btn-secondary" href="payments.php" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #########################    End of Modal    ####################################################-->
        </div>



<?php
    }
}
?>