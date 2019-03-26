$(document).ready(function(){
    $("#usuarioRegister").blur(function(){
        var usuario = $(this).val();
        $.ajax({
            async: true,
            type: "post",
            url: "FuncOpers/validarRegistroAjax.php",
            data: {validarUsuario: usuario}, 
            beforeSend: function(){
                // $("#resultado").html("<img src='ruedita.gif'"); // ESTO ES PARA PONER ALGUN GIF DE RUEDITA A LO SE ESTA PROCESANDO LA INFO
            },
            success: function(mensaje){
                if(mensaje == "no"){                  
                    $("#usuarioRegister").val("");
                    $("#usuarioRegister").css("border","1px solid red");
                    $("#usuarioRegister").attr("placeholder", "Usuario ya Existente");
                } else {
                    $("#usuarioRegister").css("border","1px solid #ced4da");
                    $("#usuarioRegister").attr("placeholder", "Usuario");
                }
            },
            timeout: 4000,
            error: function(e) {
                $("#resultado").html("Error");
            }
        })
    });


    $("#mailRegister").blur(function(){
        var mail = $(this).val();
        $.ajax({
            async: true,
            type: "post",
            url: "FuncOpers/validarRegistroAjax.php",
            data: {validarMail: mail},
            beforeSend: function(){
                // $("#resultado").html("<img src='ruedita.gif'"); // ESTO ES PARA PONER ALGUN GIF DE RUEDITA A LO SE ESTA PROCESANDO LA INFO
            },
            success: function(mensaje){
                if(mensaje == "no"){
                    $("#mailRegister").val("");
                    $("#mailRegister").css("border","1px solid red");
                    $("#mailRegister").attr("placeholder", "Correo ya usado");
                } else {
                    $("#mailRegister").css("border","1px solid #ced4da");
                    $("#mailRegister").attr("placeholder", "Correo");
                }
            },
            timeout: 4000,
            error: function(e) {
                $("#resultado").html("Error");
            }
        })
    });

    $("#passMiCuenta").blur(function(){
        var passMiCuenta = $(this).val();
        var idUsuarioModif = $("#idUsuario").val();
        $.ajax({
            async: true,
            type: "post",
            url: "FuncOpers/validarPassAjax.php",
            data: {validarPassMiCuenta: passMiCuenta, usuarioModif: idUsuarioModif},
            beforeSend: function(){
                // $("#resultado").html("<img src='ruedita.gif'"); // ESTO ES PARA PONER ALGUN GIF DE RUEDITA A LO SE ESTA PROCESANDO LA INFO
            },
            success: function(mensaje){
                console.log(mensaje);
                if(mensaje == "no"){
                    $("#passMiCuenta").css("border","2px solid red");
                    $("#mensajePassIncorrecto").html("Contraseña Incorrecta");
                } else {
                    console.log("Else"); 
                    $("#passMiCuenta").css("border","2px solid #ced4da");
                    $("#passMiCuenta").attr("placeholder", "Contraseña actual");
                }
            },
            timeout: 4000,
            error: function(e) {
                $("#resultado").html("Error");  
            }
        })
    });

    $("#passRepMiCuenta").blur(function() {
        console.log("bolas");
        var password = $("#passChangeMiCuenta").val();
        var passwordRepeat = $("#passRepMiCuenta").val();
        if (password == passwordRepeat) {
            $("#passChangeMiCuenta").css("border","2px solid green");            
        } else {
            $("#passChangeMiCuenta").css("border","2px solid red");
            $("#passRepMiCuenta").css("border","2px solid red");
            $("#mensajeSiNoCiunciden").html("Las contraseñas no coinciden");
        }
            
    });

    $("#botonLogin").click(function() {
        var user = $("#usuarioLogin").val();
        var pass = $("#passwordLogin").val();
        $.ajax({
            async: true,
            type: "post",
            url: "FuncOpers/funcionLogin.php",
            data: {usuario: user, password: pass},
            beforeSend: function(){
                // $("#resultado").html("<img src='ruedita.gif'"); // ESTO ES PARA PONER ALGUN GIF DE RUEDITA A LO SE ESTA PROCESANDO LA INFO
            },
            success: function(mensaje){
                console.log(mensaje);
                if(mensaje == "si"){
                    console.log("puta");
                    window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/home.php";
                } else {
                    if(mensaje == "no"){
                        $("#passwordLogin").css("border","1px solid red");
                        $("#usuarioLogin").css("border","1px solid red");
                        $("#mensajeDeIncorrecto").html("Usuario o Contraseña Incorrecta");
                    } else {$("#filtroPrecio").val(filtro); 
                        $("#passwordLogin").css("border","1px solid orange");
                        $("#usuarioLogin").css("border","1px solid orange");
                        $("#mensajeDeIncorrecto").html("Debe completar los campos");
                    }
                    
                }
            },
            timeout: 4000,
            error: function(e) {
                $("#resultado").html("Error");
            }
        })
    });

    $(".botonFiltroTipo").click(obtenerFiltro1);
    function obtenerFiltro1() {
        var filtro = $(this).attr('id');
        $("#filtroTipo").val(filtro); 
    }

    $(".botonFiltroMetal").click(obtenerFiltro2);
    function obtenerFiltro2() {
        var filtro = $(this).attr('id');
        $("#filtroMetal").val(filtro);
    }
    $(".botonFiltroPrecio").click(obtenerFiltro3);
    function obtenerFiltro3() {
        var filtro = $(this).attr('id');
        $("#filtroPrecio").val(filtro); 
    }
        $(".botonFiltro").click(function() {
            console.log($("#filtroTipo").val() + $("#filtroMetal").val() + $("#filtroPrecio").val());
            //window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?tipo=" + filtroTipo + "&metal=" + filtroMetal + "&precio=" + filtroPrecio;

                if ($("#filtroTipo").val() && $("#filtroMetal").val() && $("#filtroPrecio").val()){
                    var filtroTipo = $("#filtroTipo").val();
                    var filtroMetal = $("#filtroMetal").val();
                    var filtroPrecio = $("#filtroPrecio").val();
                    window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?tipo=" + filtroTipo + "&metal=" + filtroMetal + "&precio=" + filtroPrecio;
                } else {
                    if ($("#filtroTipo").val() && $("#filtroMetal").val()){
                        var filtroTipo = $("#filtroTipo").val();
                        var filtroMetal = $("#filtroMetal").val();
                        window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?tipo=" + filtroTipo + "&metal=" + filtroMetal;
                    } else {
                        if ($("#filtroTipo").val() && $("#filtroPrecio").val()){
                            var filtroTipo = $("#filtroTipo").val();
                            var filtroPrecio = $("#filtroPrecio").val();
                            window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?tipo=" + filtroTipo + "&precio=" + filtroPrecio;
                        } else {
                            if ($("#filtroMetal").val() && $("#filtroPrecio").val()){
                                var filtroMetal = $("#filtroMetal").val();
                                var filtroPrecio = $("#filtroPrecio").val();
                                window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?metal=" + filtroMetal + "&precio=" + filtroPrecio;
                            } else {
                                if ($("#filtroTipo").val()){
                                    var filtroTipo = $("#filtroTipo").val();
                                    window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?tipo=" + filtroTipo;
                                } else {
                                    if ($("#filtroMetal").val()){
                                        var filtroMetal = $("#filtroMetal").val();
                                        window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?metal=" + filtroMetal;
                                    } else {
                                        if ($("#filtroPrecio").val()){
                                            var filtroPrecio = $("#filtroPrecio").val();
                                            window.location.href = "http://localhost/pagZeta/Zeta%20Joyas/tienda.php?precio=" + filtroPrecio;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                
                
                
                
                
                
        });
    
    
});
