



<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Hero</span></h4>
                        
                        <!-- Add Slider Form -->
                        <div class="container my-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-sm">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                                            <h4 class="fw-bold mb-0">Add hero</h4>
                                            <a class="btn btn-light btn-sm" href="index.php" role="button">Manage Hero</a>
                                        </div>
                                        <div class="card-body">
                                            <?php 
                                            if (isset($_POST['save'])) {
                                                $title = $_POST['title'];
                                                $sub_title = $_POST['sub_title'];
                                                $status = $_POST['status'];

                                                if (isset($_FILES['dataFile'])) {
                                                    $filename = $_FILES['dataFile']['name'];
                                                    $filesize = $_FILES['dataFile']['size'];
                                                    $filetmp = $_FILES['dataFile']['tmp_name'];

                                                    $explode = explode('.', $filename);
                                                    if (count($explode) === 2) {
                                                        $firstname = strtolower($explode[0]);
                                                        $ext = strtolower($explode[1]);
                                                        $rep = str_replace(' ', '', $firstname);
                                                        $finalfilename = $rep . time() . '.' . $ext;

                                                        if ($filesize <= 2 * 1024 * 1024) {
                                                            if ($ext == "jpg" || $ext == "png") {
                                                                if (move_uploaded_file($filetmp, '../uploads/' . $finalfilename)) {
                                                                    $query = "INSERT INTO hero (title, sub_title, image, status) VALUES ('$title', '$sub_title', '$finalfilename', '$status')";
                                                                    $result = mysqli_query($con, $query);

                                                                    if ($result) {
                                                                        echo "<div class='alert alert-success'>Files are Submitted</div>";
                                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                                    } else {
                                                                        echo "<div class='alert alert-warning'>Files are not submitted</div>";
                                                                        header('Refresh:2; URL=create.php');
                                                                    }
                                                                } else {
                                                                    echo "<div class='alert alert-danger'>Failed to move uploaded file</div>";
                                                                }
                                                            } else {
                                                                echo "<div class='alert alert-danger'>File extension does not match</div>";
                                                                header('Refresh:2; URL=create.php');
                                                            }
                                                        } else {
                                                            echo "<div class='alert alert-danger'>File size must be less than 2MB</div>";
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="sub_title" class="form-label">sub_title</label>
                                                    <textarea class="form-control" name="sub_title" id="sub_title" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dataFile" class="form-label">Image</label>
                                                    <input type="file" class="form-control" id="dataFile" name="dataFile" required>
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
                        <!-- End Add Slider Form -->
                    </div>
                    <?php require('../layouts/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>

