<?php
session_start();
include 'db_connect.php';

$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$lrn = $_SESSION['lrn_id'];
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Student Portal | GNHS PTA Online Payment System</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/Kaushan%20Script.css" />
  <link rel="stylesheet" href="assets/css/Montserrat.css" />
  <link rel="stylesheet" href="assets/css/Nunito.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" data-aos="fade" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top">GNHS | PTA Online Payment System</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto text-uppercase">
          <li class="nav-item"></li>
          <li class="nav-item"></li>
        </ul>
        <form action="index.php" method="POST">
          <input class="btn btn-danger" type="submit" name="logout" value="Log Out">
          <?php
          if (isset($_POST['logout'])) {
            session_destroy();
          }
          ?>
        </form>
      </div>
    </div>
  </nav>
  <section>
    <section class="py-4 py-xl-5">
      <div class="container student-info">
        <div class="bg-light border rounded border-0 border-light d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5">
          <div class="pb-2 pb-lg-1">
            <h2 class="fw-bold mb-2">Hi, <?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?>!</h2>
            <p class="fs-4 mb-0">LRN: <?php echo $_SESSION['lrn_id']; ?></p>
            <p class="fs-4 mb-0"><a href="payment-portal.php" class="btn btn-info" role="button">Process your payment here!</a></p>
          </div>
        </div>
        <section class="student-record">
          <h2 class="fs-4 mb-0">Payment History</h2>
          <div class="table-responsive student-table">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Reference No.</th>
                  <th>Amount Paid</th>
                  <th>Mode of Payment</th>
                  <th>Date of Payment</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $payment = mysqli_query($cxn, "SELECT * FROM payments WHERE lrn='$lrn' ORDER BY uploaded_on asc");
                $payment_query = mysqli_num_rows($payment);

                if ($payment_query > 0) {
                  $i = 0;
                  while ($p = mysqli_fetch_assoc($payment)) {
                    $id = $p['id'];
                    $ref_no = $p['ref_no'];
                    $amount = $p['amount_paid'];
                    $payment_method = $p['payment_method'];
                    $date = strtotime($p['uploaded_on']);
                    $pay_date = date("F d, Y; h:i A", $date);
                    $remarks = $p['remarks'];


                ?>
                    <tr>
                      <td><?php echo $ref_no; ?></td>
                      <td><?php echo $amount; ?></td>
                      <td><?php echo $payment_method; ?></td>
                      <td><?php echo $pay_date; ?></td>
                      <td>
                        <a class="btn btn-info btn-sm text-decoration-none text-reset" href="viewreceipt.php?id=<?php echo $ref_no;?>" target="_blank">View Receipt</a>
                      </td>
                    </tr>

                <?php
                    $i++;
                  }
                } else {
                  echo "<tr>
                            <td colspan='6'>No record found.</td>
                        </tr>";
                };

                ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>

    </section>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-lg-5">
          <span class="copyright">©2023 GNHS PTA Online Payment System&nbsp;</span>
        </div>
        <div class="col-md-3 offset-md-4 offset-lg-3 offset-xl-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item"></li>
            <li class="list-inline-item">
              <a href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="list-inline-item"></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="assets/js/bs-init.js"></script>
  <script src="assets/js/agency.js"></script>
  <script src="assets/js/Bootstrap-4---Payment-Form.js"></script>
</body>

</html>