/* Login Page Validation JS*/
$(document).ready(function () {
    // $('form').on('submit', uploadFiles);

    $("#tt_address").change(function () {

        var geocoder = new google.maps.Geocoder();
        var address = $("#tt_address").val();
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK)
            {
                // do something with the geocoded result
                console.log(results[0].geometry.location.lat() + "," + results[0].geometry.location.lng());

                $("#tt_lat").val(results[0].geometry.location.lat());
                $("#tt_lng").val(results[0].geometry.location.lng());
            }
        });

    });


    $('#btn_feed').click(function (event) {
        event.preventDefault(); // Totally stop stuff happening

        if ($("#frmAddFeed").valid()) {
            $("#frmAddFeed").submit();
        }
        

    });

    $("#frmAddFeed").validate({
        rules: {
            tt_category: "required",
            tt_address: "required",
            tt_comment: "required"
        }
        ,
        messages: {
            tt_category: "Please select category",
            tt_address: "Please enter address",
            tt_comment: "Please enter description"
        }
    });

});
