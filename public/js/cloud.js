/**
 * Created by AR on 01/05/2017.
 */
$(document).ready(function(){

    $("#sendToCloud").click(sentToCloud);


    function sentToCloud(){

        $.ajax({
            url: "/cloud/sendtocloud",
            type: "POST",
            success: function (result) {
                alert(result);
            }
        });
    }
});