$(document).ready(function () {
    $(".divAck").hide();


});

function togglediv(id) {
    $("#divAck_" + id).toggle();
    $("#lblstatus_" + id).toggle();
}

function acknowledge(id) {
     
    $.ajax({
        type: "POST",
        url: "../action/_acknowledge.php",
        data: "&id=" + id +
                "&status=" + $("#status_" + id).val(),
        success: function (response) {
            var cls = "";
            var label = "";
            if (response == 1) {
                switch ($("#status_" + id).val()) {
                    case isopen:
                        cls = "label-default label";
                        label = "Open";
                        break;
                    case inprogress:
                        cls = "label-warning label label-default";
                        label = "In progress";
                        break;
                    case complete:
                        cls = "label-success label label-default";
                        label = "Complete";
                        break;
                    case reject:
                        cls = "label-success label label-danger";
                        label = "Reject";

                        break;
                }
                $("#lblstatus_" + id).attr("class",cls);
                $("#lblstatus_" + id).html(label);
                togglediv(id);
            }else{
                alert("Error while acknowledgement.");
            }

        }

    });
}