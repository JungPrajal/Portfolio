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
            <h4 class="fw-bold py-3 mb-4"><a class="btn btn-primary btn-sm " href="create.php" role="button"> Add User</a></h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">Table Basic</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <!-- php -->
                    <?php

                    $select = "SELECT * FROM users";
                    $result = mysqli_query($con, $select);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['name']; ?></strong></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php
                            if ($row['role'] == 0) {
                              echo 'Admin';
                            } else if ($row['role'] == 2) {
                              echo 'Manager';
                            } else {
                              echo 'user';
                            }
                            ?>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="edit.php?id=<?php echo $row['id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="delete.php?id=<?php echo $row['id']; ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->
          </div>
          <!-- / Content -->
          <?php require('../layouts/footer.php'); ?>
        </div>
        <!-- / Content wrapper -->
      </div>
      <!-- / Layout container -->
    </div>
    <!-- / Layout wrapper -->
  </div>
  <!-- / Layout wrapper -->
</body>
<?php require('../layouts/footer-scripts.php'); ?>