$(document).ready(function () {
    $("#date").appendDtpicker({
        "dateOnly": true,
        //"dateFormat": "DD-MM-YYYY",
        "dateFormat": "MM-DD-YYYY",
        "futureOnly": true,
        "closeOnSelected": true,
        "autodateOnStart": false
    });

    $('input.timepicker').timepicker({
        timeFormat: 'HH:mm',
        minTime: '00:00:00', // 11:45:00 AM,
        maxHour: 23,
        maxMinutes: 45,
        interval: 15, // 15 minutes
        dynamic: false
    });

    $(document).on('click','#add_padding, #remove_padding', function(e){
        //we have to get the date, time from and time to variables.
        //set the slots in the slot_processing table.
        var type = $(this).data('type');
        var date = $('#date').val();//Y-m-d.
        date = convert_date(date);
        var time_from = $('#time_from').val();
        var time_to = $('#time_to').val();

        var validation_message = validation(date,time_from,time_to);
        if(validation_message === true)
        {
            $('.error_message').text(' ');
            var url = $("#add_padding").data('url');
            $.post(url,{date:date,time_from: time_from, time_to:time_to, type:type}, function (result) {
                var arr = JSON.parse(result);
                if(type == 'add'){
                    var message = "The Padding has been Added";
                }
                else
                {
                    var message = "The Padding has been Removed";
                }
                $('.error_message').text(message).css('color','red').css('font-size','20px');
            });
        }
        else
        {
            $('.error_message').text(validation_message).css('color','red').css('font-size','20px');
            e.preventDefault();
        }

    });

    $(document).on('click','#remove_all_padding', function(e){
        var url = $("#remove_all_padding").data('url');
        $.post(url,{}, function (result) {
            var arr = JSON.parse(result);
            var message = "All the paddings from today's onwards has been removed";
            $('.error_message').text(message).css('color','red').css('font-size','20px');
        });
    });

    //this function is used to convert the date from the MM-DD-YY format to Y-m-d format.
    function convert_date(date){
        date = date.split('-');
        date_arr = [date[2],date[0],date[1]];
        date = date_arr.join('-');
        return date;
    }

    //this function is used to validate the date time values.
    function validation(date,time_from,time_to)
    {
        var valid = true;
        var current_date = $('#cdt_date').val();
        var current_time = $('#cdt_time').val();

        var time_from_num = convert_time(time_from);
        var time_to_num = convert_time(time_to);
        //check if the time_from is greater than time_to.

        //if any of the values is not filled.
        if(date == '' || time_from == '' || time_to == '')
        {
            valid = false;
            return 'Please enter all the values';
        }

        //if time_to is less than time_from.
        if(time_from_num > time_to_num)
        {
            valid = false;
            return 'Time From should be less than Time to';
        }

        //if date selected is less than current date.
        current_date = new Date(current_date);
        date = new Date(date);

        if(current_date > date)
        {
            valid = false;
            return 'Please Select New Date';
        }
        else if(current_date.toDateString() === date.toDateString())
        {
            //current date.
            //check the current time.
            var current_time_num = convert_time(current_time);
            if((current_time_num > time_from_num) || (current_time_num > time_to_num) )
            {
                //if the current time is greater than selected time.
                valid = false;
                return 'Selected Time Should be greater than Current Time';
            }
        }
        else
        {
            //future date.
            return valid;
        }
        return valid;
    }

    //
    function convert_time(time)
    {
        time = time.replace(':','');
        return time;
    }
});