<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage settings</span></h4>

                       <!-- Add Slider Form -->
                       <div class="container my-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-sm">    
                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                                            <h4 class="fw-bold mb-0">Add settings</h4>
                                            <a class="btn btn-light btn-sm" href="edit.php" role="button">Manage settings</a>
                                        </div>
                                        <div class="card-body">
                                            <?php 
                                            if (isset($_POST['save'])) {
                                                $site_key = $_POST['site_key'];
                                                $site_value = $_POST['site_value'];
                                                $status = $_POST['status'];

                                                              
                                             $query = "INSERT INTO settings (site_key, site_value, status) VALUES ('$site_key', '$site_value',  '$status')";
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
                                                    <label for="title" class="form-label">site_key</label>
                                                    <input type="text" class="form-control" id="site_key" name="site_key" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="site_value" class="form-label">$site_value</label>
                                                    <textarea class="form-control" name="site_value" id="site value" rows="3" required></textarea>
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
                    <?php require('../layouts/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
