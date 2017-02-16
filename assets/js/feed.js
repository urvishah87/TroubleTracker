$(document).ready(function () {
 
});
 
function deleteFeed(id) {
     
    $.ajax({
        type: "POST",
        url: base_url+"feeds/deleteFeed",
        data: "&feed_id=" + id ,
        success: function (response) {
            if(response){
               alert("Feed deleted successfully!");
               location.reload();
            }else{
                alert("Error while deleting feed.");
            }
        }

        });
}
