$(document).ready(function () {

    //if the reservation form is submitted.
    $("#loader-wrapper").hide();
    $("#reservation_form").submit(function(event){
        //validations.
        var error_message = $('.error_message p');
        var fields = ['username', 'phone', 'email', 'pickup_address', 'pickup_city', 'pickup_state', 'pickup_zip', 'drop_address', 'drop_city', 'drop_state', 'drop_zip', 'passenger','appointment_time', 'terms'];
        var valid = validation(fields);

        if(!valid){//preventDefault if validation failed.
            event.preventDefault();
        }else {//allow if validation passed.
            $('body').scrollTop(0);
            $("#loader-wrapper").show();

            setTimeout(function(){
                $('body').addClass('loaded');
                $('h1').css('color','#222222');
            }, 30000);
        }
    });

    function validation(fields){
        var valid = true;
        $('.error_message ul li').remove();
        $.each(fields,function(i, val){
            var field =  $("#" + val);

            if(field.is('input:text')){
                if(!$.trim(field.val())){
                    valid = false;
                    $('.error_message ul').append("<li>" + field.attr('data-name') + ' is required'+ "</li>");
                }
            }else if(field.is('textarea')){
                if(!$.trim(field.val())){
                    valid = false;
                    $('.error_message ul').append("<li>" + field.attr('data-name') + ' is required'+ "</li>");
                }
            } else if(field.is('select')) {
                if(field.val() == '0'){
                    valid = false;
                    $('.error_message ul').append("<li>" + field.attr('data-name') + ' is required'+ "</li>");
                }
            } else if(field.is(':checkbox')) {
                if (!field.is(':checked')) {
                    valid = false;
                    $('.error_message ul').append("<li>You must agree with request conditions to proceed</li>");
                }
            }
        });

        if(!valid) {
            return valid;
        }

        //var phone_regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        //var phone_regex = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
        /*var phone_regex = /^\d+$/;*/
        /*var phone_regex = /^(?=.*\d)[\d ]+$/;*/
        //var phone_regex = /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i;
        //if(!(phone_regex.test($('#phone').val())) || $('#phone').val() < 10){
        //        valid = false;
        //        $('.error_message ul').append("<li> Please enter the phone number properly</li>");
        //}

        var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if(!(email_regex.test($("#email").val()))){
            valid = false;
            $('.error_message ul').append("<li> Please enter the email in a proper format example abc@gmail.com</li>");
        }

        var zipRegex = /^\d{5}$/;
        if (($('#pickup_zip').val() && !zipRegex.test($('#pickup_zip').val())) || ( $('#drop_zip').val() && !zipRegex.test($('#drop_zip').val())))
        {
            valid = false;
            $('.error_message ul').append("<li> Please enter the zip in proper format</li>");
        }
        return valid;
    }
});
