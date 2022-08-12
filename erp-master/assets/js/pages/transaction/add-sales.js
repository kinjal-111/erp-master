var id =2;
var finalTotal=0;
var baseURL = window.location.origin;
var filePath = "/helper/routing.php";
function deleteProduct(delete_id){
    var elements = document.getElementsByClassName("product_row");
    if(elements.length != 1){
        $("#element_"+delete_id).remove();
    }
    else{
        $("#category_"+element_id).append("<option disabled selected>Select Category</option>");
        $("#product_"+element_id).append("<option disabled selected>Select Category</option>");
        $("#selling_price_"+delete_id).val("");
        $("#quantity_"+delete_id).val("0");
        $("#discount_"+delete_id).val("0");
        $("#final_rate_"+delete_id).val("0")
    }
}
function addProduct(){
    //console.log("Inside AddProduct");
    $("#products_container").append(
    "<!--BEGIN: PRODUCT CUSTOM CONTROL-->\n"+
    "<div class=\"row product_row\" id=\"element_"+id+"\">\n" +
        "<!--BEGIN: CATEGORY SELECT-->\n" +
        "<div class=\"col-md-2\">\n"+
            "<div class=\"form-group\">\n"+
                "<label>Category</label>\n"+
                "<select id=\"category_"+id+"\" class=\"form-control category_select\">\n"+
                    "<option disabled selected>Select Category</option>\n"+
                "</select>\n"+
            "</div>\n"+
        "</div>\n"+
        "<!--END: CATEGORY SELECT-->\n"+

        "<!--BEGIN: PRODUCT SELECT-->\n"+
        "<div class=\"col-md-3\">\n"+
            "<div class=\"form-group\">\n"+
                "<label>Product</label>\n"+
                "<select name=\"products[]\" id=\"product_"+id+"\" class=\"form-control product_select\">\n"+
                    "<option disabled selected>Select Product</option>\n"+
                "</select>\n"+
            "</div>\n"+
        "</div>\n"+
        "<!--END: PRODUCT SELECT-->\n"+

        "<!--BEGIN: SELLING PRICE-->\n"+
        "<div class=\"col-md-2\">\n"+
            "<div class=\"form-group\">\n"+
                "<label>Selling Price</label>\n"+
                "<input type=\"text\" id=\"selling_price_"+id+"\" class=\"form-control\" disabled>\n"+
            "</div>\n"+
        "</div>\n"+
        "<!--END: SELLING PRICE-->\n"+

        "<!--BEGIN: QUANTITY SELECT-->\n"+
        "<div class=\"col-md-1\">\n"+
            "<div class=\"form-group\">\n"+
                "<label>Quantity</label>\n"+
                "<input type=\"number\" name=\"quantity[]\" id=\"quantity_"+id+"\"\n"+
                "class=\"form-control quantity_select\" value=\"0\">\n"+
            "</div>\n"+
        "</div>\n"+
        "<!--END: QUANTITY SELECT-->\n"+

        "<!--BEGIN: DISCOUNT SELECT-->\n"+
        "<div class=\"col-md-1\">\n"+
            "<div class=\"form-group\">\n"+
                "<label>Discount</label>\n"+
                "<input type=\"number\" name=\"discount[]\" id=\"discount_"+id+"\"\n"+
                "class=\"form-control discount_select\" value=\"0\">\n"+
            "</div>\n"+
        "</div>\n"+
        "<!--END: DISCOUNT SELECT-->\n"+

        "<!--BEGIN: FINAL RATE-->\n"+
        "<div class=\"col-md-2\">\n"+
            "<div class=\"form-group\">\n"+
                "<label>Final Price</label>\n"+
                "<input type=\"text\" name=\"final_price[]\" id=\"final_rate_"+id+"\"\n"+
                "class=\"form-control final_price\" disabled value=\"0\">\n"+
            "</div>\n"+
        "</div>\n"+
        "<!--END: FINAL RATE-->\n"+

        "<!--BEGIN: DELETE BUTTON-->\n"+
        "<div class=\"col-md-1\">\n"+
            "<button\n"+
                    "type=\"button\"\n"+
                    "class=\"btn btn-danger btn_delete\" id=\"btn_delete_"+id+"\"\n"+
                    "style=\"margin-top: 40%\">\n"+
                "<i class=\"fas fa-trash-alt\"></i>\n"+
            "</button>\n"+
        "</div>\n"+
        "<!--END: DELETE BUTTON-->\n"+
    "</div>\n"+
    "<!--END PRODUCT CUSTOM CONTROL-->"
    );
    $.ajax({
        url: baseURL+filePath,
        method: 'POST',
        data: {
            getCategories: true
        },
        dataType: 'json',
        success: function(categories){
            //console.log(categories);
            categories.forEach(function (category){
                $("#category_"+id).append(
                    `<option value='${category.id}'>${category.name}</option>`
                );
            });
            id++;
        }
    });
}
/**
 * SYNTAX
 * $('parent_id').on('event', 'child class on which u wanna perform event', function(){
 *      ----
 * });
 */
$("#products_container").on('change','.category_select', function(){
    //console.log(this);
    var element_id = $(this).attr('id').split("_")[1];
    var category_id = this.value;
    // console.log(element_id);
    // console.log(category_id);
    $.ajax({
        url: baseURL+filePath,
        method: 'POST',
        data: {
            getProductsByCategoryID: true,
            categoryID: category_id
        },
        dataType: 'json',
        success: function(products){
            //console.log(products);
        //Empty isiliye coz if badmai category change karte hy toh phle vali category k products k sath append ho k aate hy new products
            // ab to avoid this empty use kiya hy.
            $("#product_"+element_id).empty();
            $("#product_"+element_id).append("<option disabled selected>Select Category</option>");
            products.forEach(function (product){
                $("#product_"+element_id).append(
                    `<option value='${product.id}'>${product.name}</option>`
                );
            });
        }
    });
});
$("#products_container").on('change','.product_select', function(){
    console.log(this);
    var element_id = $(this).attr('id').split("_")[1];
    var product_id = this.value;
    // console.log(element_id);
    // console.log(product_id);
    $.ajax({
        url: baseURL+filePath,
        method: 'POST',
        data: {
            getSPByProductID: true,
            productID: product_id
        },
        dataType: 'json',
        success: function(selling_price){
            $("#selling_price_"+element_id).val(selling_price[0].selling_rate);
        }
    });
});
$("#products_container").on('change', '.quantity_select', function(){
    //console.log(this);
    var element_id = $(this).attr('id').split("_")[1];
    
    calculateFinalRate(element_id);
    calculateFinalTotal();
});
$("#products_container").on('change','.discount_select', function(){
    var element_id = $(this).attr('id').split("_")[1];
    
    calculateFinalRate(element_id);
    calculateFinalTotal();
});
$("#products_container").on('click', '.btn_delete', function(){
    alert("Are you Sure you Want to delete this record ??");
    element_id = $(this).attr('id').split("_")[2];
    final_Rate = $("#final_rate_"+element_id).val();
    finalTotal = finalTotal - final_Rate;
    deleteProduct(element_id);
    $("#finalTotal").val(finalTotal);

});

function calculateFinalRate(element_id){
    var quantity = parseInt($("#quantity_"+element_id).val());
    var discountPerc = parseInt($("#discount_"+element_id).val());
    var selling_price = parseInt($("#selling_price_"+element_id).val());
    finalRate = selling_price * quantity;
    if(discountPerc > 0){
        discount = finalRate * (discountPerc/100);
        finalRate -= discount;
    }
    $("#final_rate_"+element_id).val(finalRate);
}
function calculateFinalTotal(){
    var check = 0;
    finalTotal =0;
    final_price = document.getElementsByClassName("final_price");
    for(i=0; i<final_price.length; i++){
        finalTotal += parseInt(final_price[i].value);
    }
    $("#finalTotal").val(finalTotal);
}

$("#button_container").on('click', '.check_email', function(){
    customer_email = $("#customer_email").val();
    console.log("Customer Email : "+customer_email);
    
    // var id = $(this).data('id');
    // $("#edit_category_id").val(id);
    //Fetching all other values from the database using AJAX and loading them onto thier respective fields in the modal.
    $.ajax({
        url:baseURL+filePath,
        method:"POST",
        data:{
            getCustomerByEmail: true,
            email_id: customer_email
        },
        dataType:"json",
        success:function(data){
            console.log(data);
            if(data.length == 0 || data == null){
                console.log("NULL");
                $("#email_verify_fail").removeAttr("style").display;
                $("#add_customer_btn").removeAttr("style").display;
            }
            else{
                $('#check_email').addAttr("style", "display: none!important");
                console.log(data[0]);
                $("#customer_id").val(data[0].id);
                //$("#edit_category_name").val(data.name);
            }
        }
    })

});

$("#addSaleSubmit").on('click', function(){
    customer_id = $("#customer_id").val();
    console.log(customer_id);
    $.ajax({
        url:baseURL+filePath,
        method:"POST",
        data:{
            createInvoiceAndAddInSales : true,
            customer_id: customer_id
        },
        dataType:"json",
        success:function(data){
            console.log(data);
            if(data.length == 0 || data == null){
                console.log("NULL");

            }
            else{
                console.log(data[0]);
                $("#customer_id").val(data[0].id);
                //$("#edit_category_name").val(data.name);
            }
        }
    })
});





