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

});

// Catch the form submit and upload the files
function uploadFiles(event)
{
    event.stopPropagation(); // Stop stuff happening
    event.preventDefault(); // Totally stop stuff happening

    // START A LOADING SPINNER HERE

    // Create a formdata object and add the files
    var data = new FormData();
    $.each(files, function (key, value)
    {
        data.append(key, value);
    });

    $.ajax({
        url: base_url + "feed/upload.php?files",
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function (data, textStatus, jqXHR)
        {
            if (typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                submitForm(event, data);
            } else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}

function submitForm(event, data)
{
    // Create a jQuery object from the form
    $form = $(event.target);

    // Serialize the form data
    var formData = $form.serialize();

    // You should sterilise the file names
    $.each(data.files, function (key, value)
    {
        formData = formData + '&filenames[]=' + value;
    });

    $.ajax({
        url: '../action/_post_feed.php',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        success: function (data, textStatus, jqXHR)
        {
            if (typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                console.log('SUCCESS: ' + data.success);
            } else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
        },
        complete: function ()
        {
            // STOP LOADING SPINNER
        }
    });
}
