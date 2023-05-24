<?php
session_start();
include 'db_connect.php';

$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$lrn = $_SESSION['lrn_id'];

$get_gradelevel = mysqli_query($cxn, "SELECT * FROM student WHERE lrn_id='$lrn'") or die("Error in query: $get_gradelevel." . mysqli_error($cxn));

if (mysqli_num_rows($get_gradelevel) > 0) {
  $g = mysqli_fetch_assoc($get_gradelevel);
  $glevel = $g['grade_level'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Payment | GNHS PTA Online Payment System</title>
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
      <a class="navbar-brand" href="student-portal.php">GNHS | PTA Online Payment System</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
  <main style="margin-top: 45px">
    <section class="py-5">
      <div class="container-fluid">
        <a class="btn btn-link link-primary mb-3" role="button" href="services.html"></a>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h3 class="text-dark mb-0">PTA Payment for <?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?> (LRN: <?php echo $_SESSION['lrn_id']; ?>)</h3>
        </div>
        <form action="payment-portal.php" method="post">
          <div class="card shadow mb-3">
            <div class="card-header py-3">
              <p class="text-primary m-0 fw-bold">
                <span style="color: rgb(0, 0, 0)">Fill in the required fields *</span>
              </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 offset-md-1 offset-lg-2 offset-xl-2">
                <div class="mb-3">
                    <label class="form-label" for="service_price"><strong>Amount *</strong><br /></label><input class="form-control" type="text" id="service_price" placeholder="P000" required="" name="amount_paid" />
                  </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="service_price"><strong>Reference No. / Receipt No.*</strong><br /></label><input class="form-control" type="text" id="service_price-1" placeholder="***********" required="" name="refno" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 offset-md-1 offset-lg-2 offset-xl-2">
                  <div class="mb-3">
                    <label class="form-label" for="service_price"><strong>Payment Method *</strong><br /></label><select class="form-select" required="" name="payment_method">
                      <optgroup label="Select Payment Method">
                        <option value="GCash" selected="">GCash</option>
                        <option value="Palawan Express">Palawan Express</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
               
              </div>
              
              <div class="col-md-10 col-lg-2 col-xl-2 offset-md-1 offset-lg-2 offset-xl-2" style="margin-top: 20px">
                <label class="form-label" for="service_price"><br /></label>
                <input class="btn btn-info" type="submit" name="submit" value="Next">
                <a href="student-portal.php" class="btn btn-danger" role="button">Cancel</a>
              </div>
            </div>
          </div>
      </div>
      </form>
      </div>
    </section>
  </main>


  <?php
  if (isset($_POST['submit'])) {
    $grade_level = $glevel;
    $amount_paid = $_POST['amount_paid'];
    $payment_method = $_POST['payment_method'];
    $refno = $_POST['refno'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $lrn = $_SESSION['lrn_id'];

    $check_refno = mysqli_query($cxn, "SELECT * FROM payments WHERE ref_no='$refno'") or die("Error in query: $check_refno." . mysqli_error($cxn));

    if ($check_refno->num_rows == 1) {
      echo "<script type='text/javascript'> alert('Reference Number exists!'); location.href='payment-portal.php'; </script>";
    } else {
      $query = mysqli_query($cxn, "INSERT INTO payments (lrn,first_name,last_name,grade_level,amount_paid,payment_method,ref_no,remarks) VALUES('$lrn','$first_name','$last_name','$grade_level','$amount_paid','$payment_method','$refno','PENDING')") or die("Error in query: $query." . mysqli_error($cxn));
      echo "<script type='text/javascript'> alert('Click OK to upload Proof of Payment.'); location.href = 'proof_of_payment.php'; </script>";
    }
  }
  ?>
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