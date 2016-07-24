$(document).ready(function () {
    $(".fancybox").fancybox();
    $(document).on('click','.edit', function () {
       var id = $(this).data('id');

        $.post('vehicles/get_vehicle',{id: id}, function(result){
            var arr = JSON.parse(result);


            $.each(arr, function (key, value) {
                $('#vehicle_name').val(value.vehicle_name);
                $('#vehicle_number').val(value.vehicle_number);
                $('.submit').val('Edit');
                $('h3').text('Edit Vehicle');
                $('#type').val('update');
                $('#vehicle_id').val(value.id);
            });
        });
    });

    $(document).on('click','.delete', function () {
        var id = $(this).data('id');

        $.post('vehicles/delete_vehicle',{id: id}, function(result){
            location.reload();
        });
    });

    $(document).on('click','.vehicle-img-icon', function () {
        var src = $(this).attr('src');
        $('.vehicle_img_big').attr('src',src);
    });
});