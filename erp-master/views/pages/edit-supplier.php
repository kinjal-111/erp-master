<?php
require_once __DIR__."/../../helper/init.php";
$page_title = "Quick ERP | Edit Supplier";
$sidebarSection = 'supplier';
$sidebarSubSection = 'edit';
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
                  <h1 class="h3 mb-4 text-gray-800">Edit Supplier</h1>
                  <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-list-ul fa-sm text-white"> Manage Supplier</i>
                  </a>
                </div>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card shadow mb-4">
                      <!-- CARD HEADER-->
                        <div class="card-header">
                          <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fa fa-plus"></i> Edit Supplier
                          </h6>
                        </div>
                        <!--END OF CARD HEADER-->

                        <!--CARD BODY-->
                        <div class="card-body">
                          <form action="<?= BASEURL;?>helper/routing.php" method="POST" id="edit-supplier">
                          <input type="hidden" 
                            name="csrf_token"
                            value="<?= Session::getSession('csrf_token');?>"
                          >
                          <input type="text" name="supplier_id" id="edit_supplier_id">
                            <div class="row">
                              <!--FIRST NAME-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="first_name">First Name</label>
                                  <input type="text"
                                    class="form-control <?= $errors !='' ? ($errors->has('first_name') ? 'error is-invalid' : '') : '';?>" 
                                    name="first_name"
                                    id="first_name"
                                    value="<?= $old != '' ?$old['first_name'] : '';?>"
                                  >
                                </div>
                              </div>
                              <!--LAST NAME-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="last_name">Last Name</label>
                                  <input type="text"
                                    class="form-control <?= $errors !='' ? ($errors->has('last_name') ? 'error is-invalid' : '') : '';?>" 
                                    name="last_name"
                                    id="last_name"
                                    placeholder="Enter Last Name"
                                    value="<?= $old != '' ?$old['last_name'] : '';?>"
                                  >
                                </div>
                              </div>

                              <!--COMPANY NAME-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="company_name">Company Name</label>
                                  <input type="text"
                                    class="form-control <?= $errors !='' ? ($errors->has('company_name') ? 'error is-invalid' : '') : '';?>" 
                                    name="company_name"
                                    id="company_name"
                                    placeholder="Enter Company Name"
                                    value="<?= $old != '' ?$old['company_name'] : '';?>"
                                  >
                                </div>
                              </div>

                              <!--Blank div-->
                              <div class="col-md-6"></div>

                              <!--GST Number-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="gst_no">GST Number</label>
                                  <input type="text"
                                    class="form-control <?= $errors !='' ? ($errors->has('gst_no') ? 'error is-invalid' : '') : '';?>" 
                                    name="gst_no"
                                    id="gst_no"
                                    placeholder="Enter GST number"
                                    value="<?= $old != '' ?$old['gst_no'] : '';?>"
                                  >
                                </div>
                              </div>

                              <!--Blank div-->
                              <div class="col-md-6"></div>

                              <!--Phone Number-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="phone_no">Phone Number</label>
                                  <input type="text"
                                    class="form-control <?= $errors !='' ? ($errors->has('phone_no') ? 'error is-invalid' : '') : '';?>" 
                                    name="phone_no"
                                    id="phone_no"
                                    placeholder="Enter Phone number"
                                    value="<?= $old != '' ?$old['phone_no'] : '';?>"
                                  >
                                </div>
                              </div>

                              <!--Blank div-->
                              <div class="col-md-6"></div>

                              <!--Email ID-->
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="email_id">Email ID</label>
                                  <input type="email"
                                    class="form-control <?= $errors !='' ? ($errors->has('email_id') ? 'error is-invalid' : '') : '';?>" 
                                    name="email_id"
                                    id="email_id"
                                    placeholder="Enter Email ID"
                                    value="<?= $old != '' ?$old['email_id'] : '';?>"
                                  >
                                </div>
                              </div>

                              

                                <?php
                                // if($errors!="" && $errors->has('first_name')):
                                //   echo "<span class='error'>{$errors->first('first_name')}</span>";
                                
                                if($errors!="" && $errors->has('gst_no')):
                                  echo "<span class='error'>{$errors->first('gst_no')}</span>";
                                elseif($errors!="" && $errors->has('phone_no')):
                                  echo "<span class='error'>{$errors->first('phone_no')}</span>";
                                elseif($errors!="" && $errors->has('email_id')):
                                  echo "<span class='error'>{$errors->first('email_id')}</span>";    
                                endif;
                                ?>
                            </div>
                            <input type="button" class="btn btn-secondary" name="closeSupplier" value="Cancel">
                            <input type="submit" class="btn btn-success edit" name="editSupplier" value="Save Changes">
                          </form>
                        </div>
                        <!--END OF CARD BODY-->
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

<script src="<?= BASEASSETS;?>js/pages/supplier/edit-supplier.js"></script>
</body>

</html>
