<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit Settings</span></h4>

                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM settings WHERE id = '$id'";
                                            $select_result = mysqli_query($con, $sql);
                                            $data = mysqli_fetch_assoc($select_result);
                                        }

                                        if (isset($_POST['save'])) {
                                            $site_key = $_POST['site_key'];
                                            $site_value = $_POST['site_value'];
                                            $status = $_POST['status'];

                                            if ($site_key !== "" && $site_value !== "" && $status !== "") {
                                                $query = "UPDATE settings SET site_key='$site_key', site_value='$site_value', status='$status' WHERE id=$id";
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
                                                <label class="form-label" for="site_key">site_key</label>
                                                <input type="text" class="form-control" id="site_key" name="site_key" value="<?php echo $data['site_key']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="site_value">site_value</label>
                                                <textarea class="form-control" id="site_value" name="site_value" required><?php echo $data['site_value']; ?></textarea>
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

