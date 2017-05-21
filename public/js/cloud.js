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
                swal({
                    title: 'Bien Hecho!',
                    text: 'Se ha enviado la información correctamente.',
                    type: "success",
                    timer: 2000
                }).then(
                    function () {},
                    // handling the promise rejection
                    function (dismiss) {
                    }
                )
            }
        });
    }
});