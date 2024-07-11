<?php require('../layouts/header.php'); ?>

<body>
<div class="container my-4">
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex align-items-center justify-content-between bg-primary text-white">
                    <h4 class="fw-bold mb-0">Add Slider</h4>
                    <a class="btn btn-light btn-sm" href="index.php" role="button">Manage Sliders</a>
                </div>
                <div class="card-body">
                    <?php 
                    if (isset($_POST['save'])) {
                        $title = $_POST['title'];
                        $description = $_POST['description'];
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
                                            $query = "INSERT INTO sliders (title, description, image, status) VALUES ('$title', '$description', '$finalfilename', '$status')";
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
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dataFile" class="form-label">Image</label>
                            <input type="file" class="form-control" id="dataFile" name="dataFile" required>
                        </div>
                        
                        <!-- Modal Body -->
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Image Gallery</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add block to fetch data -->
                                        <div class="row g-3">
                                            <?php
                                            $select = "SELECT * FROM sliders";
                                            $result = mysqli_query($con, $select);
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?> 
                                                <!-- loop -->
                                                <label class="col-lg-3 col-md-4 col-sm-6 text-center">
                                                    <input type="radio" name="image1" value="<?php echo '../uploads/' . $row['image']; ?>" class="d-none" />
                                                    <img src="<?php echo "../uploads/" . $row['image']; ?>" alt="" class="img-thumbnail">
                                                    <div><?php echo $i; ?></div>
                                                </label>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="firstFunction()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                        
                        
                        <button type="submit" class="btn btn-primary" name="save">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

