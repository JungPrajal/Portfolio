<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit Hero</span></h4>

                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <?php
                                        // PHP code goes here
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM hero WHERE id = '$id'";
                                            $select_result = mysqli_query($con, $sql);
                                            $data = mysqli_fetch_assoc($select_result);
                                        }

                                        if (isset($_POST['save'])) {
                                            $title = $_POST['title'];
                                            $sub_title = $_POST['sub_title'];

                                            $file = $_FILES['image']['name'];
                                            $file_size = $_FILES['image']['size'];

                                            $status = $_POST['status'];

                                            if ($title !== "" && $sub_title !== "" && $status !== "") {
                                                if ($file !== "") {
                                                    if ($file_size <= 2 * 1024 * 1024) {
                                                        $explode = explode('.', $file);
                                                        $extlink = strtolower(end($explode));
                                                        $replace = str_replace(' ', '', $file);
                                                        $finalname = $replace . time() . '.' . $extlink;
                                                        $target_file = '../uploads/' . $finalname;

                                                        if (in_array($extlink, ['jpg', 'png', 'jpeg'])) {
                                                            $oldfilelink = $data['image'];
                                                            if ($oldfilelink != '' && file_exists('../uploads/' . $oldfilelink)) {
                                                                unlink('../uploads/' . $oldfilelink);
                                                            }

                                                            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                                                                $query = "UPDATE hero SET title='$title', sub_title='$sub_title', image='$finalname', status='$status', updated_at=NOW() WHERE id=$id";
                                                                $result = mysqli_query($con, $query);
                                                                if ($result) {
                                                                    echo "<div class='alert alert-success'>File uploaded and name updated successfully.</div>";
                                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                                } else {
                                                                    echo "<div class='alert alert-danger'>File is not uploaded.</div>";
                                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                                }
                                                            } else {
                                                                echo "<div class='alert alert-danger'>File upload failed.</div>";
                                                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                            }
                                                        } else {
                                                            echo "<div class='alert alert-danger'>Invalid file type. Only JPG, PNG, and JPEG are allowed.</div>";
                                                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                        }
                                                    } else {
                                                        echo "<div class='alert alert-danger'>File size exceeds 2MB.</div>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                    }
                                                } else {
                                                    $query = "UPDATE hero SET title='$title', sub_title='$sub_title', status='$status', updated_at=NOW() WHERE id=$id";
                                                    $result = mysqli_query($con, $query);
                                                    if ($result) {
                                                        echo "<div class='alert alert-success'>Slider updated successfully.</div>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                    } else {
                                                        echo "<div class='alert alert-danger'>Failed to update slider.</div>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                    }
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>Please fill all the fields.</div>";
                                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                            }
                                        }
                                        ?>

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label" for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>" required>
                                            </div> 
                                            <div class="mb-3">
                                                <label class="form-label" for="sub_title">sub_title</label>
                                                <textarea class="form-control" id="sub_title" name="sub_title" required><?php echo $data['sub_title']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="image">Image</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="1" <?php echo $data['status'] == '1' ? 'selected' : ''; ?>>Active</option>
                                                    <option value="0" <?php echo $data['status'] == '0' ? 'selected' : ''; ?>>Inactive</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('../layouts/footer.php'); ?>
</body>

</html>
