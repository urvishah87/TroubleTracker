/* Login Page Validation JS*/
$(document).ready(function () {
    if ($("#message").hasClass("alert-danger")) {
        $("#message").removeClass("alert-danger");
        $("#message").addClass("alert-info");
    }
    
    $('#btn_post').click(function () {
//          Event.preventDefault();

        if ($("#frmPostFeed").valid()) {
            //$("#loading").show();
            
            $("#frmPostFeed").submit();
//            $.ajax({
//                type: "POST",
//                url: "../action/_post_feed.php",
//                data: $("#frmPostFeed").serialize(),
//                success: function (response) {  
                    // $("#loading").hide();
//                    if (response == 1) {
//                        location.href = "feeds.php"
//
//                    }
//                    else {
//
//                        $("#message").removeClass("alert-info");
//                        $("#message").addClass("alert-danger");
//                        $("#message").html("Invalid login!");
//                    }

//                }

//            });
        }
    });


    $("#frmPostFeed").validate({
        rules: {
            caregory: "required",
            tt_address: "required",
            tt_comment: "required"
        }
        ,
        messages: {
            caregory: "Please enter category",
            tt_address: "Please enter address",
            tt_comment: "Please enter comment"
        }
    });
});
