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

                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="container py-5">
                                            <div class="table-responsive">
                                                <a class="btn btn-primary btn-sm" href="create.php" role="button">Add</a>
                                                
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
