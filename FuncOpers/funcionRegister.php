<?php
    // $conexiones = mysqli_connect("localhost", "root", "", "gestion") or die("Problemas al conectar a la Base de Datos");
    require_once("conexiones.php");
    $usuario = $_POST["usuarioRegis"];
    $consulta = "select usuario from usuarios where usuario = '$usuario'";
    $query= mysqli_query($conexiones,$consulta) or die(mysqli_error($conexiones));

    if(mysqli_num_rows($query) > 0) {
        echo "no";
    }

    if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["apellido"]) && !empty($_POST["apellido"]) && isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $mail = $_POST["mail"];
        $password = md5($_POST["password"]);
        $passwordRep = md5($_POST["passwordRep"]);

        if ($password == $passwordRep){
            $userReg = mysqli_query($conexiones, "select usuario from usuarios where usuario = '$usuario'") or die(mysqli_error($conexiones));
            $mailReg = mysqli_query($conexiones, "select mail from usuarios where mail = '$mail'") or die(mysqli_error($conexiones));
            $cantUserReg = mysqli_num_rows($userReg);
            $cantMailReg = mysqli_num_rows($mailReg);
            if ($cantUserReg == 0) {
                if ($cantMailReg == 0) {
                    $registro = mysqli_query($conexiones, "insert into usuarios (nombre, apellido, usuario, mail, password) values ('$nombre','$apellido','$usuario','$mail','$password')") or die(mysqli_error($conexiones));
                    
                    if ($registro){
                        // echo "El usuario " . $usuario . " se ha registrado Correctamente";
                        header("Location:funcionLogin.php?usuario=$usuario&password=$password");
                    } else {
                        echo "No se ha podido registrar";
                    }
                } 
            } 
        } else {
            echo "Las contraseñas no coinciden";
        }
        // DIFERENTES TIPOS DE MENSAJE SEGUN LO QUE NO CORRESPONDA
        if ($cantMailReg > 0 && $cantUserReg > 0){
            // EL USUARIO Y EL MAIL SE ENCUENTRAN EN USO
            header("Location:../Login-Register.php?nomail=1&nouser=1&camposincompletos=0");
        } elseif ($cantMailReg == 0 && $cantUserReg > 0) {
            // EL USUARIO YA SE ENCUENTRA EN USO
            header("Location:../Login-Register.php?nomail=0&nouser=1&camposincompletos=0");
        } elseif ($cantMailReg > 0 && $cantUserReg == 0) {
            // EL MAIL YA SE ENCUENTRA EN USO
            header("Location:../Login-Register.php?nomail=1&nouser=0&camposincompletos=0");
        }

    } else {
        $nombre = "";
        $apellido = "";
        $usuario = "";
        $mail = "";
        $password = "";
        // echo "Se deben completar todos los campos";
        header("Location:../Login-Register.php?nomail=0&nouser=0&camposincompletos=1");
    }


?>
