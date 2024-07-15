<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit Skills</span></h4>

                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM skills WHERE id = '$id'";
                                            $select_result = mysqli_query($con, $sql);
                                            $data = mysqli_fetch_assoc($select_result);
                                        }

                                        if (isset($_POST['save'])) {
                                            $title = $_POST['title'];
                                            $description = $_POST['description'];
                                            $status = $_POST['status'];

                                            if ($title !== "" && $description !== "" && $status !== "") {
                                                $query = "UPDATE skills SET title='$title', description='$description', status='$status' WHERE id=$id";
                                                $result = mysqli_query($con, $query);
                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Skills updated successfully.</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Failed to update skills.</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
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
                                                <label class="form-label" for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" required><?php echo $data['description']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="1" <?php echo $data['status'] == '0' ? 'selected' : ''; ?>>Active</option>
                                                    <option value="0" <?php echo $data['status'] == '1' ? 'selected' : ''; ?>>Inactive</option>
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

