<?php
    session_start();
    require_once("conexiones.php");

    

    if (isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $queryLogin = "select * from usuarios where usuario = '$usuario' and password = '$password'";
        $resultado = mysqli_query($conexiones,$queryLogin) or die(mysqli_error($conexiones));
        $numeroUsuarios = mysqli_num_rows($resultado);
        if($numeroUsuarios > 0){
            
            $datosUsuario = mysqli_fetch_array($resultado);

            $_SESSION["id"] = $datosUsuario["id"];
            $_SESSION["usuario"] = $datosUsuario["usuario"];
            $_SESSION["nombre"] = $datosUsuario["nombre"];
            $_SESSION["apellido"] = $datosUsuario["apellido"];
            $_SESSION["mail"] = $datosUsuario["mail"];
            $_SESSION["telefono"] = $datosUsuario["telefono"];

            // $idUsuarioLogueado = $_SESSION["idUsuario"];

            // header("Location: ../home.php");
            echo "si";

        } else {
            // header("Location: ../Login-Register.php?usuarioContraseñaIncorrecta=si");
            echo "no";
        }
    } else {
        
        if (isset($_GET["usuario"]) && !empty($_GET["usuario"]) && isset($_GET["password"]) && !empty($_GET["password"])) {
            $usuario = $_GET["usuario"];
            $password = $_GET["password"];
            $queryLogin = "select * from usuarios where usuario = '$usuario' and password = '$password'";
            $resultado = mysqli_query($conexiones,$queryLogin) or die(mysqli_error($conexiones));
            $numeroUsuarios = mysqli_num_rows($resultado);
            if($numeroUsuarios > 0){
                
                $datosUsuario = mysqli_fetch_array($resultado);
    
                $_SESSION["id"] = $datosUsuario["id"];
                $_SESSION["usuario"] = $datosUsuario["usuario"];
                $_SESSION["nombre"] = $datosUsuario["nombre"];
                $_SESSION["apellido"] = $datosUsuario["apellido"];
    
                $idUsuarioLogueado = $_SESSION["idUsuario"];
    
                header("Location: ../home.php");
            }
        }
        else {
            $usuario = "";
            $password = "";
            // echo "Debe completar los campos";
        }

    } 

?>