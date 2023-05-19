<?php
include "db_connect.php";

$userid = $_POST['userid'];

$sql = "SELECT * FROM payments where id=" . $userid;
$result = mysqli_query($cxn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
    <table border='0' width='100%'>
        <tr>
            <td><img src="../proof/<?php echo $row['proof_of_payment']; ?>" height="250px" width="250px;">
        </tr>
    </table>

<?php } ?>