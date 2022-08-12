
<script src="<?=BASEASSETS;?>js/plugins/toastr/toastr.min.js"></script>
<script src="<?=BASEASSETS;?>vendor/datatables/datatables.min.js"></script>
<script src="<?=BASEASSETS;?>js/pages/supplier/manage-supplier.js"></script>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    <?php
        if(Session::hasSession(ADD_SUCCESS)):
    ?>  
                toastr.success("New Supplier has been added successfully!","Added");
    <?php
            Session::unsetSession(ADD_SUCCESS);
        elseif(Session::hasSession(ADD_ERROR)):
    ?>  
                toastr.error("Adding a Supplier failed!","Failed!");
    <?php
            Session::unsetSession(ADD_ERROR);
            elseif(Session::hasSession(UPDATE_ERROR)):
    ?>
                toastr.error("Updating Supplier failed!","Failed!");
        
    <?php
            Session::unsetSession(UPDATE_ERROR);
            elseif(Session::hasSession(UPDATE_SUCCESS)):
    ?>
                toastr.success("Updating Supplier successful!!","Updated!");
    <?php
            Session::unsetSession(UPDATE_SUCCESS);
            elseif(Session::hasSession(DELETE_ERROR)):
    ?>
                toastr.error("Deleting Supplier failed!","Failed!");     
    <?php
            Session::unsetSession(DELETE_ERROR); 
            elseif(Session::hasSession(DELETE_SUCCESS)):
    ?>
                toastr.success("Deleting Supplier successful!!","Deleted!");  
    <?php
            Session::unsetSession(DELETE_SUCCESS);   
            elseif(Session::hasSession('csrf')):
    ?>
            toastr.error("Unauthorized Access, Token mismatch!","Token Error!");
    <?php
            Session::unsetSession('csrf');
        endif;
    ?>
</script>