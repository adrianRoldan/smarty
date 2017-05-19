/**
 * Created by pgv95 on 04/05/2017.
 */
$(document).ready(function(){

    $("#sendToMosquitto").click(sentToMosquitto);


    function sentToMosquitto(){

        $.ajax({
            url: "/broker/sendtomosquitto",
            type: "POST",
            success: function (result) {
                swal({
                    title: 'Bien Hecho!',
                    text: 'Se ha publicado la información correctamente.',
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

    function bindMosquitto(){

        $.ajax({
            url: "/broker/bindmosquitto",
            type: "POST",
            success: function (result) {
                swal({
                    title: 'Bien Hecho!',
                    text: 'Se ha suscrito al topico casa/importante.',
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