jQuery(document).ready(function ($) {

    var $form = $('#aminul_cbx_form');

    // var $validation = $form.validate({
    //     // validation rules
    //     rules: {
    //         first_name: "required",
    //         last_name: "required",
    //         email: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         password: {
    //             required: true,
    //             minlength: 5,
    //         }
    //
    //     },
    //
    //     // validation error messages
    //     messages: {
    //         first_name: "Please enter your firstname",
    //         last_name: "Please enter your lastname",
    //         password: {
    //             required: "Please provide a password",
    //             minlength: "Your password must be at least 5 characters long"
    //         },
    //         email: "Please enter a valid email address"
    //     },
    // });


    $form.on('submit', function (e) {

        var $busy = parseInt($form.data('busy'));

        if ($busy == 0) {

            $form.data('busy', 1);

            var $ajax = parseInt($form.data('ajax'));
            if ($ajax != 1) {

            } else {

                e.preventDefault();

                //before sending ajax request let's clear all 'error' class add 'valid' class from all input fields and
                //hide the error label

                $form.find('.form-control').removeClass('error valid');
                $form.find('label.error').hide();

                $.ajax({
                    method: 'POST',
                    url: 'check/insert.php',
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function (response) {

                        $form.data('busy', 0);

                        var $validation_messages = response.validation_message;

                        for (var field_key in $validation_messages) {

                            var message = $validation_messages[field_key];

                            var label_id = field_key + '-error';

                            if ($form.find('#' + label_id).length > 0) {
                                $form.find('#' + label_id).show();
                                $form.find('#' + label_id).html(message);
                            }
                            else {
                                $('<label class="error" id="' + field_key + '-error" for="' + field_key + '">' + message + '</label>').insertAfter($form.find('#' + field_key));
                            }

                            //add error class to the input field to match with the js validation api
                            $('#' + field_key).removeClass('valid').addClass('error');
                        }

                        // success message
                        var process_message = response.process_message['insert'];

                        if (process_message != null) {
                            $form.find('.process_message').html(process_message);
                            $form.find('.form-control').val('');
                        }
                    }
                });
            }
        } else {
            e.preventDefault();
        }
    });    //form submit end
});

























