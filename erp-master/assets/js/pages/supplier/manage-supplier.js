var TableDatatables = function(){
    var handleSupplierTable = function(){
        var manageSupplierTable = $("#manage-supplier-table");
        var editSupplier = $("#edit-supplier");
        var baseURL = window.location.origin;
        var filePath = "/helper/routing.php";
        var oTable = manageSupplierTable.DataTable({
            "processing":true,
            "serverSide":true,
            "ajax":{
                url:baseURL+filePath,
                type:"POST",
                data:{
                    "page": "manage_supplier"
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

        manageSupplierTable.on('click','.delete',function(e){
            var id = $(this).data('id');
            $("#delete_record_id").val(id);
        });
        new $.fn.dataTable.Buttons( oTable, {
            buttons: [
                'copy', 'csv', 'pdf'
            ]
        } );
        oTable.buttons().container()
            .appendTo($('#export-buttons'));
    }
    return{
        //main function to handle all the datatables

        init: function(){
            console.log("HEllo World");
            handleSupplierTable();
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





/*
var manFunc = manageCustomerTable.on('click','.edit', function(e){
                                        
    var id = $(this).data('id');
    // console.log($(this).data('id'));
    $("#edit_customer_id").val(id);
    //Fetching all other values from the database `using AJAX ombimand loading them onto thier respective fields in the modal.
    $.ajax({
        url:baseURL+filePath,
        method:"POST",
        data:{
            "customer_id":id,
            "fetch":"customer"
        },
        dataType:"json",
        success:function(data){
           
                var form = document.createElement('form');
                document.body.appendChild(form);
                form.method = 'post';
                form.action = './edit-customer.php';
                for (var name in data) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = name;
                    input.value = data[name];
                    form.appendChild(input);
                }
                form.submit();
        }           
    })
});
*/