<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage features</span></h4>
                        
                        <!-- Add Feature Form -->
                        <div class="container my-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-sm">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                                            <h4 class="fw-bold mb-0">Add features</h4>
                                            <a class="btn btn-light btn-sm" href="index.php" role="button">Manage features</a>
                                        </div>
                                        <div class="card-body">
                                            <?php 
                                            if (isset($_POST['save'])) {
                                                $title = $_POST['title'];
                                                $description = $_POST['description'];
                                                $status = $_POST['status'];
                                                $icon = $_POST['icon'];  // Assuming  select an icon

                                                $query = "INSERT INTO features (title, description, icon, status) VALUES ('$title', '$description', '$icon', '$status')";
                                                $result = mysqli_query($con, $query);

                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Feature has been added successfully</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-warning'>Failed to add feature</div>";
                                                    header('Refresh:2; URL=create.php');
                                                }
                                            }
                                            ?>
                                            <form method="POST" action="">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="icon" class="form-label">Icon</label>
                                                    <textarea class="form-control" name="icon" id="icon" required>
                                                        
                                                        
                                                    </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="status" required>
                                                        <option value="">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="save">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Add Feature Form -->
                    </div>
                    <?php require('../layouts/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Add any other scripts here -->

</body>
