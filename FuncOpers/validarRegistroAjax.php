<?php
    require_once("conexiones.php");


    if(isset($_POST["validarUsuario"])){
        $usuario = $_POST["validarUsuario"];
        $consultaUsuario = "select usuario from usuarios where usuario = '$usuario'";
        $queryUsuario= mysqli_query($conexiones,$consultaUsuario) or die(mysqli_error($conexiones));

        if(mysqli_num_rows($queryUsuario) > 0) {
            echo "no";
        } else {
            echo "si";
        }
    }
            

    if(isset($_POST["validarMail"])){
        $mail = $_POST["validarMail"];
        $consultaMail = "select mail from usuarios where mail = '$mail'";
        $queryMail= mysqli_query($conexiones,$consultaMail) or die(mysqli_error($conexiones));

        if(mysqli_num_rows($queryMail) > 0) {
            echo "no";
        } else {
            echo "si";
        }
    }


?>