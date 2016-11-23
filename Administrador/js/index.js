/**
 * Created by ibalop on 3/11/16.
 */


var main = function () {

    "use strict";
    var u = "AlanIbarra";
    var p = "pass123";
    $("#btnenviar").click(function () {
        var $user = $("#usuario").val();
        var $pass = $("#password").val();

        if(u == $user && p == $pass){
            alert("Datos correctos");
            $("#usuario").val("");
            $("#password").val("");
            window.location = "administrador.html";
        }else{
            alert("Datos de usuario no validos");
            $("#usuario").val("");
            $("#password").val("");
        }
    });

}


$(document).ready(main);