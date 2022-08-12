<?php
require_once __DIR__ ."/../../helper/init.php";
$page_title = "Quick ERP | Manage Product";
$sidebarSection = 'product';
$sidebarSubSection = 'manage';
Util::createCSRFToken();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once __DIR__ . "/../includes/head-section.php"; ?>
    
    <link href="<?= BASEASSETS;?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?= BASEASSETS;?>vendor/datatables/datatables.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php require_once __DIR__ . "/../includes/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Top Navigation Bar -->
            <?php require_once __DIR__ . "/../includes/navbar.php"; ?>
            <!-- End of Top Navigation Bar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Manage Product</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary ">Products</h6>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive" id="manage-product-table">
                        <div id="export-buttons"></div>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Specifications</th>
                                    <th>Quantity</th>
                                    <th>Selling Rate</th>
                                    <th>WEF</th>
                                    <th>Category</th>
                                    <th>EOQ</th>
                                    <th>Danger Level</th>
                                    <th>Supplier Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!--Edit Modal-->
        <!-- Button trigger modal -->
        <!-- 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                Launch demo modal
            </button> 
        -->

       

        <!-- DELETE Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?=BASEURL;?>helper/routing.php">
                        
                        <div class="modal-body">
                            <input type="hidden" name="csrf_token" id="csrf_token" value="<?= Session::getSession('csrf_token');?>">
                            <input type="hidden" name="record_id" id="delete_record_id">
                            
                            <p class="text-muted">Are you sure you want to delete this record?</p>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="deleteProduct">Delete Record!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once __DIR__ . "/../includes/footer.php"; ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<?php require_once __DIR__ . "/../includes/scroll-to-top.php"; ?>

<?php require_once __DIR__ . "/../includes/core-scripts.php"; ?>

<?php require_once __DIR__ . "/../includes/page-level/product/manage-product-scripts.php"; ?>
</body>

</html>
