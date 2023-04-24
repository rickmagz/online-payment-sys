<?php 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Student Portal | GNHS PTA Online Payment System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css" />
    <link rel="stylesheet" href="assets/css/Montserrat.css" />
    <link rel="stylesheet" href="assets/css/Nunito.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    />
    <link rel="stylesheet" href="assets/css/Login-with-overlay-image.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>

  <body>
    <nav
      class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark"
      data-aos="fade"
      id="mainNav"
    >
      <div class="container">
        <a class="navbar-brand" href="#page-top"
          >GNHS | PTA Online Payment System</a
        ><button
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          class="navbar-toggler navbar-toggler-right"
          type="button"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto text-uppercase">
            <li class="nav-item"></li>
            <li class="nav-item"></li>
          </ul>
          <button class="btn btn-danger" type="submit">LOG OUT</button>
        </div>
      </div>
    </nav>
    <section>
      <section class="py-4 py-xl-5">
        <div class="container student-info">
          <div
            class="bg-light border rounded border-0 border-light d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5"
          >
            <div class="pb-2 pb-lg-1">
              <h2 class="fw-bold mb-2">Hi, {student_name}!</h2>
              <p class="fs-4 mb-0">LRN: {#}</p>
            </div>
          </div>
        </div>
        <section class="student-record">
          <div class="table-responsive student-table">
            <table class="table">
              <thead>
                <tr>
                  <th>Payment No.</th>
                  <th>Grade Level</th>
                  <th>Date</th>
                  <th>Mode of Payment</th>
                  <th>Reference No.</th>
                  <th>Proof of Payment</th>
                  <th>Amount Paid</th>
                  <th>Remarks</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Cell 1</td>
                  <td>Cell 2</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 8</td>
                  <td>Cell 8</td>
                </tr>
                <tr>
                  <td>Cell 3</td>
                  <td>Cell 4</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 3</td>
                  <td>Cell 8</td>
                  <td>Cell 8</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </section>
    </section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-5">
            <span class="copyright"
              >©2023 GNHS PTA Online Payment System&nbsp;</span
            >
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
