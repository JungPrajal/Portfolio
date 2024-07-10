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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add/</span> Create Users</h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Create Users</h5>
                                        <small class="text-muted float-end">Add Users</small>
                                    </div>
                                    <div class="card-body">

                                        <!-- php -->
                                        <?php

                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM users WHERE id = '$id'";
                                            $result = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                        }


                                        if (isset($_POST['save'])) {
                                            $name = $_POST['name'];
                                            $email = $_POST['username'];

                                            $address = $_POST['address'];
                                            $phone = $_POST['phone'];
                                            $email = $_POST['email'];

                                            $role = $_POST['role'];


                                            if ($name !== "" && $username !== "" && $address !== "" && $phone !== "" && $email !== "" && $role !== "") {
                                                $query = "UPDATE users SET name='$name', username='$username', address='$address', email='$email', phone ='$phone', role='$role' WHERE id= $id ";
                                                $result = mysqli_query($con, $query);

                                                if ($result) {
                                                    echo "<p class='text-success'>Data are Updated</p>";
                                                    // header('Refresh:2; URL=index.php');
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<p class='text-warning'>Data are not Updated</p>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php\">";
                                                }
                                            } else {
                                                echo "<p class='text-danger'>Please fill all fields</p>";
                                                echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php\">";
                                            }
                                        }

                                        ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="basic-default-name" placeholder="Please enter your name" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-company">Username</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" id="basic-default-company" placeholder="Enter your username" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-company">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" id="basic-default-company" placeholder="Enter your address" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" id="basic-default-email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="" aria-label="Enter your email address" aria-describedby="basic-default-email2" />
                                                        <span class="input-group-text" id="basic-default-email2">@gmail.com</span>
                                                    </div>
                                                    <div class="form-text">You can use letters, numbers & periods</div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="basic-default-phone" name="phone" value="<?php echo $row['phone']; ?>" class="form-control phone-mask" placeholder="+977**********" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-company">Role</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="role" value="<?php echo $row['role']; ?>" aria-label="Default select example">
                                                        <option selected>Select Role</option>
                                                        <option value="0"<?php if($row['role'] == 0) echo 'selected'; ?>>Admin</option>
                                                        <option value="1"<?php if($row['role'] == 1) echo 'selected'; ?>>User</option>
                                                        <option value="2"<?php if($row['role'] == 2) echo 'selected'; ?>>Manager</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="save" class="btn btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- / Content -->

                    <?php require('../layouts/footer.php'); ?>