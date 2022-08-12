$(document).ready(function() {
    console.log( "ready!" );
    var full_url = document.URL;
    var url = new URL(full_url);

    // get access to URLSearchParams object
    var search_params = url.searchParams; 

    var id = search_params.get('id');
    //console.log(id);
    var editSupplier = $("#edit-supplier");
    var baseURL = window.location.origin;
    var filePath = "/helper/routing.php";
    //alert(id);
    //$("#edit_supplier_id").val(id);
    //Fetching all other values from the database using AJAX and loading them onto thier respective fields in the modal.
    $.ajax({
        url:baseURL+filePath,
        method:"POST",
        data:{
            "supplier_id":id,
            "fetch":"supplier"
        },
        dataType:"json",
        success:function(data){
            $("#edit_supplier_id").val(id);
            $("#first_name").val(data.first_name);
            $("#last_name").val(data.last_name);
            $("#company_name").val(data.company_name);
            $("#gst_no").val(data.gst_no);
            $("#phone_no").val(data.phone_no);
            $("#email_id").val(data.email_id);

        }
    })
});