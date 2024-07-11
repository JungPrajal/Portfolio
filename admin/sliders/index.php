<?php require('../layouts/header.php'); ?>

<section>
    <div class="container-wrapper">
        <div class="table-responsive">
            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="card">
                    <h4 class="fw-bold py-3 mb-4">
                        <a class="btn btn-primary btn-sm" href="create.php" role="button">Create Slider</a>
                    </h4>

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $select = "SELECT * FROM sliders";
                                $result = mysqli_query($con, $select);
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?> 
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><img src="../uploads/<?php echo $row['image']; ?>" alt="" width="100px"></td>
                                    <td><?php echo $row['status'] == 'active' ? 'Active' : 'Inactive'; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $row['id']; ?>" role="button">Edit</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this data?')" href="delete.php?id=<?php echo $row['id']; ?>" role="button">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
