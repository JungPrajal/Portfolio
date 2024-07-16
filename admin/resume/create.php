<?php require('../layouts/header.php'); ?>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php require('../layouts/sidebar.php'); ?>
      <div class="layout-page">
        <?php require('../layouts/navbar.php'); ?>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Manage Resume Category /</span> Add Resume
            </h4>

            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                <h4 class="fw-bold mb-0">Add Resume</h4>
                <a class="btn btn-light btn-sm" href="index.php" role="button">Manage Resume</a>
              </div>
              <div class="card-body">
                <?php 
                if (isset($_POST['save'])) {
                  $resume_category_id = $_POST['resume_category_id'];
                  $title = $_POST['title'];
                  $description = $_POST['description'];
                  $start_date = $_POST['start_date'];
                  $end_date = $_POST['end_date'];
                  $address = $_POST['address'];
                  $status = $_POST['status'];

                  $query = "INSERT INTO resume (resume_category_id, title, description, start_date, end_date, address, status) 
                            VALUES ('$resume_category_id', '$title', '$description', '$start_date', '$end_date', '$address', '$status')";
                  $result = mysqli_query($con, $query);

                  if ($result) {
                    echo "<div class='alert alert-success'>Resume is Submitted</div>";
                    echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
                  } else {
                    echo "<div class='alert alert-warning'>Resume is not submitted</div>";
                    echo "<script>setTimeout(function(){ window.location.href = 'create.php'; }, 2000);</script>";
                  }
                }
                ?>
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="resume_category_id" class="form-label">Resume Category</label>
                    <select class="form-control" id="resume_category_id" name="resume_category_id" required>
                      <option value="">Select Category</option>
                      <?php
                      $category_query = "SELECT id, title FROM resume_category";
                      $category_result = mysqli_query($con, $category_query);
                      while ($row = mysqli_fetch_assoc($category_result)) {
                        echo "<option value='{$row['id']}'>{$row['title']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" required>
                  </div>
                  <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" required>
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status" required>
                      <option value="">Select Status</option>
                      <option value="Active">1</option>
                      <option value="Inactive">0</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary" name="save">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php require('../layouts/footer.php'); ?>
</html>
