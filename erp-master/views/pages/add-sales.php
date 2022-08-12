<?php
require_once __DIR__."/../../helper/init.php";
$page_title = "Quick ERP | Add New Sales";
$sidebarSection = 'transaction';
$sidebarSubSection = 'sales';
Util::createCSRFToken();
$errors="";
$old="";
if(Session::hasSession('old'))
{
  $old = Session::getSession('old');
  Session::unsetSession('old');
}
if(Session::hasSession('errors'))
{
  $errors = unserialize(Session::getSession('errors'));
  Session::unsetSession('errors');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once __DIR__ . "/../includes/head-section.php"; ?>
    <style>
        .email-verify{
            background: green;
            color: #FFF;
            padding:  5px 10px;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .2rem;
            vertical-align: middle;
            /* display: none!important; */
        }
    </style>
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
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h1 class="h3 mb-4 text-gray-800">Sales</h1>
                  </a>
                </div>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card shadow mb-4">
                      <!-- CARD HEADER-->
                        <div class="card-header py-3 d-flex flex-row justify-content-end">
                            <div class="mr-3">
                                <input type="text" class="form-control" 
                                        name="email" id="customer_email"
                                        placeholder="Enter Email of Customer"
                                >
                            </div>
                            <div id="button_container">
                                <p class="email-verify" id="email_verify_success" style="display:none!important">
                                    <i class="fas fa-check fa-sm text-white mr-1"></i>Email Verified
                                </p>
                                <p class="email-verify bg-danger d-inline-block mb-0" id="email_verify_fail" style="display:none!important">
                                    <i class="fas fa-times fa-sm text-white mr-1"></i>Email Not Verified
                                </p>
                                <a href="<?=BASEPAGES;?>add-customer.php"
                                    class="btn btn-sm btn-warning shadow-sm d-inline-block"
                                    id="add_customer_btn" style="display:none!important">
                                    <i class="fas fa-users fa-sm text-white"></i> Add Customer
                                </a>
                                <button type="button" class="d-sm-inline-block btn btn-primary shadow-sm check_email"
                                    name="check_email" id="check_email">
                                    <i class="fas fa-envelope fa-sm text-white"></i> Check Email

                                </button>
                            </div>
                        </div>
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fa fa-plus"></i>SALES
                            </h6>
                            <button type="button"
                                    onclick="addProduct();"
                                    class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white"></i>Add One More Product    
                            </button>
                        </div>
                        <!--END OF CARD HEADER-->

                        <!--FORM-->
                        <form action="<?= BASEURL;?>helper/routing.php" method="POST">
                            <input type="hidden" 
                                name="csrf_token"
                                value="<?= Session::getSession('csrf_token');?>"
                            >
                            <input type="text" name="customer_id" id="customer_id">
                            <!--CARD BODY-->
                            <div class="card-body">
                                <div id="products_container">
                                    <!--BEGIN: PRODUCT CUSTOM CONTROL-->
                                    <div class="row product_row" id="element_1">
                                        <!--BEGIN: CATEGORY SELECT-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select id="category_1" class="form-control category_select">
                                                    <option disabled selected>Select Category</option>
                                                    <?php
                                                    $categories = $di->get('database')->readData("category", ['id','name'],"deleted=0");
                                                    foreach($categories as $category){
                                                        echo "<option value='{$category->id}'>{$category->name}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--END: CATEGORY SELECT-->

                                        <!--BEGIN: PRODUCT SELECT-->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Product</label>
                                                <select name="products[]" id="product_1" class="form-control product_select">
                                                    <option disabled selected>Select Product</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--END: PRODUCT SELECT-->
                                                    
                                        <!--BEGIN: SELLING PRICE-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Selling Price</label>
                                                <input type="text" id="selling_price_1"
                                                class="form-control" disabled>
                                            </div>
                                        </div>
                                        <!--END: SELLING PRICE-->

                                        <!--BEGIN: QUANTITY SELECT-->
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">Quantity</label>
                                                <input type="number" name="quantity[]" id="quantity_1"
                                                    class="form-control quantity_select"
                                                    value="0"
                                                >
                                            </div>
                                        </div>
                                        <!--END: QUANTITY SELECT-->

                                        <!--BEGIN: DISCOUNT SELECT-->
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">Discount</label>
                                                <input type="number" name="discount[]" id="discount_1"
                                                    class="form-control discount_select"
                                                    value="0"
                                                >
                                            </div>
                                        </div>
                                        <!--END: DISCOUNT SELECT-->
                                    
                                        <!--BEGIN: FINAL RATE-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Final Pice</label>
                                                <input type="text" name="final_price[]" id="final_rate_1"
                                                    class="form-control final_price" disabled
                                                    value="0"
                                                >
                                            </div>
                                        </div>
                                        <!--END: FINAL RATE-->

                                        

                                        <!--BEGIN: DELETE BUTTON-->
                                        <div class="col-md-1">
                                            <button
                                                    type="button"
                                                    class="btn btn-danger btn_delete" id="btn_delete_1"
                                                    style="margin-top: 40%">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                        <!--END: DELETE BUTTON-->
                                    </div>
                                    <!--END PRODUCT CUSTOM CONTROL-->
                                </div>
                                
                            </div>


                        </form>
                        <!--END OF CARD BODY-->
                        
                        <!--BEGIN: CARD FOOTER-->
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <input type="submit" class="btn btn-primary" name="add_category" id="addSaleSubmit" value="submit">
                            </div>
                            <div class="form-group row">
                                <label for="finalTotal" class="col-sm-4 col-form-label">Final Total</label>
                                <div class="col-sm-8 py-1">
                                    <input type="text" disabled readonly  class="form-content" id="finalTotal" value="0">
                                </div>
                            </div>
                        </div>
                        
                        <!--END: CARD FOOTER-->
                    </div>
                    </div>
                </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

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

<script src="<?= BASEASSETS;?>js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= BASEASSETS;?>js/pages/transaction/add-sales.js"></script>
</body>

</html>
