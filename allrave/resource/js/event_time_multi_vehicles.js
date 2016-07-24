$(document).ready(function () {
    //sequence of events
    // 1) Clear all the slots.
    // 2) Get and set all the rejected slots.
    // 3) Get and set all the accepted slots.
    // $) Get and set all the full slots.

    //step 1 clear slots for any unwanted slot classes.
    clear_slots();

    //step 2 Get and set all the rejected slots.
    var date = $('.date').val();
    var rejected_url = $('#get_rejected_requests').val();
    var count_vehicles = $('#count_vehicles').val();
    $.post(rejected_url, { date: date}, function(e){
        var rejected_slots = JSON.parse(e);
        fill_ride_slots(rejected_slots,'rejected');
    });

    //step 3 Get and set all the accepted slots.
    var rides_url = $('#get_rides').val();
    $.post(rides_url, { date:date }, function(e){
        var slots = JSON.parse(e); //get all the booked slots.
        fill_ride_slots(slots,'accepted');//fill all the slots,
        get_main_slots(date);
        //get_full_slots(date);//fill all the full slots.
    });

    // this function clears all the classes.
    function clear_slots(){
        $('#popup ul li').each(function () {
            $(this).removeClass('slot_full');
            $(this).removeClass('slot_past');
            $(this).removeClass('slot_booked');
            $(this).removeClass('slot_rejected');
            $(this).removeClass('slot_partial');
        });
    }

    //it will fill all the slots that were booked for the particular date.
    //it will be called before calling the full_slots() function.
    function fill_ride_slots(slots,type)
    {
        var time_slots = [];
        $.each(slots, function (key, value) {
            var datetime = value.date;
            time = convert_datetime_to_time(datetime);//gets the time in a format example 17:00:00 gets converted to 1700
            time_slots.push($.trim(time));
        });

        if(type == 'accepted'){
            $('#popup ul li').each(function () { //for each slot
                if(!(time_slots.indexOf($(this).attr('data-time')) == -1)){ //if the data-time matches the values in the time_slots array
                    var target = $(this).attr('data-time');
                    var numOccurences = $.grep(time_slots, function (elem) {
                        return elem === target;
                    }).length;
                    if(numOccurences >= count_vehicles)
                    {
                        $(this).addClass('slot_full');
                    }else{
                        $(this).addClass('slot_booked');//add the class slot_booked.
                    }

                    //$(this).removeClass('slot_rejected');
                }
            });
        }else if(type == 'rejected') {
            $('#popup ul li').each(function () { //for each slot
                if(!(time_slots.indexOf($(this).attr('data-time')) == -1)){ //if the data-time matches the values in the time_slots array
                    $(this).addClass('slot_rejected');//add the class slot_booked.
                }
            });
        }
    }

    function get_main_slots(date)
    {
        var full_slot_url = $('#get_main_slots').val();
        $.post(full_slot_url, { date: date }, function (result) {
            var arr = JSON.parse(result); //here we get the result in json format.
            full_slots(arr);
        });
    }

    function get_full_slots(date)
    {
        var full_slot_url = $('#get_full_slots').val();
        var type = 'event';
        $.post(full_slot_url, { date: date, type: type }, function (result) {
            var arr = JSON.parse(result); //here we get the result in json format.
            full_slots(arr);
        });
    }

    /*function full_slots(slots){
     var time_slots = [];
     $.each(slots, function (key, value) {
     var time = value.time;
     time = convert_time(time);
     time_slots.push($.trim(time));
     });
     $('#popup ul li').each(function () {
     if(!(time_slots.indexOf($(this).attr('data-time')) == -1)){
     $(this).addClass('slot_full');
     if($(this).hasClass('slot_booked'))
     {
     $(this).removeClass('slot_booked');
     $(this).removeClass('slot_rejected');
     }
     }
     });
     }*/

    function full_slots(slots){
        var time_slots = [];
        $.each(slots, function (key, value) {
            var time = value.date;
            time = convert_time(time);
            time = time.split(' ');
            time_slots.push($.trim(time[1]));
        });
        $('#popup ul li').each(function () {
            if(!(time_slots.indexOf($(this).attr('data-time')) == -1)){
                $(this).addClass('slot_main');
                if($(this).hasClass('slot_booked') || $(this).hasClass('slot_rejected'))
                {
                    $(this).removeClass('slot_booked');
                    $(this).removeClass('slot_rejected');
                }
            }
        });
    }

    function convert_time(time){ //gets the time in a format example 17:00:00 gets converted to 1700
        time = time.replace(':', '');
        time = time.substring(0,time.length - 3);
        return time;
    }

    function convert_datetime_to_time(datetime){ //gets the time in a format example 17:00:00 gets converted to 1700
        var time = datetime.split(' ');
        time = convert_time(time[1]);
        return time;
    }

    var current_datetime = $('#cdt').val(); // get the current time.
    $(document).on('mouseover', '#popup ul li', function () {
        $(this).css('border', '2px solid goldenrod');
    });

    $(document).on('mouseout','#popup ul li',function(){
        $(this).css('border','1px solid black');
    });

    //if a slot is clicked then send the user to a page displaying list of requests for that date and time.
    $(document).on('click','#popup ul li', function () {
        var url = $('#view_requests').val();
        window.location.href = url+'/'+date+'/'+$(this).data('time');
    })
});