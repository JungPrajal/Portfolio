<?php require('../layouts/header.php'); ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php require('../layouts/sidebar.php'); ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <?php require('../layouts/navbar.php'); ?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add/</span> Create Users</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
              <!-- Basic Layout -->
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create Users</h5>
                    <small class="text-muted float-end">Add Users</small>
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="basic-default-name" placeholder="Please enter your name" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="basic-default-company" placeholder="Enter your company name" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="Enter your email address" aria-describedby="basic-default-email2" />
                            <span class="input-group-text" id="basic-default-email2">@gmail.com</span>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                        <div class="col-sm-10">
                          <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="+977**********" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                        <div class="col-sm-10">
                          <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" aria-label="Leave your message here" aria-describedby="basic-icon-default-message2"></textarea>
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- / Content -->

          <?php require('../layouts/footer.php'); ?>