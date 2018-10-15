
// form validation
$(function() {

    $("#aminul_cbx_form").validate({
        // validation rules
        rules: {
            first_name:"required",
            last_name:"required",
            email: {
                required: true,
                minlength: 5,
            },
            password: {
                required : true,
                minlength : 5,
            }

        },
        // validation error messages
        messages: {
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address"
        },
    });
});