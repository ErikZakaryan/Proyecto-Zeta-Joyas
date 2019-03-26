<?php 
    session_start();
    require_once("conexiones.php");
    if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["mail"]) && isset($_POST["telefono"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["mail"]) && !empty($_POST["telefono"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        $idUsuario = $_POST["idUsuario"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $mail = $_POST["mail"];
        $telefono = $_POST["telefono"];
        $password = $_POST["password"];

        $query= "update usuarios set nombre='$nombre', apellido='$apellido', mail='$mail', telefono='$telefono' where id=$idUsuario and password='$password'";
        $resultado = mysqli_query($conexiones,$query) or die(mysqli_error($conexiones));
        if($resultado) {
            $_SESSION["nombre"] = $nombre;
            $_SESSION["apellido"] = $apellido;
            $_SESSION["mail"] = $mail;
            $_SESSION["telefono"] = $telefono;
            header("Location:../miCuenta.php?actualizado=1");
        } else {
            header("Location:../miCuenta.php?passInc=1");
        }

    } else {
        header("Location:../miCuenta.php?actualizado=0");
    }

    if(isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["passwordChange"]) && !empty($_POST["passwordChange"]) && isset($_POST["passwordRep"]) && !empty($_POST["passwordRep"])) {
        $password = $_POST["password"];
        $passwordChange = $_POST["passwordChange"];
        $idUsuario = $_POST["idUsuario"];

        $consultaPass = "select password from usuarios where id = $idUsuario and password='$password'";
        $queryPass= mysqli_query($conexiones,$consultaPass) or die(mysqli_error($conexiones));

        if(mysqli_num_rows($queryPass) > 0) {
            // COMO LAS CONTRASEÑAS SON IGUALES, SE HACE EL CAMBIO EN LA BASE DE DATOS
            mysqli_query($conexiones,"update usuarios set password='$passwordChange' where id=$idUsuario") or die(mysqli_error($conexiones));
            header("Location:../miCuenta.php?actualizado=1");
        } else {
            echo "no";
        }
    }

?>