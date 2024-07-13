<?php require('../layouts/header.php'); ?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php require('../layouts/sidebar.php'); ?>
            <div class="layout-page">
                <?php require('../layouts/navbar.php'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit skills</span></h4>

                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="container py-5">
                                            <div class="table-responsive">
                                                <a class="btn btn-primary btn-sm" href="create.php" role="button">Add</a>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Status</th>

                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // if (isset($_GET['msg'])) {
                                                        //     $msg = $_GET['msg'];
                                                        //     if ($msg == 'success') {
                                                        //         echo "<p class='text-success'>Data is DELETED.</p>";
                                                        //         header('Refresh:2; URL=index.php');
                                                        //     }
                                                        // }

                                                        $select = "SELECT * FROM skills ";
                                                        $result = mysqli_query($con, $select);
                                                        $i = 1;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $i++; ?></th>
                                                                <td><?php echo $row['title']; ?></td>
                                                                <td><?php echo $row['description']; ?></td>
                                                                <td><?php echo $row['status'] == 'active' ? 'Active' : 'Inactive'; ?></td>
                                                                <td>
                                                                    <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $row['id']; ?>" role="button">Edit</a>
                                                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this data?')" href="delete.php?id=<?php echo $row['id']; ?>" role="button">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
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
