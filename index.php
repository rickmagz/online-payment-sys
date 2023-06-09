<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Home | GNHS PTA Online Payment System</title>
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

  <body
    id="page-top"
    data-bs-spy="scroll"
    data-bs-target="#mainNav"
    data-bs-offset="54"
  >
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
            <li class="nav-item">
              <a class="nav-link" href="index.php">home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">how to pay</a>
            </li>
          </ul>
          <a class="btn btn-primary" role="button" href="login.php">PAY NOW</a>
        </div>
      </div>
    </nav>
    <header
      class="masthead"
      style="background-image: url('assets/img/header-bg.jpg')"
    >
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">
            <span>Welcome to PTA Online Payment</span>
          </div>
          <div class="intro-heading text-uppercase">
            <span>Paying your fees has <br />never been easy!</span>
          </div>
          <a
            class="btn btn-primary btn-xl text-uppercase"
            role="button"
            href="#services"
            >Tell mE more</a
          >
        </div>
      </div>
    </header>
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="text-uppercase section-heading">how to pay</h2>
            <h3 class="text-muted section-subheading">
              Easy payments at the tip of your hands.
            </h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x"
              ><i class="fa fa-circle fa-stack-2x text-primary"></i
              ><i class="fa fa-user fa-stack-1x fa-inverse"></i
            ></span>
            <h4 class="section-heading">Click or tap "Pay Now"</h4>
            <p class="text-muted">
              Use your student credentials such as<br />username and password to
              start paying.
            </p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x"
              ><i class="fa fa-circle fa-stack-2x text-primary"></i
              ><i class="fa fa-money fa-stack-1x fa-inverse"></i
            ></span>
            <h4 class="section-heading">Pick your Payment Method</h4>
            <p class="text-muted">
              Specify your mode of payment such paying upfront in Accounting,
              via GCash or OTC Payment Centers.
            </p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x"
              ><i class="fa fa-circle fa-stack-2x text-primary"></i
              ><i class="fa fa-file-image-o fa-stack-1x fa-inverse"></i
            ></span>
            <h4 class="section-heading">Attach an image</h4>
            <p class="text-muted">
              Upload an image of the receipt or a screenshot of the payment that
              you have made.
            </p>
          </div>
        </div>
      </div>
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
