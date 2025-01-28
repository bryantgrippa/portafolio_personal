/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    if (localStorage.usuario !== "undefined") {

        /*Obtener datos almacenados*/
        var nombre = localStorage.getItem("usuario");
        var apellido = localStorage.getItem("pass");
        /*Mostrar datos almacenados*/
        document.getElementById("usuario").value = nombre;
        document.getElementById("password").value = apellido;
    }
});
$('#boton_login').click(function () {
    var password = $('#password')[0];
    var user = $('#usuario')[0];
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (user.value.length >= 5 && user.value.length <= 50) {
        if (password.value.length >= 5 && password.value.length <= 26) {

            $(this).proceso_login(password.value, user.value);
        } else {
            alertify.error("Por favor, ingrese contraseña.",4, 'top-left');
            password.focus();
            return 0;
        }
    } else {
        alertify.error('Por favor, ingrese usuario.');
       user.focus();
        return 0;
    }

});
function ingreso_login() {

    var password = $('#tbSifre')[0];
    var user = $('#tbEmail')[0];
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (user.value.length >= 5 && user.value.length <= 50) {
        if (password.value.length >= 5 && password.value.length <= 26) {

            $(this).proceso_login(password.value, user.value);
        } else {
            alertify.error("Por favor, ingrese contraseña.");
            password.focus();
            return 0;
        }

    } else {
        alertify.error("Por favor, ingrese usuario.");        
        user.focus();
        return 0;
    }
}
$(function () {
    $.fn.proceso_login = function (password, user) {
        localStorage.setItem("usuario", user);
        localStorage.setItem("pass", password);
        var parametros = {
            "usuario": user,
            "contrasena": password
        };
        $.ajax({
            data: parametros,
            url: 'controlador/ingreso.php',
            type: 'post',
            beforeSend: function () {
                $("#loading").html("<center><img style='width: 120px; left: 45%; top: 50%; position: absolute' src='img/rrhh.gif' alt=''></center>");
            },
            success: function (response) {
                $("#loading").html(response);
            }
        });
    };
});
var $viewportMeta = $('meta[name="viewport"]');
$('input, select, textarea').bind('focus blur', function (event) {
    $viewportMeta.attr('content', 'width=device-width,initial-scale=1,maximum-scale=' + (event.type == 'blur' ? 10 : 1));
});
function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13) {
        ingreso_login();
    }
}
function mostrar(texto) {
     Swal.fire({     
        html:
                '<h3>¿Olvidaste tu contraseña ?</h3>' +
                '<p>Contacta con un administrador para el reestablecimiento de tu contraseña o nombre de usuario </p>'
                
    })
}
