var TableDatatables = function(){
    var handleProductTable = function(){
        var manageProductTable = $("#manage-product-table");
        var baseURL = window.location.origin;
        var filePath = "/helper/routing.php";
       manageProductTable.DataTable({
            "processing":true,
            "serverSide":true,
            "ajax":{
                url:baseURL+filePath,
                type:"POST",
                data:{
                    "page": "manage_product"
                }
            },
            "lengthMenu": [
                [5,15,25,-1],
                [5,15,25,"All"]
            ],
            "order": [
                [1,"desc"]
            ],
            "columnDefs": [
                {
                    'orderable': false,
                    'targets': [0,-1]
                }
            ]
        });
        manageProductTable.on('click','.edit', function(e){
                                        
            var id = $(this).data('id');
            $("#edit_product_id").val(id);
            //Fetching all other values from the database using AJAX and loading them onto thier respective fields in the modal.
            $.ajax({
                url:baseURL+filePath,
                method:"POST",
                data:{
                    "product_id":id,
                    "fetch":"product"
                },
                dataType:"json",
                success:function(data){
                    console.log(data);
                    $("#edit_product_name").val(data.name);
                }
            })
        });

        manageCategoryTable.on('click','.delete',function(e){
            var id = $(this).data('id');
            $("#delete_record_id").val(id);
        });
        /*new $.fn.dataTable.Buttons( oTable, {
            buttons: [
                'copy', 'csv', 'pdf'
            ]
        } );
        oTable.buttons().container()
            .appendTo($('#export-buttons'));*/
    }
    return{
        //main function to handle all the datatables

        init: function(){
            handleProductTable();
        }
    }
}();

jQuery(document).ready(function(){
    TableDatatables.init();
});


/**
 * 
 * manage-customer.php
 * manage-customer-scripts.php
 * manage-category.js
 * 
 * ui mai category jaisa Customers daalna hy and usmai add and manage
 * 
 */