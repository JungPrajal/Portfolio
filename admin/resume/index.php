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
            <h4 class="fw-bold py-3 mb-4">
              <a class="btn btn-primary btn-sm" href="create.php" role="button">Create Resume</a>
            </h4>

            <div class="card">
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Resume Category Title</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    // Assuming $con is properly initialized
                    $query = "SELECT resume.*, resume_category.title AS resume_category_title 
                              FROM resume 
                              INNER JOIN resume_category 
                              ON resume.resume_category_id = resume_category.id";
                    $result = mysqli_query($con, $query);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['resume_category_title']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo ($row['status'] == 0) ? 'Active' : 'Inactive'; ?></td>
                        <td>
                          <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $row['id']; ?>" role="button">Edit</a>
                          <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this data?')" href="delete.php?id=<?php echo $row['id']; ?>" role="button">Delete</a>
                        </td>
                      </tr>
                    <?php
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- / Content -->
        </div>
        <!-- / Content wrapper -->
      </div>
      <!-- / Layout container -->
    </div>
  </div>
  <!-- / Layout wrapper -->

  <?php require('../layouts/footer.php'); ?>

