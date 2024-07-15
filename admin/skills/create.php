<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage skills</span></h4>

                       <!-- Add Slider Form -->
                       <div class="container my-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-sm">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                                            <h4 class="fw-bold mb-0">Add skills</h4>
                                            <a class="btn btn-light btn-sm" href="edit.php" role="button">Manage Skills</a>
                                        </div>
                                        <div class="card-body">
                                            <?php 
                                            if (isset($_POST['save'])) {
                                                $title = $_POST['title'];
                                                $description = $_POST['description'];
                                                $status = $_POST['status'];

                                                              
                                             $query = "INSERT INTO skills (title, description, status) VALUES ('$title', '$description',  '$status')";
                                                                    $result = mysqli_query($con, $query);

                                                                    if ($result) {
                                                                        echo "<div class='alert alert-success'>Skills are Submitted</div>";
                                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                                    } else {
                                                                        echo "<div class='alert alert-warning'>Skills are not submitted</div>";
                                                                        header('Refresh:2; URL=create.php');
                                                                    }
                                                                
                                                                }
                                                            
                                                
                                            
                                            ?>
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="status" required>
                                                        <option value="">Select Status</option>
                                                        <option value="0">Active</option>
                                                        <option value="1">Inactive</option>
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
                    <?php require('../layouts/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>
