$(document).ready(function () {
    //To make the tr click able except the first tr i.e. headings.
    $('#request_table tr:not(:first)').css('cursor','pointer');
    $(document).on('click','#request_table tr:not(:first)',function(){
        window.location = $(this).data('href');
    });

    //if the Type select option is changed.
    $(document).on('change','#number_of_requests, .request_type',function(){
        var type = $('.request_type').val(); //get the status type.
        var limit = $('#request_select').val(); //get the limit.
        $("#search_name").val(''); //set the search box value to empty.

        $.post("requests/get_request_by_limit", { limit: limit, type: type }, function (result) {
            var arr = JSON.parse(result);

            $('#request_table').find("tr:gt(0)").remove();
            $.each(arr, function( index, value ) {
                $("#request_table tbody").append(
                    '<tr class="odd" data-href="view_request/'+value.id+'">'
                    +"<td class='sorting_1'>"+value.name+"</td>"
                    +"<td>"+value.email+"</td>"
                    +"<td>"+value.date+"</td>"
                    +"<td>"+value.booking_time+"</td>"
                    +"</tr>"
                );
            });
            $('#request_table tr:not(:first)').css('cursor','pointer');
            $('.scrollit').css('overflow-y','scroll'); //vertical scroll
            $('.scrollit').css('height','435px');
        });
    });

	
	$(document).mouseup(function (e)
	{
    		var container = $(".name_list_div");
		var input = $("#username");

    		if (!container.is(e.target) && container.has(e.target).length === 0 && !input.is(e.target) && input.has(e.target).length === 0)
    		{
        		container.addClass('hidden');
    		}
	});

    $(document).on('click','.add_booking', function () {
        var path = location.pathname.split("/");
        var path_date = path[4];
        var path_time = path[5];
        var url = $(this).data('url');
        window.location.href = url + "/" + path_date + "/" + path_time;
    });

    $(document).on('keyup','#search_name', function () {
        var type = $('.request_type').val();
        var limit = $('#request_select').val();
        var text = $("#search_name").val();
        var if_url = $("#search_name").data("if-href");
        var else_url = $("#search_name").data("else-href");

        if(text !== '') { //if the search box has some value.
            $.post(if_url , {text: text, type: type ,limit: limit}, function (e) {
                var arr = JSON.parse(e);
                $('#request_table').find("tr:gt(0)").remove();
                $.each(arr, function (index, value) {
                    $("#request_table tbody").append(
                        '<tr class="odd" data-href="view_request/' + value.id + '">'
                        + "<td class='sorting_1'>" + value.name + "</td>"
                        + "<td>" + value.email + "</td>"
                        + "<td>" + value.date + "</td>"
                        + "<td>" + value.booking_time + "</td>"
                        + "</tr>"
                    );
                });
                $('#request_table tr:not(:first)').css('cursor','pointer');
                $('.scrollit').css('overflow-y','scroll'); //vertical scroll
                $('.scrollit').css('height','435px');
            });
        }else{ //else if the search box is empty.
            $(".request_type").val('all');
            $.post(else_url , {}, function (e) {
                var arr = JSON.parse(e);
                $('#request_table').find("tr:gt(0)").remove();
                $.each(arr, function (index, value) {
                    $("#request_table tbody").append(
                        '<tr class="odd" data-href="view_request/' + value.id + '">'
                        + "<td class='sorting_1'>" + value.name + "</td>"
                        + "<td>" + value.email + "</td>"
                        + "<td>" + value.date + "</td>"
                        + "<td>" + value.booking_time + "</td>"
                        + "</tr>"
                    );
                });
                $('#request_table tr:not(:first)').css('cursor','pointer');
                $('.scrollit').css('overflow-y','scroll'); //vertical scroll
                $('.scrollit').css('height','435px');
            });
        }
    });

    $(document).on('keyup','#username', function () {
        var name = $(this).val();
        var url = $(this).data('url');
        if(name != '')
        {
            $.post(url, { name: name }, function (result) {
                var arr = JSON.parse(result);
                console.log(arr);
                $('.name_list_div').removeClass('hidden');
                var ul = $('.name_list_div ul');
                var li = '';
                $.each(arr, function(key, value){
                    li += '<li>' + value.name + '</li>';
                });
                ul.html(li);
                ul.css('cursor','pointer');
                $('.name_list_div ul li').hover(function () {
                    $(this).css('background-color', 'black');
                    $(this).css('color', 'white');
                }, function () {
                        $(this).css('background-color', 'lightblue');
                        $(this).css('color', 'black');
                    });
              $(document).on('click','.name_list_div ul li', function () {
                  var li_name = $(this).text();
                  var result = $.grep(arr, function(e) {
                      return e.name == li_name;
                  });
                  fill_user_form(result);
                  $('.name_list_div').addClass('hidden');
                  /*console.log(result);*/
              });
            });
        }
    });

    function fill_user_form(user)
    {
        if(!$.isEmptyObject(user))
        {
            $('#username').val(user[0].name);
            $('#phone').val(user[0].phone);
            $('#email').val(user[0].email);
            $('#flightnumber').val(user[0].flight_number);
            $('#usr_time').val(user[0].arrival_time);
            $('#pickup_address').val(user[0].pickup_address);
            $('#pickup_city').val(user[0].pickup_city);
            $('#pickup_state').val(user[0].pickup_state);
            $('#pickup_zip').val(user[0].pickup_zip);
            $('#drop_address').val(user[0].dropoff_address);
            $('#drop_city').val(user[0].dropoff_city);
            $('#drop_state').val(user[0].dropoff_state);
            $('#drop_zip').val(user[0].dropoff_zip);
            $('#passenger').val(user[0].number_of_passengers);
        }
        else
        {
            return false;
        }
    }
});
