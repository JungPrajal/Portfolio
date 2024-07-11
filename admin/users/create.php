<?php require('../layouts/header.php'); ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php require('../layouts/sidebar.php'); ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">6
        <!-- Navbar -->

        <?php require('../layouts/navbar.php'); ?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><a class="btn btn-primary btn-sm" href="index.php" role="button"> Manage User</a></h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
              <!-- Basic Layout -->
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Create Users</h5>
                    <!-- <small class="text-muted float-end">Add Users</small> -->
                  </div>
                  <div class="card-body">

                    <!-- php -->
                    <?php
                    if (isset($_POST['save'])) {
                      $name = $_POST['name'];
                      $username = $_POST['username'];
                      $address = $_POST['address'];
                      $phone = $_POST['phone'];
                      $email = $_POST['email'];
                      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                      $role = $_POST['role'];

                      if ($name !== "" && $username !== "" && $address !== "" && $phone !== "" && $email !== "" && $password !== "" && $role !== "") {
                        $query = "INSERT INTO users (name, username, address, phone, email, password, role) VALUES ('$name', '$username', '$address', '$phone', '$email', '$password', '$role')";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                          echo "<p class='text-success'>Data are Submitted</p>";
                          echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                        } else {
                          echo "<p class='text-warning'>Data are not submitted</p>";
                          header('Refresh:2; URL=create.php');
                        }
                      } else {
                        echo "<p class='text-danger'>Please fill all fields</p>";
                        header('Refresh:2; URL=create.php');
                      }
                    }
                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="basic-default-name" placeholder="Please enter your name" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-username">Username</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" class="form-control" id="basic-default-username" placeholder="Enter your username" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-address">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="address" class="form-control" id="basic-default-address" placeholder="Enter your address" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <input type="text" id="basic-default-email" name="email" class="form-control" placeholder="" aria-label="Enter your email address" aria-describedby="basic-default-email2" />
                            <span class="input-group-text" id="basic-default-email2">@gmail.com</span>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                      
                      <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <select class="form-select" id="country-code" aria-label="Country code" onchange="updatePhoneNumber()">
                            <option value="+977" selected>+977 (Nepal)</option> 
                            <option value="+86">+86 (China)</option>
                            <option value="+44">+44 (UK)</option>
                            <option value="+1">+1 (USA)</option>
                            <option value="+91">+91 (India)</option>
                          </select>
                          <input type="text" id="basic-default-phone" name="phone" class="form-control phone-mask" placeholder="Phone number" aria-label="Phone number" pattern="\d{10}" title="Phone number must have exactly 10 digits." />
                        </div>
                        <div class="form-text">Phone number must have exactly 10 digits after the country code.</div>
                      </div> 


                      </div>



                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-password">Password</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <input type="password" class="form-control" name="password" id="basic-default-password" placeholder="Enter your Password" />
                            <span class="input-group-text">
                              <i class="fa fa-eye" id="toggle-password" style="cursor: pointer;"></i>
                            </span>
                          </div>
                          <div class="form-text">Password needs to be more than eight characters and include uppercase letters, lowercase letters, numbers, and symbols.</div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-role">Role</label>
                        <div class="col-sm-10">
                          <select class="form-select" name="role" id="basic-default-role" aria-label="Default select example">
                            <option selected>Select Role</option>
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                            <option value="2">Manager</option>
                          </select>
                        </div>
                      </div>

                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" name="save" class="btn btn-primary">Send</button>
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
          <!-- Link to the external JavaScript file -->
          <script src="admin/js/validation.js"></script>
          <script src="admin/js/phone_number.js"></script>
          
          
        </div>
      </div>
    </div>
  </div>
</body>

