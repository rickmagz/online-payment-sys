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
    <title>Payment | GNHS PTA Online Payment System</title>
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
    <main style="margin-top: 45px">
      <section class="py-5">
        <div class="container-fluid">
          <a
            class="btn btn-link link-primary mb-3"
            role="button"
            href="services.html"
          ></a>
          <div
            class="d-sm-flex justify-content-between align-items-center mb-4"
          >
            <h3 class="text-dark mb-0">Payment</h3>
          </div>
          <form>
            <div class="card shadow mb-3">
              <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">
                  <span style="color: rgb(0, 0, 0)"
                    >Fill in the required fields *</span
                  >
                </p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div
                    class="col-sm-12 col-md-5 col-lg-4 col-xl-4 offset-md-1 offset-lg-2 offset-xl-2"
                  >
                    <div class="mb-3">
                      <label class="form-label" for="service_price"
                        ><strong>Grade Level*</strong><br /></label
                      ><select class="form-select" required="">
                        <optgroup label="Select Grade Level">
                          <option value="grade7" selected="">Grade 7</option>
                          <option value="grade8">Grade 8</option>
                          <option value="grade9">Grade 9</option>
                          <option value="grade10">Grade 10</option>
                          <option value="grade11">Grade 11</option>
                          <option value="grade12">Grade 12</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-5 col-lg-4">
                    <div class="mb-3">
                      <label class="form-label" for="service_price"
                        ><strong>Amount *</strong><br /></label
                      ><input
                        class="form-control"
                        type="text"
                        id="service_price"
                        placeholder="P000"
                        required=""
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div
                    class="col-sm-12 col-md-5 col-lg-4 col-xl-4 offset-md-1 offset-lg-2 offset-xl-2"
                  >
                    <div class="mb-3">
                      <label class="form-label" for="service_price"
                        ><strong>Payment Method *</strong><br /></label
                      ><select class="form-select" required="">
                        <optgroup label="Select Payment Method">
                          <option value="gcash" selected="">GCash</option>
                          <option value="palawanexpress">
                            Palawan Express
                          </option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-5 col-lg-4">
                    <div class="mb-3">
                      <label class="form-label" for="service_price"
                        ><strong>Reference No. / Receipt No.*</strong
                        ><br /></label
                      ><input
                        class="form-control"
                        type="text"
                        id="service_price-1"
                        placeholder="***********"
                        required=""
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div
                    class="col-md-10 col-lg-8 col-xl-8 offset-md-1 offset-lg-2 offset-xl-2"
                  >
                    <label class="form-label" for="service_price"
                      ><strong>Proof of Payment *</strong><br /></label
                    ><input
                      class="form-control"
                      type="file"
                      required=""
                      accept="image/*"
                    />
                  </div>
                  <div
                    class="col-md-10 col-lg-2 col-xl-2 offset-md-1 offset-lg-2 offset-xl-2"
                    style="margin-top: 20px"
                  >
                    <label class="form-label" for="service_price"><br /></label
                    ><button class="btn btn-primary" type="button">
                      Submit
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </main>
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
