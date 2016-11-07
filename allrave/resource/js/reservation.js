$(document).ready(function () {
    var cdt = $('#cdt').val();
    cdt = cdt.split(' ');
    var cdt_date = cdt[0];
    var cdt_time = cdt[1].replace(':', '');

    var cdt_current = $('#cdt_current_date').val();
    cdt_current = cdt_current.split(' ');
    var cdt_current_date = cdt_current[0];
    var cdt_current_time = cdt_current[1].replace(':', '');

    //$(".fancybox").fancybox();// activate the fancybox popup.

    $("#date").appendDtpicker({
        "dateOnly": false,
        //"dateFormat": "DD-MM-YYYY",
        "dateFormat": "MM-DD-YYYY HH:mm TT",
        "futureOnly": true,
        "closeOnSelected": true,
        "autodateOnStart": false,
        "amPmInTimeList": true,
        "minuteInterval": 5,
        "closeButton": false,
        "onHide": function(handler) {
            if($(".timelist_item.active").size() == 0) {
                return false;
            }
            return true;
        }
    });

    /*jQuery('#date').periodpicker({
        norange: true, // use only one value
        cells: [1, 2], // show only one month

        resizeButton: false, // deny resize picker
        fullsizeButton: false,
        fullsizeOnDblClick: false,

        timepicker: true, // use timepicker
        timepickerOptions: {
            hours: true,
            minutes: true,
            seconds: false,
            ampm: true
        },
        //formatDateTime: "MM/DD/YYYY HH:mm",
        //minDate: moment().format("MM/DD/YYYY"),
        //formatDate: 'MM/DD/YYYY',
        hideOnBlur: false,
        
    });*/



    $(document).on('click','tr .active', function() {
        clear_slots(); //clear the unwanted slot classes.
        if ($(".datepicker_table .active").hasClass('wday_sat') || $(".datepicker_table .active").hasClass('wday_sun')) { //For weekend days i.e. saturday or sunday.
            //weekend_past_slots();//set the weekend past slots i.e. disable all the slots less than 4am.
            process_slots();
        }
        else { //if the day is weekday.
            process_slots();//for the current date.
        }
        $(".fancybox").trigger("click");
    });

    $(document).on('click','.slot',function(){
        if($(this).hasClass('slot_full') || $(this).hasClass('slot_past')){
            return false;
        }else{
            $('#appointment_time').val($(this).text());
            $.fancybox.close();
        }
    });

    function process_slots(){
	//convert the #date into proper format.
	var date = $('#date').val();
	var arr = date.split("-",3);
	var arr_date = [arr[1],arr[0],arr[2]];
	date = arr_date.join("-");
        if ((cdt_current_date == date) && (cdt_date == date)) { //if it is current date and less than 12:00 am
            get_past_slots(date,cdt_date);//get all the past slots
            set_full_slot();//set the full slots.
	} else if((cdt_current_date == date) && (date < cdt_date) ){ //if it is current date and greater than 12:00 am
	    get_past_slots(date,cdt_date);//get all the past slots
            set_full_slot();//set the full slots.
        } else if((date > cdt_current_date) && (date == cdt_date)) { //if it is the next day
            get_past_slots(date,cdt_date);
	    set_full_slot();
        } else { // for all the future dates.
	    set_full_slot();
	}
    }

    function full_slots(slots){
        var time_slots = [];
        $.each(slots, function (key, value) {
            var time = value.date;
            time = convert_time(time);
            time_slots.push($.trim(time));
        });
        $('#popup ul li').each(function () {
            if(!(time_slots.indexOf($(this).attr('data-time')) == -1)){
                $(this).addClass('slot_full');
                $(this).qtip({
                    content: {
                        text: 'All reservations currently scheduled have a 2 hour gap to prevent overbooking If your reservation time is not available ' +
                        'please call to see if your ride can be accommodated at 610-255-7283'
                    }
                });
            }
        });
    }

    function convert_time(time){
        time = time.split(' ');
        time = time[1].replace(':', '');
        time = time.substring(0,time.length - 3);
        return time;
    }

    function get_past_slots(date,cdt_date)
    {
	//console.log(date,cdt_date);
	if(date == cdt_date)
	{
        $('#popup ul li').each(function () {
            if ($(this).attr('data-time') < cdt_time) {
                $(this).addClass('slot_past');
            }
        });
	}else{
	    $('#popup ul li').each(function () {
                $(this).addClass('slot_past');
        });
	}
    }

    function weekend_past_slots(){
        $('#popup ul li').each(function () {
            if ($(this).attr('data-time') < '0400') {
                $(this).addClass('slot_past');
            }
        });
    }

    //do no delete this function. as it gets data from the full slot table.
    /*function set_full_slot(){
        var date = $("#date").val(); // the selected date in the form.
        $.post("reservation/getfullslots", { date: date }, function (result) {
            var arr = JSON.parse(result); //here we get the result in json format.
            full_slots(arr);
        });*/

    function set_full_slot(){
	//convert the #date into proper format.
	var date = $('#date').val();
	var arr = date.split("-",3);
	var arr_date = [arr[1],arr[0],arr[2]];
	date = arr_date.join("-");
        var type = 'reservation';
        //var date = $("#date").val(); // the selected date in the form.
        $.post("reservation/getfullslots", { date: date, type: type}, function (result) {
            var arr = JSON.parse(result); //here we get the result in json format.
            full_slots(arr);
        });
    }

    function clear_slots(){
        $('#popup ul li').each(function () {
            $(this).removeClass('slot_full');
            $(this).removeClass('slot_past');
            $(this).qtip("destroy",true);
            $(this).removeAttr('aria-describedby');
            $(this).removeAttr('data-hasqtip');
        });
    }

    $(document).on('click','#get_fare', function(){
        var distance = $("#miles").val();
        var url = $(this).data('url');
        $.post(url,{distance: distance}, function (e) {
            var price = JSON.parse(e);
            if(price !== null)
            {
                $('.rate_message').html('The Rate for ' + distance +' miles is ' + ' $' + price).css('color','red');
                $('.rate_message').removeClass('hidden');
            }
            else
            {
                $('.rate_message').html('No Rate found').css('color','red');
                $('.rate_message').removeClass('hidden');
            }
        });
    });
});
