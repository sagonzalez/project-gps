/**
 * Created by ibalop on 4/11/16.
 */


var main = function () {

    "use strict";

    var agregar_comentario = function () {
        
        var $comentario  = $("#campo-comentario").val();

        if($comentario != ""){

            var $item = $("<li>"+$comentario+"</li>");


            $item.hide();

            $("#lista").append($item);

            $item.fadeIn(1000);

            $("#campo-comentario").val("");



        }
    };


    $("#campo-comentario").on("keypress",function (event) {
        if(event.keyCode==13){
            agregar_comentario();
        }
    });



    $("#btnCommentario").click(function () {
        agregar_comentario();
    });


};


$(document).ready(main);