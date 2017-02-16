/* Google Map Operations*/
$(document).ready(function () {
    var map;
    var bounds;
    var markers = [];
//    $('#postdate').datepicker({
//    format: 'dd-mm-yyyy'
//});
    $("#linkadv").click(function () {
        $("#postdate").val("");
        $("#txtlocation").val("");
        $("#divAdvSearch").toggle('slow');
    });

//    $('.carousel').carousel({
//        interval: 6000
//    })
    function initialize() {

        var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(-37.818323, 144.967059)
        };

        map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

        getAllfeeds();

    }

    function getAllfeeds(searchData) {
        $.ajax({
            type: "POST",
            url: base_url + "home/allFeeds",
            data: searchData,
            success: function (response) {
                clearMarkers();
                var res = JSON.parse(response);
                bounds = new google.maps.LatLngBounds();
                $.each(res, function (key, val) {

                    setMarker(val);
                });

            }

        });
    }

    function setMarker(feed) {
        var image = base_url + 'assets/img/status_ico/yellow.png';
        switch (feed['tt_publishstatus']) {
            case '1':
                image = base_url + 'assets/img/status_ico/yellow.png';
                break;
            case '2':

                image = base_url + 'assets/img/status_ico/red.png';
                break;
            case '3':
                image = base_url + 'assets/img/status_ico/green.png';
                break;
            default:
                image = base_url + 'assets/img/status_ico/yellow.png';
                break;

        }

        var myLatLng = new google.maps.LatLng(feed['tt_lat'], feed['tt_lng']);
        bounds.extend(myLatLng);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image
        });
        var comm = (feed['tt_comments'].length > 20) ? feed['tt_comments'].substring(0, 20) + "..." : feed['tt_comments'];
        var addr = (feed['tt_address'].length > 20) ? feed['tt_address'].substring(0, 20) + "..." : feed['tt_address'];
        var cat = (feed['category'] !== null && feed['category'] !== "") ? feed['category'] : "";
        var img = (feed['tt_image'] !== null && feed['tt_image'] !== "") ? feed['tt_image'] : "no_image.png";
        var status = "Open";
        switch (feed['tt_publishstatus']) {
            case 2:
                status = "In Progress";
                break;
            case 3:
                status = "Compelete";
                break;
            case 4:
                status = "Rejected";
                break;
            default:
                status = "Open";
                break;
        }

        var contentString = "<table cellpadding=0 cellspacing=0 style='padding:0px;' border=1>";
        contentString += "<tr><td colspan=2><img src='" + base_url + "uploads/" + img + "' style='height: 100px;width: 120px;' />";
        contentString += "<tr><td> <b>Description:</b> </td><td>" + comm + "</td></tr>";
        contentString += "<tr><td> <b>Category:</b> </td><td>" + cat + "</td></tr>";
        contentString += "<tr><td> <b>Address: </b></td><td>" + addr + "</td></tr>";
        contentString += "<tr><td> <b>Status: </b></td><td>" + status + "</td></tr>";


//        contentString += "<tr><td colspan=2 ><a style='float:right;' href='view_feed?i=" + feed['tt_feed_id'] + "' >+View more</a></td></tr>"
        contentString += "</table>";
        marker.info = new google.maps.InfoWindow({
            //when I add <IMG BORDER="0" ALIGN="Left" SRC="stagleton.jpg"> the maps will not load
            content: contentString

        });

        google.maps.event.addListener(marker, 'click', function () {
            marker.info.open(map, marker);
        });

        map.fitBounds(bounds);
        markers.push(marker);

    }


// Sets the map on all markers in the array.
    function setAllMap(map1) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map1);
        }
    }

// Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setAllMap(null);
    }

    google.maps.event.addDomListener(window, 'load', initialize);

});


