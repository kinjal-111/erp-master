$(function(){
    $("#add-customer").validate({
        rules: {
            'first_name': {
                required: true
            },
            'last_name': {
                required: true
            },
            'gst_no': {
                required: true
            },
            'phone_no': {
                required: true
            },
            'email_id': {
                required: true
            },
            'gender': {
                required: true
            },
        },
        submitHandler: function(form){
            form.submit();
        }
    })
});