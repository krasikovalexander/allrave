$(document).ready(function () {
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
