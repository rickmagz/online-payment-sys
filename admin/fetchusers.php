<?php
sleep(1);
include 'db_connect.php';

if (isset($_POST['request'])) {
    $request = $_POST['request'];
    if ($request == 'Admin') {
            $query = mysqli_query($cxn, "SELECT * FROM users WHERE access_level='Admin'");
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
                                    <th>Username</th>
                                    <th>ID No.</th>
                                    <th>Access Level</th>
                                    <th>Added by</th>
                                    <th>Added on</th>
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
                                while ($u = mysqli_fetch_assoc($query)) {
                                    $id = $u['id'];
                                    $t_id = $u['teacher_id'];
                                    $first_name = $u['first_name'];
                                    $last_name = $u['last_name'];
                                    $username = $u['username'];
                                    $added_by = $u['added_by'];
                                    $added = strtotime($u['added_on']);
                                    $added_on = date("F d, Y; h:i A", $added);
                                    $access_level = $u['access_level'];
                                ?>
                            </tbody>
                            <tr class="user<?php echo $id ?>">
                                <td><?php echo $first_name; ?></td>
                                <td><?php echo $last_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $t_id; ?></td>
                                <td><?php echo $access_level; ?></td>
                                <td><?php echo $added_by; ?></td>
                                <td><?php echo $added_on; ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm modifybtn" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                                    <a type="button" class="btn btn-danger btn-sm" href="deleteuser.php?id=<?php echo $id; ?>">Delete</a>
                                </td>
                            </tr>

                        <?php
                                }
                            
                        ?>
                    </table>
                </div>
            </div>
<?php
    }elseif($request == 'Teacher'){
        $query = mysqli_query($cxn, "SELECT * FROM users WHERE access_level='Teacher'");
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
                    <th>Username</th>
                    <th>ID No.</th>
                    <th>Access Level</th>
                    <th>Added by</th>
                    <th>Added on</th>
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
                while ($u = mysqli_fetch_assoc($query)) {
                    $id = $u['id'];
                    $t_id = $u['teacher_id'];
                    $first_name = $u['first_name'];
                    $last_name = $u['last_name'];
                    $username = $u['username'];
                    $added_by = $u['added_by'];
                    $added = strtotime($u['added_on']);
                    $added_on = date("F d, Y; h:i A", $added);
                    $access_level = $u['access_level'];
                ?>
            </tbody>
            <tr class="user<?php echo $id ?>">
                <td><?php echo $first_name; ?></td>
                <td><?php echo $last_name; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $t_id; ?></td>
                <td><?php echo $access_level; ?></td>
                <td><?php echo $added_by; ?></td>
                <td><?php echo $added_on; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm modifybtn" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                    <a type="button" class="btn btn-danger btn-sm" href="deleteuser.php?id=<?php echo $id; ?>">Delete</a>
                </td>
            </tr>

        <?php
                }
        ?>
    </table>
</div>
</div>
<?php
    }elseif($request == 'Last Name'){
        $query = mysqli_query($cxn, "SELECT * FROM users ORDER BY last_name asc");
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
                    <th>Username</th>
                    <th>ID No.</th>
                    <th>Access Level</th>
                    <th>Added by</th>
                    <th>Added on</th>
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
                while ($u = mysqli_fetch_assoc($query)) {
                    $id = $u['id'];
                    $t_id = $u['teacher_id'];
                    $first_name = $u['first_name'];
                    $last_name = $u['last_name'];
                    $username = $u['username'];
                    $added_by = $u['added_by'];
                    $added = strtotime($u['added_on']);
                    $added_on = date("F d, Y; h:i A", $added);
                    $access_level = $u['access_level'];
                ?>
            </tbody>
            <tr class="user<?php echo $id ?>">
                <td><?php echo $first_name; ?></td>
                <td><?php echo $last_name; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $t_id; ?></td>
                <td><?php echo $access_level; ?></td>
                <td><?php echo $added_by; ?></td>
                <td><?php echo $added_on; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm modifybtn" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                    <a type="button" class="btn btn-danger btn-sm" href="deleteuser.php?id=<?php echo $id; ?>">Delete</a>
                </td>
            </tr>

        <?php
                }
        ?>
    </table>
</div>
</div>
<?php
    }elseif($request == 'Registration Date'){
        $query = mysqli_query($cxn, "SELECT * FROM users ORDER BY added_on desc");
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
                    <th>Username</th>
                    <th>ID No.</th>
                    <th>Access Level</th>
                    <th>Added by</th>
                    <th>Added on</th>
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
                while ($u = mysqli_fetch_assoc($query)) {
                    $id = $u['id'];
                    $t_id = $u['teacher_id'];
                    $first_name = $u['first_name'];
                    $last_name = $u['last_name'];
                    $username = $u['username'];
                    $added_by = $u['added_by'];
                    $added = strtotime($u['added_on']);
                    $added_on = date("F d, Y; h:i A", $added);
                    $access_level = $u['access_level'];
                ?>
            </tbody>
            <tr class="user<?php echo $id ?>">
                <td><?php echo $first_name; ?></td>
                <td><?php echo $last_name; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $t_id; ?></td>
                <td><?php echo $access_level; ?></td>
                <td><?php echo $added_by; ?></td>
                <td><?php echo $added_on; ?></td>
                <td>
                    <button class="btn btn-primary btn-sm modifybtn" type="button" data-toggle="modal" data-target="#modifybtn">Modify</button>&emsp13;
                    <a type="button" class="btn btn-danger btn-sm" href="deleteuser.php?id=<?php echo $id; ?>">Delete</a>
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