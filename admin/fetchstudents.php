<?php
sleep(1);
include 'db_connect.php';

if (isset($_POST['request'])) {
    $request = $_POST['request'];
    if ($request == 'Grade Level') {
        $query = mysqli_query($cxn, "SELECT * FROM student ORDER BY grade_level");
        $count = mysqli_num_rows($query);
?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table" id="dataTable">
                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Grade Level</th>
                                <th>LRN</th>
                                <th>E-mail Address</th>
                                <th>Registration Date</th>
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
                            while ($s = mysqli_fetch_array($query)) {
                                $id = $s['id'];
                                $lrn = $s['lrn_id'];
                                $first_name = $s['first_name'];
                                $last_name = $s['last_name'];
                                $email = $s['email'];
                                $reg_date = strtotime($s['date_created']);
                                $date_reg = date("F d, Y; h:i A", $reg_date);
                                $grade_level = $s['grade_level'];

                            ?>
                        </tbody>
                        <tr class="student<?php echo $id ?>">
                            <td><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $lrn; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $date_reg; ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm modifybtn" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                                <a type="button" class="btn btn-danger btn-sm" href="deletestudent.php?id=<?php echo $id; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                            }

                    ?>
                </table>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.modifybtn').on('click', function() {
                    $('#modifybtn').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#id').val(data[0]);
                    $('#first_name').val(data[1]);
                    $('#last_name').val(data[2]);
                    $('#grade_level').val(data[3]);
                    $('#lrn').val(data[4]);
                    $('#email').val(data[5]);
                });
            });
        </script>
    <?php
    } elseif ($request == 'Last Name') {
        $query = mysqli_query($cxn, "SELECT * FROM student ORDER BY last_name asc");
        $count = mysqli_num_rows($query);
    ?>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table" id="dataTable">
                    <?php
                    if ($count) {

                    ?>
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Grade Level</th>
                                <th>LRN</th>
                                <th>E-mail Address</th>
                                <th>Registration Date</th>
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
                            while ($s = mysqli_fetch_array($query)) {
                                $id = $s['id'];
                                $lrn = $s['lrn_id'];
                                $first_name = $s['first_name'];
                                $last_name = $s['last_name'];
                                $email = $s['email'];
                                $reg_date = strtotime($s['date_created']);
                                $date_reg = date("F d, Y; h:i A", $reg_date);
                                $grade_level = $s['grade_level'];
                            ?>
                        </tbody>
                        <tr class="student<?php echo $id ?>">
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $grade_level; ?></td>
                            <td><?php echo $lrn; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $date_reg; ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm modifybtn" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                                <a type="button" class="btn btn-danger btn-sm" href="deletestudent.php?id=<?php echo $id; ?>">Delete</a>
                            </td>
                        </tr>

                    <?php
                            }
                    ?>
                </table>
            </div>
        </div>
<?php
    }
}
?>